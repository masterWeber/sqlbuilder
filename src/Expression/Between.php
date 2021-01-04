<?php


namespace Expression;


use Value;

class Between extends Expression
{
  protected string $operator = 'BETWEEN';
  protected string $expression;
  /**
   * @var mixed
   */
  protected $min;
  /**
   * @var mixed
   */
  protected $max;

  public function __construct(string $expression, $min, $max)
  {
    $this->expression = $expression;
    $this->min = $min;
    $this->max = $max;
  }

  public function __toString(): string
  {
    return $this->expression . " " . $this->operator . " "
      . Value::deflate($this->min) . " AND " . Value::deflate($this->max);
  }
}