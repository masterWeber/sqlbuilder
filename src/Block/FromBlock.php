<?php


namespace SQLBuilder\Block;


use SQLBuilder\Clause\From;
use SQLBuilder\Stringable_;

trait FromBlock
{
  public function from($table): From
  {
    /** @var Stringable_ $this */
    return new From($table, $this);
  }
}