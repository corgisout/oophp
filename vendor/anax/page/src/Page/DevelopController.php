<?php

namespace Anax\Page;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

/**
 * A default page rendering class.
 */
class DevelopController implements InjectionAwareInterface
{
    use InjectionAwareTrait;



    /**
     * @var string $namespace A namespace to prepend each template file.
     */
    private $namespace = "anax/v1/dev";



    /**
     * Render a page showing a menu with links to all dev pages.
     *
     * @return void
     */
    public function index()
    {
        $this->di->get("view")->add("{$this->namespace}/index");
        $this->di->get("page")->render([
            "title" => "Anax development utilitites",
        ]);
    }



    /**
     * Render a page displaying information on services loaded in $di.
     *
     * @return void
     */
    public function di()
    {
        $this->di->get("view")->add("{$this->namespace}/di");
        $this->di->get("page")->render([
            "title" => "Show loaded services in \$di",
        ]);
    }



    /**
     * Render a page displaying information on the current request.
     *
     * @return void
     */
    public function request()
    {
        $this->di->get("view")->add("{$this->namespace}/request");
        $this->di->get("page")->render([
            "title" => "Details on current request",
        ]);
    }



    /**
     * Render a page displaying information on routes loaded in framework.
     *
     * @return void
     */
    public function route()
    {
        $this->di->get("view")->add("{$this->namespace}/route");
        $this->di->get("page")->render([
            "title" => "Show loaded routes",
        ]);
    }



    /**
     * Render a page displaying session data.
     *
     * @return void
     */
    public function session()
    {
        $this->di->get("view")->add("{$this->namespace}/session");
        $this->di->get("page")->render([
            "title" => "Show session data",
        ]);
    }



    /**
     * Render a page displaying details on view helpers.
     *
     * @return void
     */
    public function view()
    {
        $this->di->get("view")->add("{$this->namespace}/view");
        $this->di->get("page")->render([
            "title" => "View helpers",
        ]);
    }
}
