<?php


namespace Expression;


use Value;

class RegExp extends Expression
{
  const OPERATOR = 'REGEXP';

  protected string $expression;
  protected string $pattern;

  public function __construct(string $expression, string $pattern)
  {
    $this->expression = $expression;
    $this->pattern = $pattern;
  }

  public function __toString(): string
  {
    return $this->expression . " " . self::OPERATOR . " " . Value::deflate($this->pattern);
  }
}