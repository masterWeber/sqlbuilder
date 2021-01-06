<?php


namespace SQLBuilder\Operator;


class LogicalAnd extends Operator
{
  public function __toString(): string
  {
    return 'AND';
  }
}