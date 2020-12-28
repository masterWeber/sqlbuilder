<?php


namespace Block;


use Closure;

class Where
{
  const STATEMENT = 'WHERE';

  /**
   * @param Closure|string|array $column
   * @param mixed $operator
   * @param mixed $value
   * @return $this
   */
  public function __construct($column, $operator = null, $value = null)
  {
  }

  public function in(): self
  {
    return $this;
  }

  public function equals(): self
  {
    return $this;
  }

  public function notEquals(): self
  {
    return $this;
  }

  public function like(): self
  {
    return $this;
  }

  public function is(): self
  {
    return $this;
  }

  public function between(): self
  {
    return $this;
  }

  public function __toString(): string
  {
    return self::STATEMENT;
  }
}