<?php

namespace My\App;

class CassettePlayerExpressiveTest extends \PHPUnit_Framework_TestCase
{
    private $cassette;
    private $cassetteCounter;

    public function setUp()
    {
        $this->cassette = $this->getMock('My\App\CassetteInterface');
        $this->cassetteCounter = 0;
    }

    public function testPlayLoop()
    {
        $this->cassetteWillNotBeOver();
        $this->cassetteWillBeRead();
        $this->cassetteWillBeOver();
        $this->cassetteWillBeRewinded();

        $player = new CassettePlayer($this->cassette);

        $player->playAndRewind();
    }

    private function cassetteWillNotBeOver()
    {
        $this->cassette->expects($this->at($this->cassetteCounter++))
            ->method('isOver')
            ->willReturn(false);
    }

    private function cassetteWillBeRead()
    {
        $this->cassette->expects($this->at($this->cassetteCounter++))
            ->method('read');
    }

    private function cassetteWillBeOver()
    {
        $this->cassette->expects($this->at($this->cassetteCounter++))
            ->method('isOver')
            ->willReturn(true);
    }

    private function cassetteWillBeRewinded()
    {
        $this->cassette->expects($this->at($this->cassetteCounter++))
            ->method('rewind');
    }
}