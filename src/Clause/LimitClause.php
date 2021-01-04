<?php


namespace Clause;


use Block\Limit;

trait LimitClause
{
  public function limit(int $limit): Limit
  {
    return new Limit($limit, $this);
  }
}