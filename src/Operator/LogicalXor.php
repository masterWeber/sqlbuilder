<?php


namespace SQLBuilder\Operator;


class LogicalXor extends Operator
{
  public function __toString(): string
  {
    return 'XOR';
  }
}