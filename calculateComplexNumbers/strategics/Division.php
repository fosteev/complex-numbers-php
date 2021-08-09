<?php

namespace calculateComplexNumbers\strategics;

use calculateComplexNumbers\ComplexNumber;
use calculateComplexNumbers\Strategy;

/**
 * Класс реализации умножения
 * вычитаемое нужно взять в скобки, а затем – стандартно раскрыть эти скобки со сменой знака
 */
class Division implements Strategy {

    /**
     * @param ComplexNumber $a
     * @param ComplexNumber $b
     * @return ComplexNumber
     */
    public function calculate(ComplexNumber $a, ComplexNumber $b): ComplexNumber
    {
        $numerator = ComplexNumber::multiplication($a, $b);
        $denominator = $b->pow2();

        if (($numerator->a === 0) && ($numerator->b === $denominator)) {
            return new ComplexNumber(1, 1);
        }

        return new ComplexNumber($numerator->a / $denominator, $numerator->b / $denominator);
    }
}
