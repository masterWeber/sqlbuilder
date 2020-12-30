<?php


namespace Block;



class Where
{
  const STATEMENT = 'WHERE';

  public function __construct($expr = null)
  {
  }

  public function __toString(): string
  {
    return self::STATEMENT;
  }
}