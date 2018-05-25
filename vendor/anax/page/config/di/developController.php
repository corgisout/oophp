<?php
/**
 * Configuration file for DI container.
 */
return [

    // Services to add to the container.
    "services" => [
        "developController" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Anax\Page\DevelopController();
                $obj->setDI($this);
                return $obj;
            }
        ],
    ],
];
