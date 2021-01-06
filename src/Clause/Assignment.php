<?php


namespace Clause;

use Helper;
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
    return Helper::quoteColumn($this->colName) . " = " . $this->value;
  }

  public function getColName(): string
  {
    return $this->colName;
  }
}