<?php


namespace Expression;


use Helper;

class Like extends Expression
{
  protected string $operator = 'LIKE';
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