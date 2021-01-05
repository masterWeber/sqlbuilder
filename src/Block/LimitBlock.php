<?php


namespace Block;


use Clause\Limit;

trait LimitBlock
{
  public function limit(int $limit): Limit
  {
    return new Limit($limit, $this);
  }
}