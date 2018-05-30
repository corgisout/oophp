<?php
/**
 * Configuration file for DI container.
 */
return [

    // Services to add to the container.
    "services" => [
        "view" => [
            "shared" => true,
            "callback" => function () {
                $view = new \Anax\View\ViewCollection();
                $view->setDI($this);
                $view->configure("view.php");
                return $view;
            }
        ],
    ],
];
