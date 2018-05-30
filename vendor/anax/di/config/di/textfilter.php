<?php
/**
 * Configuration file for DI container.
 */
return [

    // Services to add to the container.
    "services" => [
        "textfilter" => [
            "shared" => true,
            "callback" => "\Anax\TextFilter\TextFilter",
        ],
    ],
];
