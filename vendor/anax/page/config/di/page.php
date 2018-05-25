<?php
/**
 * Configuration file for DI container.
 */
return [

    // Services to add to the container.
    "services" => [
        "page" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Anax\Page\Page();
                $obj->setDI($this);
                return $obj;
            }
        ],
    ],
];
