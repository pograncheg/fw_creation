<?php
namespace Fw\Core;

final class Application
{
    private ?object $pager = null;

    private ?object $config = null;

    private function __construct()
    {
        $this->pager = InstanceContainer::getInstance(Page::class);
        $this->config = new Config;
    }

    public static function get() : self
    {
        return new self;
    }

    public function getPager() : object
    {
        return $this->pager;
    }

    public function header() : void
    {
        $id = $this->config->get('template/id');
        include_once "./Fw/templates/$id/header.php";
    }

    public function footer() : void
    {
        $id = $this->config->get('template/id');
        include_once "./Fw/templates/$id/footer.php";
    }

    public function startBuffer() : void
    {
        ob_start();
    }

    public function endBuffer() : string
    {
        $content = ob_get_contents();
        $this->pager->addString("<link rel='icon' href='https://cdn-icons-png.flaticon.com/512/5541/5541717.png' type='image/x-icon'>");
        $this->pager->addCss('/Fw/assets/main.css');
        $this->pager->setProperty('title', 'MySite');
        $this->pager->setProperty('h1', 'Главная');
        $arrReplace = $this->pager->getAllReplace();
        $arrReplace["#FW_PAGE_MACRO_HEAD#"] = $this->pager->getHead();
        $content = str_replace(array_keys($arrReplace), array_values($arrReplace), $content);
        return $content;
    }

    public function restartBuffer() : void
    {
        ob_end_clean();
    }
}