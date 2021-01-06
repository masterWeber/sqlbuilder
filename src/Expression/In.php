<?php


namespace Expression;


use Clause\ValueList;
use Helper;

class In extends Expression
{
  protected string $operator = 'IN';
  protected string $expression;
  protected ?ValueList $valueList;

  public function __construct(string $expression, array $list)
  {
    $this->expression = $expression;
    $this->valueList = new ValueList($list);
  }

  public function __toString(): string
  {
    return Helper::quoteColumn($this->expression) . " " . $this->operator . " " . $this->valueList;
  }
}