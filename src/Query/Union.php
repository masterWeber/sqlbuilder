<?php


namespace SQLBuilder\Query;


use SQLBuilder\Block\LimitBlock;
use SQLBuilder\Block\OrderByBlock;
use SQLBuilder\Stringable_;

class Union implements Stringable_
{
  const STATEMENT = 'UNION';

  protected array $queries;
  protected ?Stringable_ $parent;

  use OrderByBlock;
  use LimitBlock;

  public function __construct(Stringable_ $select = null, Stringable_ $select2 = null, Stringable_ $parent = null)
  {
    if ($select) {
      $this->queries[] = $select;
    }

    if ($select2) {
      $this->queries[] = $select2;
    }

    $this->parent = $parent;
  }

  public function union(Stringable_ $select): self
  {
    $this->queries[] = $select;
    return $this;
  }

  public function __toString(): string
  {
    $subQueries = [];
    foreach ($this->queries as $query) {
      $subQueries[] = "(" . $query . ")";
    }

    $str = implode(' ' . self::STATEMENT . ' ', $subQueries);
    return trim($this->parent . ' ' . $str);
  }
}