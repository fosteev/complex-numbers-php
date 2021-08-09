<?php

namespace calculateComplexNumbers\strategics;

use calculateComplexNumbers\ComplexNumber;
use calculateComplexNumbers\Strategy;

/**
 * Класс реализации вычитания
 * вычитаемое нужно взять в скобки, а затем – стандартно раскрыть эти скобки со сменой знака
 */
class Subtraction implements Strategy {
    public function calculate(ComplexNumber $a, ComplexNumber $b): ComplexNumber
    {

        $bInParentheses = new ComplexNumber($b->a, $b->b, true);
        $complexB = $bInParentheses->expandParentheses(false);

        $sumA = $a->a + $complexB->a;
        $sumB = $a->b + $complexB->b;

        return new ComplexNumber($sumA, $sumB);
    }
}
