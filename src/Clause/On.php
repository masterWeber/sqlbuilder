<?php


namespace Clause;


use Block\WhereBlock;

class On extends Condition
{
  const STATEMENT = 'ON';

  use WhereBlock;

  public function __toString(): string
  {
    return trim($this->parent . ' ' . self::STATEMENT . ' (' . $this->buildExpressions() . ')');
  }
}