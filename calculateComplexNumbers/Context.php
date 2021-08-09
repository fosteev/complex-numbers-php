<?php

namespace calculateComplexNumbers;

/**
 * Контекст определяет интерфейс, представляющий интерес для клиентов.
 */
class Context
{
    /**
     * @var Strategy Контекст хранит ссылку на один из объектов Стратегии.
     * Контекст не знает конкретного класса стратегии. Он должен работать со
     * всеми стратегиями через интерфейс Стратегии.
     */
    private Strategy $strategy;

    private ComplexNumber $a;
    private ComplexNumber $b;

    public function __construct(ComplexNumber $a, ComplexNumber $b)
    {
        $this->a = $a;
        $this->b = $b;
    }

    public function setStrategy(Strategy $strategy): void
    {
        $this->strategy = $strategy;
    }

    public function calculate(): ComplexNumber
    {
        return $this->strategy->calculate($this->a, $this->b);
    }
}
