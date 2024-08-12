<?php
namespace Fw\Core;
use Fw\Core\Type\Request;
use Fw\Core\Type\Server;
use Fw\Core\Type\Session;

// use Fw\Example;
final class Application
{
    private ?object $pager = null;
    private ?object $request = null;
    private ?object $server = null;
    private ?object $session = null;
    private ?object $config = null;
    private array $componentClass = [];

    private function __construct()
    {
        $this->pager = InstanceContainer::getInstance(Page::class);
        $this->request = InstanceContainer::getInstance(Request::class);
        $this->server = InstanceContainer::getInstance(Server::class);
        $this->session = InstanceContainer::getInstance(Session::class);
        $this->config = InstanceContainer::getInstance(Config::class);
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
        include_once $_SERVER['DOCUMENT_ROOT'] . "/Fw/templates/$id/header.php"; 
    }

    public function footer() : void
    {
        $id = $this->config->get('template/id');
        include_once $_SERVER['DOCUMENT_ROOT'] . "/Fw/templates/$id/footer.php";
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
        $content = str_replace(array_keys($arrReplace), array_values($arrReplace), $content);
        return $content;
    }

    public function restartBuffer() : void
    {
        ob_end_clean();
    }

    public function includeComponent(string $component, string|null $template, array $params)
    {
        $namespace = explode(':', $component)[0];
        $componentId = explode(':', $component)[1]; 
        $componentPath = $_SERVER['DOCUMENT_ROOT'] . '/fw/components/' . $namespace . '/' . $componentId . '/';
        if (array_key_exists($component, $this->componentClass)) {
            $componentName = $this->componentClass[$component];
        } else {
            $classesBefore = get_declared_classes();
            if (!file_exists($componentPath . '.class.php')) {
                return;
            }
            include $componentPath . '.class.php';
            $classesAfter = get_declared_classes();
            $newClass = array_diff($classesAfter, $classesBefore);
            foreach ($newClass as $className) {
                if($className !== 'Fw\Core\Component\Base') {
                    $componentName = $className;
                }
            }
            $this->componentClass[$component] = $componentName;
        }
        $obj = new $componentName($componentId, $params, $componentPath, $template);
        // $obj->template = new \Fw\Core\Component\Template($template, $obj);
        $obj->executeComponent();
    }
}