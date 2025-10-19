<?php

use olcaytaner\Propbank\ArgumentList;
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

    public function testArgumentList(){
        $list = new ArgumentList("PREDICATE\$TUR10-000000");
        $this->assertCount(1, $list->getArguments());
        $this->assertTrue($list->containsArgument("PREDICATE", "TUR10-000000"));
        $list = new ArgumentList("PREDICATE\$TUR10-000000#ARG0\$TUR10-000001");
        $this->assertCount(2, $list->getArguments());
        $this->assertTrue($list->containsArgument("ARG0", "TUR10-000001"));
    }
}
