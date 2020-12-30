<?php


use Block\Where;

trait WhereClause
{
  public function where($expr): Where
  {
    return new Where($expr);
  }
}