<?php


class GroupConditions extends Conditions
{
  public function __toString(): string
  {
    return '(' . parent::buildExpressions() . ')';
  }
}