<?php

namespace Fw;

use Fw\Core\InstanceContainer;
use Fw\Core\Page;
use \Fw\Core\Component\Base;

class Form extends Base

{
    public function executeComponent()
    {
        $this->result['form'] = [
            'str' => '',
            'additional class' => ''
        ];
        $this->result['elements'] = [];
        $form = array_diff_key($this->params, ['elements' => '']);
        foreach ($form as $attr => $value) {
            switch ($attr) {
                case 'additional_class':
                    $this->result['form']['additional_class'] = $value;
                    break;
                case 'attr':
                    foreach ($value as $attrName => $attr) {
                        $this->result['form']['str'] .= " $attrName=$attr ";
                    }
                    break;
                default:
                    $this->result['form']['str'] .= " $attr=$value ";
                    break;
            }
        }
        foreach ($this->params['elements'] as $el) {
            $this->result['elements'][$el['name']] = ["component" => "fw:interface.form.{$el['type']}", 'template' => 'main', 'params' => $el];
        }
        $this->template->includeTemplate();
        InstanceContainer::getInstance(Page::class)->setProperty($this->id . '_title', 'Форма для заполнения');
    }
}
