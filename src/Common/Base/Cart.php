<?php
namespace MrPrompt\BoletoCaixaEconomicaFederal\Common\Base;

use ArrayObject;

/**
 * Cart
 *
 * @author Thiago Paes <mrprompt@gmail.com>
 */
class Cart extends ArrayObject
{
    /**
     * @param mixed $item
     */
    public function addItem($item)
    {
        $this->append($item);
    }

    /**
     * @param mixed $item
     */
    public function removeItem($item)
    {
        if (!$this->offsetExists($item)) {
            throw new \InvalidArgumentException(sprintf('Item "%s" not exists', $item));
        }

        $this->offsetUnset($item);
    }
}