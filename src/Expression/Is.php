<?php


namespace SQLBuilder\Expression;


use SQLBuilder\Helper;

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
    return Helper::quoteColumn($this->expression) . " " . $this->operator . " " . Helper::deflate($this->value);
  }
}