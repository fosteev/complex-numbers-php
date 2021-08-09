<?php

namespace calculateComplexNumbers\strategics;

use calculateComplexNumbers\ComplexNumber;
use calculateComplexNumbers\Strategy;

/**
 * Класс реализации умножения
 */
class Multiplication implements Strategy {

    /**
     * @param ComplexNumber $a
     * @param ComplexNumber $b
     * @return ComplexNumber
     */

    public function calculate(ComplexNumber $a, ComplexNumber $b): ComplexNumber
    {
        return ComplexNumber::multiplication($a, $b);
    }
}
