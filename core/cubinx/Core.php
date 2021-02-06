<?php

namespace cubinx;

class Core
{
    public function __construct()
    {
        $this->setup();
    }

    private function setup()
    {
        Loader::load();
    }
}