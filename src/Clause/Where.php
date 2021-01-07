<?php


namespace SQLBuilder\Clause;


use SQLBuilder\Block\GroupByBlock;

class Where extends Condition
{
  const STATEMENT = 'WHERE';

  use GroupByBlock;

  public function __toString(): string
  {
    return trim($this->parent . ' ' . self::STATEMENT . ' ' . $this->buildExpressions());
  }
}