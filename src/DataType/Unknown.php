<?php


namespace SQLBuilder\DataType;

use SQLBuilder\Stringable_;

class Unknown implements Stringable_
{
  public function __toString(): string
  {
    return 'UNKNOWN';
  }
}