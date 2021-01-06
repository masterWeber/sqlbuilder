<?php


namespace SQLBuilder\Expression;


use SQLBuilder\Helper;

class RegExp extends Expression
{
  protected string $operator = 'REGEXP';
  protected string $expression;
  protected string $pattern;

  public function __construct(string $expression, string $pattern)
  {
    $this->expression = $expression;
    $this->pattern = $pattern;
  }

  public function __toString(): string
  {
    return Helper::quoteColumn($this->expression) . " " . $this->operator . " " . Helper::deflate($this->pattern);
  }
}