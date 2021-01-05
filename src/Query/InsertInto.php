<?php


namespace Query;


use Stringable_;
use Value;

class InsertInto extends Query implements Stringable_
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
    $sql = self::STATEMENT . " `{$this->tableReference}`";

    if ($this->columns) {
      $sql .= " (`" . implode("`, `", $this->columns) . "`)";
    }

    if ($this->defaultValues) {
      $sql .= " DEFAULT VALUES";
      return $sql;
    }

    if ($this->values) {
      $preparedValues = array_map(function ($item) {
        return new Value($item);
      }, $this->values);

      $sql .= " VALUES (" . implode(", ", $preparedValues) . ")";
    }

    return $sql;
  }
}