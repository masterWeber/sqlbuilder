<?php


namespace Block;


use Clause\OrderBy;
use Stringable_;

trait OrderByBlock
{
  public function orderBy($expression, $sorting = null): OrderBy
  {
    /** @var Stringable_ $this */
    return new OrderBy($expression, $sorting, $this);
  }
}