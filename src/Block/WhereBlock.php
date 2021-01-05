<?php


namespace Block;


use Clause\Where;
use Stringable_;

trait WhereBlock
{
  public function where($expression = null): Where
  {
    /** @var Stringable_ $this */
    return new Where($expression, $this);
  }
}