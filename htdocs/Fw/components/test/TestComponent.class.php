<?php
namespace Fw\Components\Test;

class TestComponent extends \Fw\Core\Component\Base

{
    public function __construct()
    {

    }
    public function executeComponent()
    {
        $this->result['title'] = ['Название страницы'];
        $this->result['h2'] = ['наш шаблон'];
    }

}