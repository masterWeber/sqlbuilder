<?php


namespace Block;


use Clause\From;

trait FromBlock
{
  public function from($table): From
  {
    return new From($table, $this);
  }
}