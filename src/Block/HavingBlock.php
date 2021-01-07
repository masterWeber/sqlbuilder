<?php


namespace SQLBuilder\Block;


use SQLBuilder\Clause\Having;
use SQLBuilder\Stringable_;

trait HavingBlock
{
  public function having($expression = null): Having
  {
    /** @var Stringable_ $this */
    return new Having($expression, $this);
  }
}