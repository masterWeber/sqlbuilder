<?php


namespace Expression;


use Stringable_;

abstract class Expression implements Stringable_
{
  public function __toString(): string
  {
    return '';
  }
}