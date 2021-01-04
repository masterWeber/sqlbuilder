<?php


namespace Clause;


use Block\WhereConditions;

trait WhereClause
{
  public function where($expression = null): WhereConditions
  {
    return new WhereConditions($expression, $this);
  }
}