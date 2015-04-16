<?php

namespace My\App;

class CassettePlayer
{
    private $cassette;

    public function __construct(CassetteInterface $cassette)
    {
        $this->cassette = $cassette;
    }

    public function playAndRewind()
    {
        while (!$this->cassette->isOver()) {
            $this->cassette->read();
        }

        $this->cassette->rewind();
    }
}
