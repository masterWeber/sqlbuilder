<?php


namespace Operator;


use Stringable_;

abstract class Operator implements Stringable_
{
  public function __toString(): string
  {
    return '';
  }
}