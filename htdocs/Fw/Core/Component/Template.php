<?php
namespace Fw\Core\Component;

class Template
{
    public $id;
    public $__relativePath;
    public $__path;

    public function __construct(string $id, $component)
    {
        $this->id = $id;
    }

    public function render(string $page = "template")
    {
        if (!file_exists($this->__path . $page . '.php')) {
            return;
        }
        include $this->__path . $page . '.php';
    }

    public function includeTemplate($params, $result)
    {
        $this->render('result_modifier.php');
        $this->render('template');
        $this->render('component_epilog.php');
    }
}