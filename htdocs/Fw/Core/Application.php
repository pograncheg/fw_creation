<?php
namespace Fw\Core;

final class Application
{
    private object $pager = null;

    private $template = null;

    private function __construct()
    {
        $this->pager = InstanceContainer::getInstance('Fw\Core\Page');
    }

    public static function get() : self
    {
        return new self;
    }

    public function getPager() : object
    {
        return $this->pager;
    }

    public function header(string $id) : void
    {
        include_once "./Fw/templates/$id/header.php";
    }

    public function footer(string $id) : void
    {
        include_once "./Fw/templates/$id/footer.php";
    }

    public function startBuffer() : void
    {
        ob_start();
    }

    public function endBuffer(array $macro, array $change, string $content) : string
    {
        return str_replace($macro, $change, $content);
    }

    public function restartBuffer() : void
    {
        ob_end_clean();
    }
}