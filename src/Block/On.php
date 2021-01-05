<?php


namespace Block;


use Clause\WhereClause;

class On extends Condition
{
  const STATEMENT = 'ON';

  use WhereClause;

  public function __toString(): string
  {
    return trim($this->parent . ' ' . self::STATEMENT . ' (' . $this->buildExpressions() . ')');
  }
}