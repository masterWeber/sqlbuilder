<?php


namespace Block;


class Where
{

  const STATEMENT = 'WHERE';

  public function __construct(array $condition)
  {
  }

  public function __toString(): string
  {
    return '';
  }
}