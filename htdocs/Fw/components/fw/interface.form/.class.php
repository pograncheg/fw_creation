<?php
namespace Fw;

class Form extends \Fw\Core\Component\Base

{
    public function executeComponent()
    {
        $this->result['title'] = ['Название страницы'];
        $this->result['h2'] = ['наш шаблон'];
        $this->template->includeTemplate($this->params, $this->result);
    }

}