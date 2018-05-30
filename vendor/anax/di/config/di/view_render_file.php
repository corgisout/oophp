<?php
/**
 * Configuration file for DI container.
 */
return [

    // Services to add to the container.
    "services" => [
        "viewRenderFile" => [
            "shared" => true,
            "callback" => function () {
                $viewRender = new \Anax\View\ViewRenderFile2();
                $viewRender->setDI($this);
                return $viewRender;
            }
        ],
    ],
];
