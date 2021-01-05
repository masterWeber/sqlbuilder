<?php


namespace Block;


use Clause\OrderBy;

trait OrderByBlock
{
  public function orderBy($expression, $sorting = null): OrderBy
  {
    return new OrderBy($expression, $sorting, $this);
  }
}