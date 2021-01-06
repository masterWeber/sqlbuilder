<?php


namespace SQLBuilder\Expression;


class Raw extends Expression
{
  protected string $string;

  public function __construct(string $string)
  {
    $this->string = $string;
  }

  public function __toString(): string
  {
    return $this->string;
  }
}