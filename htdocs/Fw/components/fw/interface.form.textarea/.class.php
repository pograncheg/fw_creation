<?php

namespace Fw;

use \Fw\Core\Component\Base;

class Textarea extends Base

{
    public function executeComponent()
    {
        $this->result['str'] = '';
        foreach ($this->params as $attr => $value) {
            switch ($attr) {
                case 'additional_class':
                    $this->result['additional_class'] = $value;
                    break;
                case 'title':
                    $this->result['title'] = $value;
                    break;
                case 'attr':
                    foreach ($value as $attrName => $attr) {
                        $this->result['str'] .= " $attrName=$attr ";
                    }
                    break;
                default:
                    $this->result['str'] .= " $attr=$value ";
                    break;
            }
        }
        $this->template->includeTemplate();
    }
}
