<?php

namespace Clause;

use Exception;
use Value;

class AssignmentList
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

  public function get(string $key): Assignment
  {
    foreach ($this->items as $item) {
      if ($item->getColName() === $key) {
        return $item;
      }
    }

    throw new Exception('Undefined key.');
  }

  public function __toString(): string
  {
    return implode(', ', $this->items);
  }
}