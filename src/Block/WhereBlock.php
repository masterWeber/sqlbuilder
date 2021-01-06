<?php


namespace SQLBuilder\Block;


use SQLBuilder\Clause\Where;
use SQLBuilder\Stringable_;

trait WhereBlock
{
  public function where($expression = null): Where
  {
    /** @var Stringable_ $this */
    return new Where($expression, $this);
  }
}