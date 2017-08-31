<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Project;
use App\Agencia;
use App\ProjectManager;
use App\Professor;
use App\Areap;
use Request;

class ProjectController extends Controller
{
	public function listAll(){
		setlocale(LC_TIME, "pt_BR");
	    $projects = DB::table('project')
                        ->join('agencia_fomentadora', 'agencia_fomentadora.id', '=', 'project.agencia_fomentadora_id')
                        ->select('project.id', 'project.name', 'project.start_date', 'project.end_date', 'agencia_fomentadora.abv')
                        ->where('project.deleted', '=', '0')
                        ->get();
	    return view('telas.bolsas')-> with('resposta', $projects);
	}

	public function add(){
		$agencias = Agencia::all();
		$data = array(
			'agencias' => $agencias,
		);
		return view('telas.cadastrarBolsa')->with('data', $data);
	}

	public function added(){
	    $params = Request::all();
	    // var_dump($params);
	    // die;
	    $today = time();
	    $project = new Project(
	    	array(
	    		'name' => $params['nome'],
	    		'agencia_fomentadora_id' => $params['fomentador'],
	    		'start_date' => $today,
	    		'end_date' => strtotime('+'. $params['duracao'] * 30 . ' days', $today)
	    	)
	    );
	    $project->save();

	    return redirect()-> action('ProjectController@listAll')->withInput(Request::only('nome'));
	}

	public function calc(){
			return view('telas.cadastrocalculo');
	}

	public function calcn(){
		$params = Request::all();

		DB::table('calc')->insert([
    ['nome' => $param['nome']],
    ['formula' => $params['formula']]
		]);

		return redirect()-> action('ProjectController@calc');
	}

	public function edit($id){
	    $resposta = Project::find($id);
	    if(empty($resposta)) {
	      return "Esse Bolsa não existe";
	    }
	    $project = DB::table('project')
                        ->join('agencia_fomentadora', 'agencia_fomentadora.id', '=', 'project.agencia_fomentadora_id')
                        ->select('project.id as project_id',
                        		'project.name as project_name',
                        		'project.start_date as project_start_date',
                        		'project.end_date as project_end_date',
                        		'agencia_fomentadora.id as agencia_fomentadora_id'
                        		)
                        ->where('project.id', '=', $id)
                        ->get();

	    $agencias = Agencia::all();
		$data = array(
			'project' => $project[0],
			'agencias' => $agencias,
		);

	    return view('telas.editarBolsa')->with('data', $data);
	}

	/*
	 * TODO: edited e remove
	 */
	public function edited($id) {
		$params = Request::all();
		$project = Project::find($id);

		$project->name = $params['nome'];
		$project->agencia_fomentadora_id = $params['fomentador'];

		$project->save();
		return redirect()-> action('ProjectController@listAll')->withInput(Request::only('nome'));
	}

	public function delete($id){
	    $resposta = Project::find($id);
	    $resposta->deleted = 1;
	    $resposta->save();

	    return redirect()->action('ProjectController@listAll');
	}


    public function remove($id)
    {
        $project = Project::find($id);
        if(empty($project)) {
          return "Esse avaliador não existe";
        }

        $data = array(
          'project' => $project,
        );
        return view('telas.removerBolsa')->with('data', $data);
    }
}
