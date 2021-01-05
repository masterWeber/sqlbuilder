<?php

namespace Clause;

use Exception;
use Stringable_;
use Value;

class AssignmentList implements Stringable_
{
  private array $items;

  public static function fromArray(array $items): self
  {
    $list = new AssignmentList();

    foreach ($items as $key => $value) {
      $assignment = new Assignment($key, new Value($value));
      $list->add($assignment);
    }

    return $list;
  }

  public function add(Assignment $assignment): self
  {
    $this->items[] = $assignment;
    return $this;
  }

  public function get(string $key): ?Assignment
  {
    foreach ($this->items as $item) {
      if ($item->getColName() === $key) {
        return $item;
      }
    }

    return null;
  }

  public function __toString(): string
  {
    return implode(', ', $this->items);
  }
}