<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/' => [
            [['_route' => 'app_index_indexnolocale', '_controller' => 'App\\Controller\\IndexController::indexNoLocale'], null, null, null, false, false, null],
            [['_route' => 'index', '_controller' => 'App\\Controller\\IndexController::index'], null, null, null, false, false, null],
        ],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/(en|es)(*:15)'
                .'|/_error/(\\d+)(?:\\.([^/]++))?(*:50)'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        15 => [[['_route' => 'homepage', '_controller' => 'App\\Controller\\IndexController::index'], ['_locale'], null, null, true, true, null]],
        50 => [
            [['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
