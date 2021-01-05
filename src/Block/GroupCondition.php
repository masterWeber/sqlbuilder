<?php


namespace Block;


class GroupCondition extends Condition
{
  public function __toString(): string
  {
    return '(' . parent::__toString() . ')';
  }
}