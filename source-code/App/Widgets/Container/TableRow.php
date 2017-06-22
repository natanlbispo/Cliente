<?php
namespace SABolsas\Widgets\Container;

use SABolsas\Widgets\Base\Element;

/**
 * Representa uma linha de uma tabela
 */
class TableRow extends Element
{
    /**
     * Instancia uma nova linha
     */
    public function __construct()
    {
        parent::__construct('tr');
    }
    
    /**
     * Agrega um novo objeto célula (TTableCell) à linha
     * @param $value = conteúdo da célula
     */
    public function addCell($value)
    {
        // instancia objeto célula
        $cell = new TableCell($value);
        parent::add($cell);
        
        // retorna o objeto instanciado
        return $cell;
    }
}
