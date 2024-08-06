<?php
namespace Fw;
use Fw\Core\InstanceContainer;
use Fw\Core\Page;
use \Fw\Core\Component\Base;
class Form extends Base

{
    public function executeComponent()
    {
        $this->result['title'] = ['Название страницы'];
        $this->result['h2'] = ['наш шаблон'];
        $this->template->includeTemplate();
        InstanceContainer::getInstance(Page::class)->setProperty($this->id . '_title', 'Здесь будет наш компонент');
    }

}