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
            "method = {$this->params['method']}",
            "action = {$this->params['action']}",
        ];
        if (isset($this->params['additional_class'])) {
            $this->result['form'][] = "class = {$this->params['additional_class']}";
        }
        
        foreach ($this->params['attr'] as $attr => $value) {
            $this->result['form'][] = "$attr = $value";
        }
        foreach ($this->params['elements'] as $el) {
            $this->result['elements'][$el['name']] = $this->getElement($el);
        }
        $this->template->includeTemplate();
        InstanceContainer::getInstance(Page::class)->setProperty($this->id . '_title', 'Форма для заполнения');
    }

    public function getElement($el)
    {
        $result = [
            'str' => ''
        ];
        foreach ($el as $key => $value) {
            switch ($key) {
                case 'type':
                    if ($value === 'select' || $value === 'textarea' || $value === 'radio') {
                        $result['type'] = $value;
                    } else {
                        $result['str'] .= "$key=$value ";
                    }
                    break;
                case 'name':
                    $result['str'] .= "$key=$value ";
                    break;                    
                case 'additional_class':
                    $result['str'] .= " class=$value";
                    break;
                case 'title':
                    $result['title'] = $value;
                    break;
                case 'placeholder':
                    $result['str'] .= " $key=$value";
                    break;
                case 'cols':
                    $result['str'] .= " $key=$value";
                    break;
                case 'rows':
                    $result['str'] .= " $key=$value";
                    break;
                case 'value':
                    $result['str'] .= " $key=$value";
                    break;
                case 'selected':
                    if($value) {
                        $result['str'] .= " $key";
                    }
                    break;
                case 'checked':
                    if($value) {
                        $result['str'] .= " $key";
                    }
                    break;
                case 'attr':
                    foreach ($value as $attrName => $attr) {
                        $result['str'] .= " $attrName=$attr ";
                    }
                    break;
                case 'list':
                    foreach ($value as $attrName => $attr) {
                        $result['options'][] = $this->getElement($attr);
                    }
                    break;
                case 'required':
                    if($value) {
                        $result['str'] .= " $key";
                    }
                    break;
                case 'max':
                    $result['str'] .= " $key=$value";
                    break;
                case 'min':
                    $result['str'] .= " $key=$value";
                    break;
                case 'step':
                    $result['str'] .= " $key=$value";
                    break;
                case 'size':
                    $result['str'] .= " $key=$value";
                    break;
                case 'multiple':
                    if($value) {
                        $result['multiple'] = "$key";
                        // $result = $this->multiple($el, $result);
                        if($el['type'] === 'select') {
                            $result['str'] .= ' multiple';
                        }
                        $result['str'] = str_replace("name={$el['name']}", "name={$el['name']}[]", $result['str']);
                    }
                    break;
            }
        }
        return $result;
    }

    // public function multiple($el, $result)
    // {
    //     if($el['type'] === 'select') {
    //         $result['str'] .= ' multiple';
    //     }
    //     $result['str'] = str_replace("name={$el['name']}", "name={$el['name']}[]", $result['str']);
    //     return $result;
    // }

}
