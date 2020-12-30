<?php


namespace Expression;


use Value;

class Is extends Expression
{
  const OPERATOR = 'IS';

  protected string $expression;
  protected bool $boolean;

  public function __construct(string $expression, bool $boolean)
  {
    $this->expression = $expression;
    $this->boolean = $boolean;
  }

  public function __toString(): string
  {
    return $this->expression . " " . self::OPERATOR . " " . Value::deflate($this->boolean);
  }
}