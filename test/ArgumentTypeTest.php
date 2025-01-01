<?php

use olcaytaner\Propbank\ArgumentTypeStatic;
use olcaytaner\Propbank\ArgumentType;
use PHPUnit\Framework\TestCase;

class ArgumentTypeTest extends TestCase
{
    public function testArgumentType()
    {
        $this->assertEquals(ArgumentTypeStatic::getArguments("arg0"), ArgumentType::ARG0);
        $this->assertEquals(ArgumentTypeStatic::getArguments("argmdis"), ArgumentType::ARGMDIS);
        $this->assertEquals(ArgumentTypeStatic::getArguments("Arg1"), ArgumentType::ARG1);
        $this->assertEquals(ArgumentTypeStatic::getArguments("Argmdir"), ArgumentType::ARGMDIR);
    }
}
