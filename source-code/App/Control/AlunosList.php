<?php

namespace SABolsas\Control;

use SABolsas\Widgets\Datagrid;
use SABolsas\Widgets\Datagrid\DatagridColumn;

class AlunosList extends Page{
    private $datagrid; //listagem
    private $loaded;
    
    public function __construct() {
        parent::__construct();
        
        $this->datagrid = new Datagrid();
        
        $codigo         = new DatagridColumn('id', 'Código');
        $nome           = new DatagridColumn('nome', 'Nome');
        $matricula      = new DatagridColumn('mat', 'Matrícula');
        $cr             = new DatagridColumn('cr', 'Coeficiente de Rendimento');
        $dataEntrada    = new DatagridColumn('dataEntrada', 'Data de Entrada');
        $orientador     = new DatagridColumn('orientador', 'Orientador');
        
    }
}
?>