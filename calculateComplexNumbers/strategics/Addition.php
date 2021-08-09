<?php

namespace calculateComplexNumbers\strategics;

use calculateComplexNumbers\ComplexNumber;
use calculateComplexNumbers\Strategy;

/**
 * Класс реализации сложения
 * Для того чтобы сложить два комплексных числа нужно сложить их действительные и мнимые части
 */
class Addition implements Strategy {
    public function calculate(ComplexNumber $a, ComplexNumber $b): ComplexNumber
    {
        $sumA = $a->a + $b->a;
        $sumB = $a->b + $b->b;

        return new ComplexNumber($sumA, $sumB);
    }
}
