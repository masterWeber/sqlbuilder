<?php


namespace SQLBuilder\Clause;


class GroupCondition extends Condition
{
  public function __toString(): string
  {
    return '(' . parent::__toString() . ')';
  }
}