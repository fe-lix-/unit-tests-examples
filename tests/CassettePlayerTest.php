<?php

namespace My\App;

class CassettePlayerTest extends \PHPUnit_Framework_TestCase
{
    public function testPlayLoop()
    {
        $cassette = $this->getMock('My\App\CassetteInterface');

        $cassette->expects($this->at(0))
            ->method('isOver')
            ->willReturn(false);
        $cassette->expects($this->at(1))
            ->method('read');
        $cassette->expects($this->at(2))
            ->method('isOver')
            ->willReturn(true);
        $cassette->expects($this->at(3))
            ->method('rewind');

        $player = new CassettePlayer($cassette);

        $player->playAndRewind();
    }
}