<?php

namespace Chargebee\Chargebee;

class ChargeBee_ListResult implements Countable, ArrayAccess, Iterator
{
    protected $_items;
    private $response;

    private $nextOffset;

    private $_index;

    public function __construct($response, $nextOffset)
    {
        $this->response = $response;
        $this->nextOffset = $nextOffset;
        $this->_items = [];
        $this->_initItems();
    }

    public function nextOffset()
    {
        return $this->nextOffset;
    }

    public function count()
    {
        return count($this->_items);
    }

    //Implementation for ArrayAccess functions
    public function offsetSet($k, $v)
    {
        $this->{$k} = $v;
    }

    public function offsetExists($k)
    {
        return isset($this->{$k});
    }

    public function offsetUnset($k)
    {
        unset($this->{$k});
    }

    public function offsetGet($k)
    {
        return isset($this->list[$k]) ? $this->list[$k] : null;
    }

    //Implementation for Iterator functions
    public function current()
    {
        return $this->_items[$this->_index];
    }

    public function key()
    {
        return $this->_index;
    }

    public function next()
    {
        ++$this->_index;
    }

    public function rewind()
    {
        $this->_index = 0;
    }

    public function valid()
    {
        if ($this->_index < count($this->_items)) {
            return true;
        }

        return false;
    }

    public function toJson()
    {
        return json_encode($this->response);
    }

    private function _initItems()
    {
        foreach ($this->response as $r) {
            array_push($this->_items, new Result($r));
        }
    }
}
