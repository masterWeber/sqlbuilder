<?php


namespace SQLBuilder\DataType;

use SQLBuilder\Stringable_;

class Default_ implements Stringable_
{
  public function __toString(): string
  {
    return 'DEFAULT';
  }
}