<?php


namespace Query;


use Block\FromBlock;
use Stringable_;

class Select extends Query implements Stringable_
{
  const STATEMENT = 'SELECT';
  const DISTINCT = 'DISTINCT';

  protected ?Stringable_ $parent;
  protected array $fields;
  protected ?string $mode;

  use FromBlock;

  public function __construct(array $fields = ['*'], string $mode = null, Stringable_ $parent = null)
  {
    $this->fields = $fields;
    $this->mode = $mode;
    $this->parent = $parent;
  }

  public function distinct(): self
  {
    $this->mode = self::DISTINCT;
    return $this;
  }

  public function __toString(): string
  {
    $str = '';

    foreach ($this->fields as $key => $value) {

      if (is_int($key)) {
        $str .= ', ' . $value;
      } else {
        $str .= ", {$key} AS {$value}";
      }

    }

    $str = trim(ltrim($str, ','));

    if ($this->mode) {
      $str = $this->mode . ' ' . $str;
    }

    return trim($this->parent . ' ' . self::STATEMENT . ' ' . $str);
  }
}