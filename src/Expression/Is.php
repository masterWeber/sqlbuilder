<?php


namespace Expression;


use Value;

class Is extends Expression
{
  protected string $operator = 'IS';

  protected string $expression;
  protected ?bool $value;

  public function __construct(string $expression, $value)
  {
    $this->expression = $expression;
    $this->value = $value;
  }

  public function __toString(): string
  {
    return $this->expression . " " . $this->operator . " " . Value::deflate($this->value);
  }
}