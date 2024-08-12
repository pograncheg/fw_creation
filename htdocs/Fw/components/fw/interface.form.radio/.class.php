<?php

namespace Fw;

use \Fw\Core\Component\Base;

class Radio extends Base

{
    public function executeComponent()
    {
        $this->result = $this->getElement($this->params);
        $this->template->includeTemplate();
    }

    public function getElement($params)
    {
        $result['str'] = '';
        foreach ($params as $attr => $value) {
            switch ($attr) {
                case 'additional_class':
                    $result['additional_class'] = $value;
                    break;
                case 'title':
                    $result['title'] = $value;
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
                default:
                    $result['str'] .= " $attr=$value ";
                    break;
            }
        }
        return $result;
    }
}
