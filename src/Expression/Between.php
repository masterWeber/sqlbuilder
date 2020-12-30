<?php


namespace Expression;


class Between extends Expression
{
  const OPERATOR = 'BETWEEN';

  protected string $expression;
  protected string $min;
  protected string $max;

  public function __construct(string $expression, string $min, string $max)
  {
    $this->expression = $expression;
    $this->min = $min;
    $this->max = $max;
  }

  public function __toString(): string
  {
    return $this->expression . " " . self::OPERATOR . " " . $this->min . " AND " . $this->max;
  }
}