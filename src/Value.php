<?php


namespace SQLBuilder;

class Value
{
  /**
   * @var mixed
   */
  protected $value;

  /**
   * @param mixed $value
   */
  public function __construct($value)
  {
    $this->value = $value;
  }

  public function __toString(): string
  {
    return Helper::deflate($this->value);
  }
}