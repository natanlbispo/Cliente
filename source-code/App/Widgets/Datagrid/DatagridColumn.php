<?php
namespace SABolsas\Widgets\Datagrid;

use SABolsas\Control\Action;

/**
 * Representa uma coluna de uma datagrid
 */
class DatagridColumn
{
    private $name;
    private $label;
    
    /**
     * Instancia uma coluna nova
     * @param $name = nome da coluna no banco de dados
     * @param $label = rótulo de texto que será exibido
     */
    public function __construct($name, $label)
    {
        // atribui os parâmetros às propriedades do objeto
        $this->name = $name;
        $this->label = $label;
    }
    
    /**
     * Retorna o nome da coluna no banco de dados
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * Retorna o nome do rótulo de texto da coluna
     */
    public function getLabel()
    {
        return $this->label;
    }
}
