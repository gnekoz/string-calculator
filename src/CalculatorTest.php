<?php

use PHPUnit\Framework\TestCase;


class CalculatorTest extends TestCase {

    public function testAddNoNumbers() {
        $calculator = new Calculator;

        $result = $calculator->add("");

        $this->assertEquals(0, $result);
    }

    public function testAddOneNumber() {
        $calculator = new Calculator;

        $result = $calculator->add("2");

        $this->assertEquals(2, $result);
    }

    public function testAddTwoNumbers() {
        $calculator = new Calculator;

        $result = $calculator->add("2,3");

        $this->assertEquals(5, $result);
    }

    public function testAddUnknowAmountOfNumbers() {
        $calculator = new Calculator;

        $result = $calculator->add("4,3,6,8");

        $this->assertEquals(21, $result);
    }

    public function testAddNewLinesInNumbers() {
        $calculator = new Calculator;

        $result = $calculator->add("4,3\n6,8");

        $this->assertEquals(21, $result);
    }
}


class Calculator {

    /**
     * Compute the sum of the numbers
     * 
     * @param string $numbers - The string argument can contain 0, 1 
     *                          or 2 numbers, for example "" or "1" 
     *                          or "1,2".
     *                          The separator can be a comma or a newline
     * @return int - their sum (for an empty string it will return 0) 
     */
    public function add(string $numbers): int
    {
        $numbers = str_replace("\n", ',', $numbers);

        return array_reduce(
            explode(',', $numbers),
            fn($sum, $number) =>  $sum + intval($number),
            0
        );
    }
}