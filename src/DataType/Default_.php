<?php


namespace DataType;

use Stringable_;

class Default_ implements Stringable_
{
  public function __toString(): string
  {
    return 'DEFAULT';
  }
}