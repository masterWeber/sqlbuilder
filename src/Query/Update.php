<?php


namespace Query;


use Clause\Set;
use Stringable_;

class Update extends Query implements Stringable_
{
  const STATEMENT = 'UPDATE';

  protected string $tableReference;
  protected ?Stringable_ $parent;

  public function __construct(string $tableReference, Stringable_ $parent = null)
  {
    $this->tableReference = $tableReference;
    $this->parent = $parent;
  }

  public function set(array $data): Set
  {
    return new Set($data, $this);
  }

  public function __toString(): string
  {
    return trim($this->parent . ' ' . self::STATEMENT . ' ' . $this->tableReference);
  }
}