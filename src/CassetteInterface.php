<?php

namespace My\App;

interface CassetteInterface
{
    public function read();
    public function isOver();
    public function rewind();
}