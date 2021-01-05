<?php


namespace Block;


use Clause\From;
use Stringable_;

trait FromBlock
{
  public function from($table): From
  {
    /** @var Stringable_ $this */
    return new From($table, $this);
  }
}