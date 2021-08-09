<?php

include(__DIR__ . "/AutoLoader.php");

$loader = new AutoLoader();
$loader->register(__DIR__ . "/calculateComplexNumbers");
$loader->register(__DIR__ . "/calculateComplexNumbers/interfaces");
$loader->register(__DIR__ . "/calculateComplexNumbers/strategics");

use calculateComplexNumbers\Context;
use calculateComplexNumbers\ComplexNumber;
use calculateComplexNumbers\strategics\Addition;
use calculateComplexNumbers\strategics\Subtraction;
use calculateComplexNumbers\strategics\Multiplication;
use calculateComplexNumbers\strategics\Division;

function testResult(ComplexNumber $complexNumber, float $a, float $b): void
{
    if ($complexNumber->toString() !== ComplexNumber::convertString($a, $b)) {

        echo $complexNumber->toString() . "\n";
        echo ComplexNumber::convertString($a, $b) . "\n";

        throw new Exception("Fail test");
    }
}

function calculateAddition(ComplexNumber $a, ComplexNumber $b): ComplexNumber
{
    $context = new Context($a, $b);
    $context->setStrategy(new Addition());

    return $context->calculate();
}

function testAddition()
{
    testResult(
        calculateAddition(
            new ComplexNumber(1, 3),
            new ComplexNumber(4, -5)
        ),
        5, -2
    );
}

testAddition();

function calculateSubtraction(ComplexNumber $a, ComplexNumber $b): ComplexNumber
{
    $context = new Context($a, $b);
    $context->setStrategy(new Subtraction());

    return $context->calculate();
}

function testSubtraction()
{
    testResult(
        calculateSubtraction(
            new ComplexNumber(1, 3),
            new ComplexNumber(4, -5)
        ),
        -3, 8
    );
}

testSubtraction();

function calculateMultiplication(ComplexNumber $a, ComplexNumber $b): ComplexNumber
{
    $context = new Context($a, $b);
    $context->setStrategy(new Multiplication());

    return $context->calculate();
}

function testMultiplication(): void
{
    testResult(
        calculateMultiplication(
            new ComplexNumber(1, -1),
            new ComplexNumber(3, 6)
        ),
        9, 3
    );
}

testMultiplication();

function calculateDivision(ComplexNumber $a, ComplexNumber $b): ComplexNumber
{
    $context = new Context($a, $b);
    $context->setStrategy(new Division());
    return $context->calculate();
}

function testDivision(): void
{
    testResult(
        calculateDivision(
            new ComplexNumber(13, 1),
            new ComplexNumber(7, 6)
        ),
        1, 1
    );
}

testDivision();


echo "Success test!";
