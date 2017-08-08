<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Project;
use App\Agencia;
use App\ProjectManager;
use App\Professor;
use Request;

class ProjectController extends Controller
{
	public function listAll(){
		setlocale(LC_TIME, "pt_BR");
	    $projects = DB::table('project')
                        ->join('project_manager', 'project.id', '=', 'project_manager.project_id')
                        ->join('agencia_fomentadora', 'agencia_fomentadora.id', '=', 'project_manager.agencia_fomentadora_id')
                        ->select('project.id', 'project.name', 'project.start_date', 'project.end_date', 'agencia_fomentadora.abv')
                        ->get();
	    return view('telas.bolsas')-> with('resposta', $projects);
	}

	public function add(){
		$agencias = Agencia::all();
		$professors = Professor::all();
		$data = array(
			'agencias' => $agencias,
			'professors' => $professors
		);
		return view('telas.cadastrarBolsa')->with('data', $data);
	}

	public function added(){
	    $params = Request::all();
	    $today = time();
	    $project = new Project(
	    	array(
	    		'name' => $params['nome'], 
	    		'start_date' => $today, 
	    		'end_date' => strtotime('+'. $params['duracao'] * 30 . ' days', $today)
	    	)
	    );
	    $project->save();

	    $projectManager = new ProjectManager(
	    	array(
	    		'project_id' => $project->id,
	    		'professor_matricula' => $params['professor'],
	    		'agencia_fomentadora_id' => $params['fomentador']
	    	)
	    );
	    $projectManager->save();

	    return redirect()-> action('ProjectController@listAll')->withInput(Request::only('nome'));
	}

	public function edit($id){
	    $resposta = Project::find($id);
	    if(empty($resposta)) {
	      return "Esse Bolsa não existe";
	    }
	    $project = DB::table('project')
                        ->join('project_manager', 'project.id', '=', 'project_manager.project_id')
                        ->join('agencia_fomentadora', 'agencia_fomentadora.id', '=', 'project_manager.agencia_fomentadora_id')
                        ->select('project.id as project_id', 
                        		'project.name as project_name', 
                        		'project.start_date as project_start_date', 
                        		'project.end_date as project_end_date', 
                        		'agencia_fomentadora.id as agencia_fomentadora_id',
                        		'project_manager.professor_matricula as professor_matricula' 
                        		)
                        ->where('project.id', '=', $id)
                        ->get();

	    $agencias = Agencia::all();
		$professors = Professor::all();
		$data = array(
			'project' => $project[0],
			'agencias' => $agencias,
			'professors' => $professors
		);

	    return view('telas.editarBolsa')->with('data', $data);
	}

	/*
	 * TODO: edited e remove
	 */
	public function edited($id) {
		return redirect()-> action('ProjectController@listAll')->withInput(Request::only('nome'));
	}

	public function delete($id){
	    $resposta = Project::find($id);
	    $resposta->delete();

	    return redirect()->action('ProjectController@listAll');
	  }
}