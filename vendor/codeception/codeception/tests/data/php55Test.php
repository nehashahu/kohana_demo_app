<?php
class php55Test extends PHPUnit_Framework_TestCase
{
    public function testOfTest() {
        $this->assertEquals('PHPUnit_Framework_TestCase', PHPUnit_Framework_TestCase::class);
    }

}