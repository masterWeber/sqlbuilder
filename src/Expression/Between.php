<?php


namespace SQLBuilder\Expression;


use SQLBuilder\Helper;

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
    return Helper::quoteColumn($this->expression) . " " . $this->operator . " "
      . Helper::deflate($this->min) . " AND " . Helper::deflate($this->max);
  }
}