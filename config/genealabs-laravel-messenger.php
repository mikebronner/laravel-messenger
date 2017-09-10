<?php

return [

    /*
    |--------------------------------------------------------------------------
    | CSS Framework Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure the CSS framework to be used by Messenger for
    | Laravel. This allows you to switch or upgrade frameworks without
    | having to recreate all your alerts.
    |
    | Available Settings: "bootstrap3", "bootstrap4"
    |
    */

    'framework' => 'bootstrap4',

    /*
    |--------------------------------------------------------------------------
    | JavaScript Blade Section
    |--------------------------------------------------------------------------
    |
    | Your layout blade template will need to have a section dedicated to
    | inline JavaScript methods and commands that are injected by this
    | package. This will eliminate conflicts with Vue, as well as
    | making sure that JS is run after all deps are loaded.
    |
    */

    'javascript-blade-section' => 'js',

];
