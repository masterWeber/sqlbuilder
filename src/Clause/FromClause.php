<?php


namespace Clause;


use Block\From;

trait FromClause
{
  public function from($table): From
  {
    return new From($table, $this);
  }
}