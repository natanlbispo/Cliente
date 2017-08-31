<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Project;
use App\Agencia;
use App\ProjectManager;
use App\Professor;
use App\Areap;
use Request;

class ProjectManagerController extends Controller
{
	public function log() {
		 $projects = DB::table('project_manager')
						->join('project', 'project_manager.project_id', '=', 'project.id')
                        ->join('agencia_fomentadora', 'agencia_fomentadora.id', '=', 'project.agencia_fomentadora_id')
                    	->join('student', 'project_manager.student_matricula', '=', 'student.id')
                        ->select('project_manager.project_id as project_id',
                        		'project.name as project_name',
                        		'agencia_fomentadora.abv as agencia_fomentadora_abv',
                        		'student.name as student_name',
                                'project_manager.start_date as start_date',
                                'project_manager.end_date as end_date')
                        ->get();
        $agencias = Agencia::all();
        $areas = Areap::all();

        $data = array(
            'projects' => $projects,
            'agencias' => $agencias,
            'areas' => $areas
        );
        return view('telas.historico')->with('data', $data);
	}

	public function logf() {
        $params = Request::all();

        $agencias = Agencia::all();
        $areas = Areap::all();

		$query = DB::table('project_manager')
						->join('project', 'project_manager.project_id', '=', 'project.id')
                        ->join('agencia_fomentadora', 'agencia_fomentadora.id', '=', 'project.agencia_fomentadora_id')
                    	->join('student', 'project_manager.student_matricula', '=', 'student.id')
                        ->select('project_manager.project_id as project_id',
                        		'project.name as project_name',
                        		'agencia_fomentadora.abv as agencia_fomentadora_abv',
                        		'student.name as student_name',
                                'project_manager.start_date as start_date',
                                'project_manager.end_date as end_date');

        if (isset($params['agencia'])) {
            $query->where('agencia_fomentadora.id', '=', $params['agencia']);
        }
        if (isset($params['area'])) {
            $query->where('agencia_fomentadora.id', '=', $params['area']);
        }
        if (isset($params['dataInicio'])) {
            $query->where('project_manager.start_date', '>=', strtotime($params['dataInicio']));
        }
        if (isset($params['dataFim'])) {
            $query->where('project_manager.end_date', '<', strtotime($params['dataFim'] . " +1 day"));
        }
                        
                        
        $projects = $query->get();
        $data = array(
            'projects' => $projects,
            'agencias' => $agencias,
            'areas' => $areas
        );
        return view('telas.historico')->with('data', $data);
	}
}
