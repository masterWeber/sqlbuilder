<?php


namespace Block;


use Value;

class Set
{

  const STATEMENT = 'SET';

  protected array $values = [];

  public function __construct(array $values)
  {
    $this->values = $values;
  }

  public function __toString(): string
  {
    $exp = [];

    foreach ($this->values as $col => $value) {
      $exp[] = "`{$col}` = " . new Value($value);
    }

    return self::STATEMENT . " " . implode(', ', $exp);
  }
}