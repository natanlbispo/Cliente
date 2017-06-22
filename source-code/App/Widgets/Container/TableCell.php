<?php
namespace SABolsas\Widgets\Container;

use SABolsas\Widgets\Base\Element;

/**
 * Representa uma célula de uma tabela
 */
class TableCell extends Element
{
    /**
     * instancia uma nova célula
     * @param $value = conteúdo da célula
     */
    public function __construct($value)
    {
        parent::__construct('td');
        parent::add($value);
    }
}
