<?php


namespace Clause;


use Block\OrderBy;

trait OrderByClause
{
  public function orderBy($expression, $sorting = null): OrderBy
  {
    return new OrderBy($expression, $sorting, $this);
  }
}