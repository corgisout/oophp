<?php
/**
 * Configuration file for DI container.
 */
return [

    // Services to add to the container.
    "services" => [
        "session" => [
            "shared" => true,
            "callback" => function () {
                $session = new \Anax\Session\SessionConfigurable();
                $session->configure("session.php");
                return $session;
            }
        ],
    ],
];
