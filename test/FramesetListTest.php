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
        $this->assertEquals(17531, $this->framesetList->size());
    }

    public function testArgSize()
    {
        $count = 0;
        for ($i = 0; $i < $this->framesetList->size(); $i++) {
            $count += count($this->framesetList->getFrameSet($i)->getFramesetArguments());
        }
        $this->assertEquals(29473, $count);
    }

    public function testCase()
    {
        $caseList = [];
        for ($i = 0; $i < $this->framesetList->size(); $i++) {
            foreach ($this->framesetList->getFrameSet($i)->getFramesetArguments() as $argument) {
                if (str_contains($argument->getGrammaticalCase(), "abl")){
                    if (isset($caseList["abl"])) {
                        $caseList["abl"]++;
                    } else {
                        $caseList["abl"] = 1;
                    }
                }
                if (str_contains($argument->getGrammaticalCase(), "acc")){
                    if (isset($caseList["acc"])) {
                        $caseList["acc"]++;
                    } else {
                        $caseList["acc"] = 1;
                    }
                }
                if (str_contains($argument->getGrammaticalCase(), "dat")){
                    if (isset($caseList["dat"])) {
                        $caseList["dat"]++;
                    } else {
                        $caseList["dat"] = 1;
                    }
                }
                if (str_contains($argument->getGrammaticalCase(), "gen")){
                    if (isset($caseList["gen"])) {
                        $caseList["gen"]++;
                    } else {
                        $caseList["gen"] = 1;
                    }
                }
                if (str_contains($argument->getGrammaticalCase(), "ins")){
                    if (isset($caseList["ins"])) {
                        $caseList["ins"]++;
                    } else {
                        $caseList["ins"] = 1;
                    }
                }
                if (str_contains($argument->getGrammaticalCase(), "loc")){
                    if (isset($caseList["loc"])) {
                        $caseList["loc"]++;
                    } else {
                        $caseList["loc"] = 1;
                    }
                }
                if (str_contains($argument->getGrammaticalCase(), "nom")){
                    if (isset($caseList["nom"])) {
                        $caseList["nom"]++;
                    } else {
                        $caseList["nom"] = 1;
                    }
                }
            }
        }
        $this->assertEquals(418, $caseList["abl"]);
        $this->assertEquals(4633, $caseList["acc"]);
        $this->assertEquals(2402, $caseList["dat"]);
        $this->assertEquals(870, $caseList["gen"]);
        $this->assertEquals(451, $caseList["ins"]);
        $this->assertEquals(666, $caseList["loc"]);
        $this->assertEquals(2049, $caseList["nom"]);
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
        $this->assertEquals(14535, $nameList["ARG0"]);
        $this->assertEquals(12996, $nameList["ARG1"]);
        $this->assertEquals(1865, $nameList["ARG2"]);
        $this->assertEquals(76, $nameList["ARG3"]);
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
        $this->assertEquals(475, $functionList["com"]);
        $this->assertEquals(14, $functionList["ext"]);
        $this->assertEquals(808, $functionList["loc"]);
        $this->assertEquals(195, $functionList["rec"]);
        $this->assertEquals(13, $functionList["pat"]);
        $this->assertEquals(10579, $functionList["ppt"]);
        $this->assertEquals(597, $functionList["src"]);
        $this->assertEquals(794, $functionList["gol"]);
        $this->assertEquals(156, $functionList["tmp"]);
        $this->assertEquals(14425, $functionList["pag"]);
        $this->assertEquals(1417, $functionList["dir"]);
    }

}
