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
    $sql = self::STATEMENT;

    foreach ($this->values as $col => $value) {
      $preparedValue = mb_strtolower($value) === 'default' ? 'DEFAULT' : new Value($value);

      $sql .= " `{$col}` = {$preparedValue}";

      if (array_key_last($this->values) !== $col) {
        $sql .= ',';
      }

    }

    return $sql;
  }
}