<?php

namespace calculateComplexNumbers;

interface Strategy {
    public function calculate(ComplexNumber $complexNumberA, ComplexNumber $complexNumberB): ComplexNumber;
}
