<?php


namespace Clause;

use Stringable_;
use Value;

class Assignment implements Stringable_
{
  private string $colName;
  private Value $value;

  public function __construct(string $colName, Value $value)
  {
    $this->colName = $colName;
    $this->value = $value;
  }

  public function __toString(): string
  {
    return $this->colName . " = " . $this->value;
  }
}