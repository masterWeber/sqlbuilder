<?php


namespace SQLBuilder\Operator;


class LogicalOr extends Operator
{
  public function __toString(): string
  {
    return 'OR';
  }
}