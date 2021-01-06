<?php


namespace SQLBuilder\Block;


use SQLBuilder\Clause\Limit;
use SQLBuilder\Stringable_;

trait LimitBlock
{
  public function limit(int $limit): Limit
  {
    /** @var Stringable_ $this */
    return new Limit($limit, $this);
  }
}