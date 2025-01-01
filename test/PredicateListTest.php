<?php

use olcaytaner\Propbank\PredicateList;
use PHPUnit\Framework\TestCase;

class PredicateListTest extends TestCase
{

    public function setUp(): void
    {
        $this->predicateList = new PredicateList();
    }

    public function testPredicateSize(){
        $this->assertEquals(8656, $this->predicateList->size());
    }

    public function testRoleSetSize(){
        $count = 0;
        foreach ($this->predicateList->getLemmaList() as $lemma){
            $count += $this->predicateList->getPredicate($lemma)->size();
        }
        $this->assertEquals(10685, $count);
    }

    public function testFunction(){
        $functionList = [];
        foreach ($this->predicateList->getLemmaList() as $lemma){
            for ($i = 0; $i < $this->predicateList->getPredicate($lemma)->size(); $i++){
                for ($j = 0; $j < $this->predicateList->getPredicate($lemma)->getRoleSet($i)->size(); $j++){
                    $function = $this->predicateList->getPredicate($lemma)->getRoleSet($i)->getRole($j)->getF();
                        if (isset($functionList[$function])){
                            $functionList[$function]++;
                        } else {
                            $functionList[$function] = 1;
                        }
                    }
                }
            }
            $this->assertEquals(197, $functionList["com"]);
            $this->assertEquals(292, $functionList["ext"]);
            $this->assertEquals(580, $functionList["loc"]);
            $this->assertEquals(1104, $functionList["prd"]);
            $this->assertEquals(2395, $functionList["gol"]);
            $this->assertEquals(19, $functionList["adj"]);
            $this->assertEquals(980, $functionList["dir"]);
            $this->assertEquals(118, $functionList["prp"]);
            $this->assertEquals(1007, $functionList["mnr"]);
            $this->assertEquals(4, $functionList["rec"]);
            $this->assertEquals(679, $functionList["vsp"]);
            $this->assertEquals(14, $functionList["adv"]);
            $this->assertEquals(10282, $functionList["ppt"]);
            $this->assertEquals(267, $functionList["cau"]);
            $this->assertEquals(37, $functionList["tmp"]);
            $this->assertEquals(9105, $functionList["pag"]);
    }

    public function testN(){
        $nList = [];
        foreach ($this->predicateList->getLemmaList() as $lemma){
            for ($i = 0; $i < $this->predicateList->getPredicate($lemma)->size(); $i++){
                for ($j = 0; $j < $this->predicateList->getPredicate($lemma)->getRoleSet($i)->size(); $j++){
                    $n = $this->predicateList->getPredicate($lemma)->getRoleSet($i)->getRole($j)->getN();
                    if (isset($nList[$n])){
                        $nList[$n]++;
                    } else {
                        $nList[$n] = 1;
                    }
                }
            }
        }
        $this->assertEquals(8906, $nList["0"]);
        $this->assertEquals(10375, $nList["1"]);
        $this->assertEquals(5934, $nList["2"]);
        $this->assertEquals(1313, $nList["3"]);
        $this->assertEquals(417, $nList["4"]);
        $this->assertEquals(57, $nList["5"]);
        $this->assertEquals(6, $nList["6"]);
        $this->assertEquals(72, $nList["m"]);
    }

}
