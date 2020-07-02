<?php

namespace cubinx;

use cubinx\Loader;

class Core
{
    public static function run()
    {

    }

    private static function setup()
    {
        Loader::load();
    }
}