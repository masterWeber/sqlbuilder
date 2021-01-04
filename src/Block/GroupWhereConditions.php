<?php


namespace Block;


class GroupWhereConditions extends WhereConditions
{
  public function __toString(): string
  {
    return '(' . parent::buildExpressions() . ')';
  }
}