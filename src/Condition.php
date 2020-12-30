<?php


class Condition
{

  public function in(string $colName, array $values): self
  {
    return $this;
  }

  public function notIn(string $colName, array $values): self
  {
    return $this;
  }

  public function equals(string $colName, $value): self
  {
    return $this;
  }

  public function greaterThan($a, $b): self
  {
    return $this;
  }

  public function greaterThanOrEqual($a, $b): self
  {
    return $this;
  }

  public function lessThan($a, $b): self
  {
    return $this;
  }

  public function lessThanOrEqual($a, $b): self
  {
    return $this;
  }

  public function notEquals(string $colName, $value): self
  {
    return $this;
  }

  public function like(string $colName, $value): self
  {
    return $this;
  }

  public function notLike(): self
  {
    return $this;
  }

  public function is(): self
  {
    return $this;
  }

  public function isNot(): self
  {
    return $this;
  }

  public function isNull(): self
  {
    return $this;
  }

  public function isNotNull(): self
  {
    return $this;
  }

  public function between(): self
  {
    return $this;
  }

  public function notBetween(): self
  {
    return $this;
  }

  public function group(): self
  {
    return $this;
  }
}