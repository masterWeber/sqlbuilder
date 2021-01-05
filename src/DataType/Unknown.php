<?php


namespace DataType;

use Stringable_;

class Unknown implements Stringable_
{
  public function __toString(): string
  {
    return 'UNKNOWN';
  }
}