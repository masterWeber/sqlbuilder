<?php


namespace Block;


use Clause\Where;

trait WhereBlock
{
  public function where($expression = null): Where
  {
    return new Where($expression, $this);
  }
}