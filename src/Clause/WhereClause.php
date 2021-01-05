<?php


namespace Clause;


use Block\Where;

trait WhereClause
{
  public function where($expression = null): Where
  {
    return new Where($expression, $this);
  }
}