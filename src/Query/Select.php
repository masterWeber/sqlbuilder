<?php


namespace SQLBuilder\Query;


use SQLBuilder\Block\FromBlock;
use SQLBuilder\Helper;
use SQLBuilder\Stringable_;

class Select extends Query
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
        $str .= ', ' . ($value === '*' ? $value : Helper::quoteColumn($value));
      } else {
        $str .= ", " . Helper::quoteColumn($key) . " AS " . Helper::quoteColumn($value);
      }

    }

    $str = trim(ltrim($str, ','));

    if ($this->mode) {
      $str = $this->mode . ' ' . $str;
    }

    return trim($this->parent . ' ' . self::STATEMENT . ' ' . $str);
  }
}