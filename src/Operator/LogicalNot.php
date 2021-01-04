<?php


namespace Operator;


class LogicalNot extends Operator
{
  public function __toString(): string
  {
    return 'NOT';
  }
}