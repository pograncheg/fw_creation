<?php
namespace Fw\Core;

// use Fw\Example;
final class Application
{
    private ?object $pager = null;
    private ?object $request = null;
    private ?object $server = null;
    private ?object $session = null;
    private ?object $config = null;

    private function __construct()
    {
        $this->pager = InstanceContainer::getInstance(Page::class);
        $this->request = InstanceContainer::getInstance(\Fw\Core\Type\Request::class);
        $this->server = InstanceContainer::getInstance(\Fw\Core\Type\Server::class);
        $this->session = InstanceContainer::getInstance(\Fw\Core\Type\Session::class);
        $this->config = new Config;
    }

    public static function getObj() : self
    {
        return new self;
    }

    public function getPager() : object
    {
        return $this->pager;
    }

    public function getRequest() : object
    {
        return $this->request;
    }

    public function getServer() : object
    {
        return $this->server;
    }

    public function getSession() : object
    {
        return $this->session;
    }

    public function header() : void
    {
        $this->startBuffer();

        $id = $this->config->get('template/id');
        include_once "./Fw/templates/$id/header.php"; 

        $this->pager->addString("<link rel='icon' href='https://cdn-icons-png.flaticon.com/512/5541/5541717.png' type='image/x-icon'>");
        $this->pager->addCss('Fw/assets/main.css');
        $this->pager->setProperty('title', 'MySite');
        $this->pager->setProperty('h1', 'Главная');
    }

    public function footer() : void
    {
        $id = $this->config->get('template/id');
        include_once "./Fw/templates/$id/footer.php";
        $content = $this->endBuffer();
        $this->restartBuffer();
        echo $content;
    }

    public function startBuffer() : void
    {
        ob_start();
    }

    public function endBuffer() : string
    {
        $content = ob_get_contents();
        $arrReplace = $this->pager->getAllReplace();
        $arrReplace["#FW_PAGE_MACRO_JS#"] = $this->pager->getJs();
        $arrReplace["#FW_PAGE_MACRO_CSS#"] = $this->pager->getCss();
        $arrReplace["#FW_PAGE_MACRO_STRING#"] = $this->pager->getString();
        // $arrReplace["#FW_PAGE_MACRO_HEAD#"] = $this->pager->getHead();
        $content = str_replace(array_keys($arrReplace), array_values($arrReplace), $content);
        return $content;
    }

    public function restartBuffer() : void
    {
        ob_end_clean();
    }

    public function includeComponent(string $component, string $template, array $params)
    {
        $namespace = explode(':', $component)[0];
        $componentId = explode(':', $component)[1]; 
        $componentPath = 'fw/components/' . $namespace;
        if (!file_exists($componentPath . '/' . $componentId . '.class.php')) {
            return;
        }
        $componentName = str_replace('/', '\\', $componentPath . '/' . $componentId);
        $obj = new $componentName($componentId, $params, $componentPath);
        $obj->template = new \Fw\Core\Component\Template($template, $obj);
        $obj->template->__path = $componentPath . '/templates/' . $obj->template->id . '/';
        $obj->template->__relativePath = 'localhost/' . $obj->template->__path;
        $obj->executeComponent();
        $obj->template->includeTemplate($obj->params, $obj->result);
        // $obj->template->render('result_modifier.php');
        // $obj->template->render('template');
        // $obj->template->render('component_epilog.php');
        $this->pager->addCss($obj->template->__path . 'style.css');
        $this->pager->addJs($obj->template->__path . 'script.js');
        // $obj->template->render('template');
    }

}