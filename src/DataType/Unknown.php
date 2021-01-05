<?php


namespace DataType;

class Unknown
{
  public function __toString(): string
  {
    return 'UNKNOWN';
  }
}