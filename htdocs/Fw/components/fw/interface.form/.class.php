<?php
namespace Fw;

class Form extends \Fw\Core\Component\Base

{
    public function executeComponent()
    {
        $this->result['title'] = ['Название страницы'];
        $this->result['h2'] = ['наш шаблон'];
        $this->template->includeTemplate();
        \Fw\Core\InstanceContainer::getInstance(\Fw\Core\Page::class)->setProperty($this->id . '_title', 'Форма');
    }

}