<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Student;
use App\StudentGrade;
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
        $resposta = DB::table('student')
                        ->join('student_grade', 'student.student_grade_id', '=', 'student_grade.id')
                        ->select('student.*', 'student_grade.grade', 'student_grade.normalized_grade')
                        ->get();

        return view('telas.alunos')-> with('resposta', $resposta);
    }

    public function add()
    {
        return view('telas.cadastrarAluno');
    }

    public function added()
    {
	    $params = Request::all();
	    $studentGrade = new StudentGrade(array("student_matricula" => $params['matricula'], "grade" => $params['nota'], "normalized_grade" => $this->normalizeGrade($params['nota'], $params['semestre_entrada'])));
	    $studentGrade->save();
	    
	    $params = array_merge($params, array('student_grade_id' => $studentGrade->id, 'id' => $params['matricula'], "enrollment_date"=>$params['semestre_entrada']));

	    $student = new Student($params);
	    $student->save();

	    return redirect()->action('StudentController@listAll') ->withInput(Request::only('nome'));
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

	    $student->fill($params)->save();

	    $studentGrade = StudentGrade::findOrFail($studentGradeId);
	    $studentGrade->fill(array('grade' => $params["nota"]))->save();

	    return redirect()->action('StudentController@listAll') ->withInput(Request::only('nome'));
	}

	public function delete($id)
	{
	    $student = Student::find($id);
	    $studentGradeId = StudentGrade::find($student->student_grade_id);
	    $student->delete();
	    $studentGradeId->delete();

	    return redirect()->action('StudentController@listAll');
	}

	public function assign($id)
	{
	    $student = Student::find($id);
	    if(empty($student)) {
	      return "Esse Aluno não existe";
	    }
	    $projects = DB::table('project')
                        ->join('project_manager', 'project.id', '=', 'project_manager.project_id')
                        ->join('agencia_fomentadora', 'agencia_fomentadora.id', '=', 'project_manager.agencia_fomentadora_id')
                        ->join('professor', 'professor.id', '=', 'project_manager.professor_matricula')
                        ->select('project.id as project_id', 
                        		'project.name as project_name',
                        		'agencia_fomentadora.abv as agencia_fomentadora_abv',
                        		'professor.name as professor_name'
                        		)
                        ->get();

        $data = array(
        	'student' => $student,
        	'projects' => $projects
        );
        // var_dump($data);
        // die;
	    return view('telas.atribuirBolsa')->with('data', $data);
	}

	public function assigned($id){
      $params = Request::all();
      $student = Student::find($id);

      return redirect()->action('StudentController@listAll');
    }

    public function revoke($id){

      $params = Request::all();
      $student = Student::find($id);

      return redirect()->action('StudentController@listAll');
    }

}