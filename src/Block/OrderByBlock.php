<?php


namespace SQLBuilder\Block;


use SQLBuilder\Clause\OrderBy;
use SQLBuilder\Stringable_;

trait OrderByBlock
{
  public function orderBy($expression, $sorting = null): OrderBy
  {
    /** @var Stringable_ $this */
    return new OrderBy($expression, $sorting, $this);
  }
}