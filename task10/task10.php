<?php

class Calculator {
    private float $_firstValue, $_secondValue;
    private float $_currentValue;
    public function __construct(float $_firstValue, float $_secondValue ) {
        $this->_firstValue = $_firstValue;
        $this->_secondValue = $_secondValue;
    }
    public function add(): static
    {
        $this->_currentValue = $this->_firstValue + $this->_secondValue;
        return $this;
    }
    public function __toString()
    {
        return number_format($this->_currentValue,0,'.','');
    }
    public function subtract(): static
    {
        $this->_currentValue = $this->_firstValue - $this->_secondValue;
        return $this;
    }
    public function multiply(): static
    {
        $this->_currentValue = $this->_firstValue * $this->_secondValue;
        return $this;
    }
    public function divide(): static
    {
        $this->_currentValue = $this->_firstValue / $this->_secondValue;
        return $this;
    }
    public function addBy($num): static
    {
        $this->_currentValue += $num;
        return $this;
    }
    public function subtractBy($num): static
    {
        $this->_currentValue -= $num;
        return $this;
    }
    public function multiplyBy($num): static
    {
        $this->_currentValue *= $num;
        return $this;
    }
    public function divideBy($num): static
    {
        $this->_currentValue /= $num;
        return $this;
    }
}