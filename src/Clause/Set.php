<?php


namespace Clause;


use Block\WhereBlock;
use Stringable_;

class Set implements Stringable_
{
  const STATEMENT = 'SET';

  protected ?AssignmentList $assignmentList;
  protected ?Stringable_ $parent;

  use WhereBlock;

  public function __construct(array $assignmentList, Stringable_ $parent = null)
  {
    $this->assignmentList = AssignmentList::fromArray($assignmentList);
    $this->parent = $parent;
  }

  public function __toString(): string
  {
    return trim($this->parent . ' ' . self::STATEMENT . ' ' . $this->assignmentList);
  }
}