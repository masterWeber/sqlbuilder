<?php


namespace SQLBuilder\Clause;


use SQLBuilder\Block\LimitBlock;
use SQLBuilder\Helper;
use SQLBuilder\Stringable_;

class Having extends Condition
{
  const STATEMENT = 'HAVING';

  public function __toString(): string
  {
    return trim($this->parent . ' ' . self::STATEMENT . ' ' . $this->buildExpressions());
  }
}