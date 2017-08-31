<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Student;
use App\Professor;
use App\StudentGrade;
use App\ProjectManager;
use Request;

class StudentController extends Controller
{
	public function normalizeGrade($grade, $enrollmentDate) {
	    $studentList = DB::table('student')
                        ->join('student_grade', 'student.student_grade_id', '=', 'student_grade.id')
                        ->select('student_grade.grade')
                        ->where('student.enrollment_date', '=', $enrollmentDate)
                        ->get();

	    $standartDeviation = $this->calcStandartDeviation($grade, $studentList);

	    if ($standartDeviation == 0) {
	    	return 5;
	    }

	    $normalized = (($grade / $standartDeviation) * 1.67) + 5;

	    return $normalized;

	}

	public function calcStandartDeviation(&$grade, &$studentList){
		$points = count($studentList);
	    $points++;
	    $sum = $grade;

	    if (isset($studentList) && !empty($studentList)) {
		    foreach ($studentList as $student) {
		      $sum = $sum + $student->grade;
		    }
		}

	    $average = $sum / $points;

	    $sum = abs($grade - $average) ** 2;
	    if (isset($studentList) && !empty($studentList)) {
		    foreach ($studentList as $student) {
		      $sum = $sum + (abs($student->grade - $average) ** 2) ;
		    }
		}

		if ($sum == 0) {
			return 0;
		}

	    return sqrt($sum / $points);
	}

	public function updateNormalizedGrade() {
		$resposta = DB::table('student_grade')
                        ->join('student', 'student.student_grade_id', '=', 'student_grade.id')
                        ->select('student.id as id', 'student.enrollment_date', 'student_grade.id as student_grade_id', 'student_grade.grade', 'student_grade.normalized_grade')
                        ->get();

        if (isset($resposta) && !empty($resposta)) {
        	// Update normalized grade
        	foreach ($resposta as $student) {

        		$normalized = $this->normalizeGrade($student->grade, $student->enrollment_date);
        		$newStudent = StudentGrade::find($student->student_grade_id);
        		$newStudent->normalized_grade = $normalized;
        		$newStudent->save();
        	}
        }
	}

    public function listAll()
    {
    	$this->updateNormalizedGrade();
        $students = DB::table('student')
                        ->join('student_grade', 'student.student_grade_id', '=', 'student_grade.id')
                        ->select('student.*', 'student_grade.grade', 'student_grade.normalized_grade')
                        ->where('student.deleted', '=', '0')
                        ->get();

        $studentsId = array();

        foreach ($students as $s) {
        	$studentsId[] = $s->id;
        	$s->project_name = '';
        }

        $now = time();
        $projects = DB::table('project')
        				->join('project_manager', 'project.id', '=', 'project_manager.project_id')
        				->select('project.name', 'project_manager.student_matricula')
        				->whereIn('project_manager.student_matricula', $studentsId)
        				->where('project_manager.end_date', '>=', $now)
        				->orderBy('project_manager.end_date', 'asc')
        				->get();
        
        if (!empty($projects)) {
	        foreach ($students as &$s) {
	        	foreach ($projects as $p) {
	        		if ($p->student_matricula == $s->id) {
	        			$s->project_name = $p->name;
	        			
	        		}
	        	}
	        }
	    }


        return view('telas.alunos')-> with('resposta', $students);
    }

    public function add()
    {
        return view('telas.cadastrarAluno');
    }

    public function added()
    {
	    $params = Request::all();
			if( !(StudentGrade::where('student_matricula', '=', $params['matricula'])-> exists()) ){
				$studentGrade = new StudentGrade(array("student_matricula" => $params['matricula'], "grade" => $params['nota'], "normalized_grade" => $this->normalizeGrade($params['nota'], $params['semestre_entrada'])));
	    	$studentGrade->save();

	    	$params = array_merge($params, array('student_grade_id' => $studentGrade->id, 'id' => $params['matricula'], "enrollment_date"=>$params['semestre_entrada']));

	    	$student = new Student($params);
	    	$student->save();

	    	return redirect()->action('StudentController@listAll') ->withInput(Request::only('nome'));
		}
		else
			return view('telas.cadastrarAluno');
	}

    public function edit($id)
    {
	    $resposta = Student::find($id);
	    if(empty($resposta)) {
	      return "Esse Aluno não existe";
	    }
	    $resposta = DB::table('student')
                        ->join('student_grade', 'student.student_grade_id', '=', 'student_grade.id')
                        ->select('student.*', 'student_grade.grade')
                        ->where('student.id', '=', $id)
                        ->get();
	    return view('telas.editarAluno')->with('data', $resposta[0]);
	}

	public function edited($id)
	{
	    $params = Request::all();

	    $student = Student::findOrFail($id);
	    $studentGradeId = $student->student_grade_id;

	    $student->name = $params['nome'];
	    $student->id = $params['matricula'];
	    $student->enrollment_date = $params['semestre_entrada'];
	    $student->save();

	    $studentGrade = StudentGrade::findOrFail($studentGradeId);
	    $studentGrade->grade = $params["nota"];
	    $studentGrade->save();

	    return redirect()->action('StudentController@listAll') ->withInput(Request::only('nome'));
	}

	public function delete($id)
	{
	    $student = Student::find($id);
	    $student->deleted = 1;
	    $student->save();

	    return redirect()->action('StudentController@listAll');
	}

	public function assign($id)
	{
	    $student = Student::find($id);
	    if(empty($student)) {
	      return "Esse Aluno não existe";
	    }
	    $projects = DB::table('project')
                        ->join('agencia_fomentadora', 'agencia_fomentadora.id', '=', 'project.agencia_fomentadora_id')
                        ->select('project.id as project_id', 
                        		'project.name as project_name',
                        		'agencia_fomentadora.abv as agencia_fomentadora_abv'
                        		)
                        ->get();
        $professors = Professor::all();

        $data = array(
        	'student' => $student,
        	'projects' => $projects,
        	'professors' => $professors
        );
	    return view('telas.atribuirBolsa')->with('data', $data);
	}

	public function assigned($id){
      $params = Request::all();
      $student = Student::find($id);
      if(empty($student)) {
	      return "Esse Aluno não existe";
	  }
	  $today = time();
      $projectManager = new ProjectManager(
      	array(
      		'project_id' => $params['bolsa'],
      		'student_matricula' => $id,
      		'professor_matricula' => $params['professor'],
      		'start_date' => $today, 
	    	'end_date' => strtotime('+'. $params['duracao'] * 30 . ' days', $today)
      	)
      );
      $projectManager->save();

      return redirect()->action('StudentController@listAll');
    }

    public function revoke($id){

      $params = Request::all();
      $student = Student::find($id);
      if(empty($student)) {
	      return "Esse Aluno não existe";
	  }
	  
	  $today = time();
	  $projectManager = ProjectManager::all();
	  
	  foreach ($projectManager as $project)  {
	  	if ($project->end_date >= $today) {
	  		$project->end_date = $today;
	  		$project->save();
	  	}
	  }

      return redirect()->action('StudentController@listAll');
    }

    public function remove($id)
	{
	    $student = Student::find($id);
	    if(empty($student)) {
	      return "Esse Aluno não existe";
	    }

        $data = array(
        	'student' => $student,
        );
	    return view('telas.removerAluno')->with('data', $data);
	}

	public function revogar($id)
	{
	    $student = Student::find($id);
	    if(empty($student)) {
	      return "Esse Aluno não existe";
	    }

	    $projects = DB::table('project')
	    				->join('project_manager', 'project_manager.project_id', '=', 'project.id')
                        ->select('project.name')
                        ->where('project_manager.student_matricula', '=', $student->id)
                        ->get();

        $data = array(
        	'student' => $student,
        	'project' => $projects[0]
        );

	    return view('telas.revogarBolsa')->with('data', $data);
	}



}