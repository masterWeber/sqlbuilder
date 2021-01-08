<?php


namespace SQLBuilder\Query;


use SQLBuilder\Clause\ValueList;
use SQLBuilder\Helper;
use SQLBuilder\Stringable_;

class InsertInto extends Query
{
  const STATEMENT = 'INSERT INTO';

  protected ?Stringable_ $parent;
  protected string $tableReference;
  protected array $columns = [];
  protected array $values = [];
  protected bool $defaultValues = false;

  public function __construct(string $tableReference, Stringable_ $parent = null)
  {
    $this->tableReference = $tableReference;
    $this->parent = $parent;
  }

  public function columns(array $columns): self
  {
    $this->columns = $columns;
    return $this;
  }

  public function values(array $data): self
  {
    $this->values = $data;
    return $this;
  }

  public function default(): self
  {
    $this->defaultValues = true;
    return $this;
  }

  public function __toString(): string
  {
    return $this->buildSql();
  }

  protected function buildSql(): string
  {
    $sql = self::STATEMENT . " " . Helper::quoteTable($this->tableReference);

    if ($this->columns) {
      $sql .= " (`" . implode("`, `", $this->columns) . "`)";
    }

    if ($this->defaultValues) {
      $sql .= " DEFAULT VALUES";
      return $sql;
    }

    if ($this->values) {
      $sql .= " VALUES " . new ValueList($this->values);
    }

    return $sql;
  }
}