<?php


namespace Clause;


class GroupCondition extends Condition
{
  public function __toString(): string
  {
    return '(' . parent::__toString() . ')';
  }
}