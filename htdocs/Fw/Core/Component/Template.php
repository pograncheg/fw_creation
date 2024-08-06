<?php
namespace Fw\Core\Component;

class Template
{
    public $id;
    public $__relativePath;
    public $__path;
    public $component;

    public function __construct(string $id, $component)
    {
        $this->id = $id;
        $this->component = $component;
        $this->__path = $component->__path . 'templates/' . $id .'/';
        $this->__relativePath = $_SERVER['SERVER_NAME'] . $component->__path . 'templates/' . $id .'/';
    }

    public function render(string $page = "template")
    {
        if (!file_exists($this->__path . $page . '.php')) {
            return;
        }
        include $this->__path . $page . '.php';
    }

    public function includeTemplate()
    {
        // тут используем параметры и результат работы компонента через $this->component->result (и params)
        $this->render('result_modifier.php');
        $this->render('template');
        $this->render('component_epilog.php');
        if (file_exists($this->__path . 'style.css')) {
            \Fw\Core\InstanceContainer::getInstance(\Fw\Core\Page::class)->addCss($this->__path . 'style.css');
        }
        if (file_exists($this->__path . 'style.css')) {
            \Fw\Core\InstanceContainer::getInstance(\Fw\Core\Page::class)->addJs($this->__path . 'script.js');
        }

    }
}