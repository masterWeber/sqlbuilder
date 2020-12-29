<?php


class Assignment
{
  private string $colName;
  private Value $value;

  public function __construct(string $colName, Value $value)
  {
    $this->colName = $colName;
    $this->value = $value;
  }

  public function getColName(): string
  {
    return $this->colName;
  }

  public function getValue(): Value
  {
    return $this->value;
  }

  public function __toString(): string
  {
    return "`{$this->colName}` = " . $this->value;
  }
}