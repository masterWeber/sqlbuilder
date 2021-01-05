<?php


namespace Clause;


class Where extends Condition
{
  const STATEMENT = 'WHERE';

  public function __toString(): string
  {
    return trim($this->parent . ' ' . self::STATEMENT . ' ' . $this->buildExpressions());
  }
}