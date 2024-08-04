<?php
namespace Fw\Core\Type;

abstract class Dictionary implements \IteratorAggregate, \ArrayAccess, \Countable, \JsonSerializable
{
    private bool $readonly;
    private array $values;
    
    //интерфейс IteratorAggregate
    public function getIterator() : \Traversable
    {
        return new \ArrayIterator($this->values);
    }
    //__________________________________________
    //интерфейс ArrayAccess
    public function offsetSet($offset, $value): void 
    {
        if (is_null($offset)) {
            $this->values[] = $value;
        } else {
            $this->values[$offset] = $value;
        }
    }

    public function offsetExists($offset): bool 
    {
        return isset($this->values[$offset]);
    }

    public function offsetUnset($offset): void 
    {
        unset($this->values[$offset]);
    }

    public function offsetGet($offset): mixed 
    {
        return isset($this->values[$offset]) ? $this->values[$offset] : null;
    }
    //__________________________________________
    //интерфейс Countable
    public function count() : int 
    {
        return count($this->values);
    }
    //__________________________________________
    //интерфейс JsonSerializable
    public function jsonSerialize() : mixed    
    {    
        return json_encode($this->values);
        // return serialize($this->values);    
    }    
    //__________________________________________

    public function get($name)
    {
        return $this->values[$name];
    }

    public function set($name, $value)
    {
        if ($this->readonly) {
            return;
        }
        $this->values[$name] = $value;
    }

    public function __construct($values, bool $readonly = false)
    {
        $this->readonly = $readonly;
        $this->values = $values;
    }

    public function getValues()
    {
        return $this->values;
    }

    public function setValues($values)
    {
        if ($this->readonly) {
            return;
        }
        $this->values = $values;
    }

    public function clear()
    {
        if ($this->readonly) {
            return;
        }
        $this->values = [];
    }

}