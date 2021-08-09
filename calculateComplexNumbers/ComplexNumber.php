<?php

namespace calculateComplexNumbers;

/**
 * Класс представления комплексного числа.
 * комплексное число – это двумерное число.
 * Оно имеет вид z = a + bi, где a и b – действительные числа, i – так называемая мнимая единица.
 * Число a называется действительной частью комплексного числа z,
 * число b называется мнимой частью комплексного числа z.
 */
class ComplexNumber
{
    /**
     * Действительное число
     * @var float
     */
    public float $a;

    /**
     * Мнимая часть
     */

    /**
     * Действительное число
     * @var float
     */
    public float $b;

    /**
     * Мнимая единица
     * @var integer
     */
    private int $i;

    /**
     * Находится ли комплексное число в скобках
     * @var bool
     */
    public bool $isParentheses;

    public function __construct(float $a, float $b, bool $isParentheses = false)
    {
        if (!($a && $b)) {
            throw new Exception('Invalid arguments a or b. Cannot be 0');
        }

        $this->a = $a;
        $this->b = $b;
        $this->isParentheses = $isParentheses;
    }

    /**
     * Вывод комплексного числа
     * @return string
     */
    public function toString(): string
    {
        return self::convertString($this->a, $this->b, $this->isParentheses);
    }

    static function convertString(float $a, float $b, bool $isParentheses = false): string
    {
        $complexString = $a . ($b > 0 ? "+$b" : $b) . 'i';

        return $isParentheses ? "($complexString)" : $complexString;
    }

    /**
     * При раскрытии скобки переворачиваем знак числа
     * @param float $number
     * @return float
     */
    private function expandParenthesesNumberNegativeOperator(float $number): float
    {
        return $number < 0 ? abs($number) : (0 - $number);
    }

    /**
     * Раскрытие скобок
     * @param bool $isPositiveOperator - стоит перед скобкой + или -
     * @return $this
     */
    public function expandParentheses(bool $isPositiveOperator): ComplexNumber
    {
        if ($isPositiveOperator) {
            return $this;
        } else {
            return new ComplexNumber(
                $this->expandParenthesesNumberNegativeOperator($this->a),
                $this->expandParenthesesNumberNegativeOperator($this->b)
            );
        }
    }

    /**
     * Возведение в квадрат
     * @return float
     */
    public function pow2(): float
    {

        /**
         * мнимая единица i в квадрате дает = -1
         */

        return pow($this->a, 2) - (pow($this->b, 2) * -1);
    }

    static public function multiplication(ComplexNumber $a, ComplexNumber $b): ComplexNumber
    {
        $sumA = ($a->a * $b->a) + (($a->b * $b->b) * -1);

        $sumB = ($a->a * $b->b) + ($a->b * $b->a);

        return new ComplexNumber($sumA, $sumB);
    }
}
