<?php


namespace Clause;


use Conditions;

trait WhereClause
{
  public function where($expression = null): Conditions
  {
    return new Conditions($expression, $this);
  }
}