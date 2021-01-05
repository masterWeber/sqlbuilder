<?php


namespace Block;


use Clause\Limit;
use Stringable_;

trait LimitBlock
{
  public function limit(int $limit): Limit
  {
    /** @var Stringable_ $this */
    return new Limit($limit, $this);
  }
}