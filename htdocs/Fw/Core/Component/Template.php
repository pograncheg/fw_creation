<?php
namespace Fw\Core\Component;
use \Fw\Core\InstanceContainer;
use \Fw\Core\Page;
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
        $this->render('result_modifier');
        $this->render('template');
        $this->render('component_epilog');
        if (file_exists($this->__path . 'style.css')) {
            InstanceContainer::getInstance(Page::class)->addCss($this->__path . 'style.css');
        }
        if (file_exists($this->__path . 'script.js')) {
            InstanceContainer::getInstance(Page::class)->addJs($this->__path . 'script.js');
        }

    }
}