<?php


namespace Expression;


use Helper;

class Column extends Expression
{
  protected string $name;
  protected ?string $table;

  public function __construct(string $name, ?string $table = null)
  {
    if ($name && $table) {
      $this->name = $name;
      $this->table = $table;
    } else {
      $parts = $this->parseName($name);
      $this->name = $parts['name'];
      $this->table = $parts['table'];
    }
  }

  protected function parseName(string $name): array
  {
    $parts = explode('.', $name);
    if (count($parts) === 1) {
      return [
        'name' => $parts[0],
        'table' => null,
      ];
    }

    return [
      'table' => $parts[0],
      'name' => $parts[1],
    ];
  }

  public static function from(string $name): self
  {
    return new Column($name);
  }

  public function __toString(): string
  {
    if ($this->table) {
      return Helper::quoteColumn($this->table . "." . $this->name);
    }

    return Helper::quoteColumn($this->name);
  }
}