<?php


namespace SQLBuilder\Operator;


class LogicalNot extends Operator
{
  public function __toString(): string
  {
    return 'NOT';
  }
}