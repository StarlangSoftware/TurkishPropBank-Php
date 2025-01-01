<?php

use olcaytaner\Propbank\FramesetList;
use PHPUnit\Framework\TestCase;

class FramesetListTest extends TestCase
{
    public function setUp(): void
    {
        $this->framesetList = new FramesetList();
    }

    public function testFrames()
    {
        $this->assertEquals(17691, $this->framesetList->size());
    }

    public function testArgSize()
    {
        $count = 0;
        for ($i = 0; $i < $this->framesetList->size(); $i++) {
            $count += count($this->framesetList->getFrameSet($i)->getFramesetArguments());
        }
        $this->assertEquals(29759, $count);
    }

    public function testArgName()
    {
        $nameList = [];
        for ($i = 0; $i < $this->framesetList->size(); $i++) {
            foreach ($this->framesetList->getFrameSet($i)->getFramesetArguments() as $argument) {
                if (isset($nameList[$argument->getArgumentType()])) {
                    $nameList[$argument->getArgumentType()]++;
                } else {
                    $nameList[$argument->getArgumentType()] = 1;
                }
            }
        }
        $this->assertEquals(14668, $nameList["ARG0"]);
        $this->assertEquals(13126, $nameList["ARG1"]);
        $this->assertEquals(1886, $nameList["ARG2"]);
        $this->assertEquals(78, $nameList["ARG3"]);
        $this->assertEquals(1, $nameList["ARG4"]);
    }

    public function testArgFunction()
    {
        $functionList = [];
        for ($i = 0; $i < $this->framesetList->size(); $i++) {
            foreach ($this->framesetList->getFrameSet($i)->getFramesetArguments() as $argument) {
                if (isset($functionList[$argument->getFunction()])) {
                    $functionList[$argument->getFunction()]++;
                } else {
                    $functionList[$argument->getFunction()] = 1;
                }
            }
        }
        $this->assertEquals(481, $functionList["com"]);
        $this->assertEquals(14, $functionList["ext"]);
        $this->assertEquals(814, $functionList["loc"]);
        $this->assertEquals(198, $functionList["rec"]);
        $this->assertEquals(14, $functionList["pat"]);
        $this->assertEquals(10687, $functionList["ppt"]);
        $this->assertEquals(605, $functionList["src"]);
        $this->assertEquals(801, $functionList["gol"]);
        $this->assertEquals(156, $functionList["tmp"]);
        $this->assertEquals(14557, $functionList["pag"]);
        $this->assertEquals(1432, $functionList["dir"]);
    }

}
