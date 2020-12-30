<?php


namespace Expression;


class In extends Expression
{
  const OPERATOR = 'IN';

  protected string $expression;
  protected ?ValueList $valueList;

  public function __construct(string $expression, array $list)
  {
    $this->expression = $expression;
    $this->valueList = new ValueList($list);
  }

  public function __toString(): string
  {
    return $this->expression . " " . self::OPERATOR . " " . $this->valueList;
  }
}