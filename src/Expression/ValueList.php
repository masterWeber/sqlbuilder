<?php


namespace Expression;


use Value;

class ValueList extends Expression
{
  protected array $values;

  public function __construct(array $values)
  {
    foreach ($values as $item) {
      $this->values[] = new Value($item);
    }
  }

  public function __toString(): string
  {
    return '(' . implode(', ', $this->values) . ')';
  }
}