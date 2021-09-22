<?php

use PHPUnit\Framework\TestCase;
use Revert\Revert;

class revertTest extends TestCase
{
    public function testExpected():void {
        $this->assertEquals('Тевирп! Еынссалк икчо :)', Revert::revertCharacters('Привет! Классные очки :)'));
    }

    public function testCapitalLetterWrong():void {
        $this->assertNotEquals('тевирП! ынссалК икчо :)', Revert::revertCharacters('Привет! Классные очки :)'));
    }

    public function testEmptyString():void {
        $this->assertEquals('', Revert::revertCharacters(''));
    }

    public function testEmptyStringWrong():void {
        $this->assertNotEquals(' ', Revert::revertCharacters(''));
    }

    public function testBlankSpace():void {
        $this->assertEquals(' ', Revert::revertCharacters(' '));
    }

    public function testBlankSpaceWrong():void {
        $this->assertNotEquals('', Revert::revertCharacters(' '));
    }

    public function testOnlyDigits():void {
        $this->assertEquals('321 4 5 6 87 9 211101', Revert::revertCharacters('123 4 5 6 78 9 101112'));
    }

    public function testOnlyDigitsWrong():void {
        $this->assertNotEquals('123 4 5 6 78 9 101112', Revert::revertCharacters('123 4 5 6 78 9 101112'));
    }

    public function testNoBlankSpaces():void {
        $this->assertEquals('Едг.акпонК!ЛЕбоРп???', Revert::revertCharacters('Где.кнопкА!ПРобЕл???'));
    }

    public function testNoBlankSpacesWrong():void {
        $this->assertNotEquals('Леб.орпакП!ОНкеДг???', Revert::revertCharacters('Где.кнопкА!ПРобЕл???'));
    }
}