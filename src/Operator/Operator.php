<?php


namespace SQLBuilder\Operator;


use SQLBuilder\Stringable_;

abstract class Operator implements Stringable_
{
  public function __toString(): string
  {
    return '';
  }
}