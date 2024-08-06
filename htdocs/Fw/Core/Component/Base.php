<?php
namespace Fw\Core\Component;

abstract class Base
{
    public $result;
    public $id;
    public $params;
    public $template;
    public $__path;

    public abstract function executeComponent();

    public function __construct($id, $params, $__path, $template)
    {
        $this->id = $id;
        $this->params = $params;
        $this->__path = $__path;
        if ($template !== null) {
            $this->template = new Template($template, $this);
        }
    }

}