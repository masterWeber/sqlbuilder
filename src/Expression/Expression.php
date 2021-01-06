<?php


namespace SQLBuilder\Expression;


use SQLBuilder\Stringable_;

abstract class Expression implements Stringable_
{
  public function __toString(): string
  {
    return '';
  }
}