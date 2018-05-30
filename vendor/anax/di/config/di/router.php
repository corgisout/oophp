<?php
/**
 * Configuration file for DI container.
 */
return [

    // Services to add to the container.
    "services" => [
        "router" => [
            "shared" => true,
            "callback" => function () {
                $router = new \Anax\Route\Router();
                $router->setDI($this);
                return $router;
            }
        ],
    ],
];
