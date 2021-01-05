<?php


namespace Clause;


use Block\WhereBlock;

class Set
{
  const STATEMENT = 'SET';

  protected ?AssignmentList $assignmentList;
  /**
   * @var mixed
   */
  protected $parent;

  use WhereBlock;

  public function __construct(array $assignmentList, $parent = null)
  {
    $this->assignmentList = AssignmentList::fromArray($assignmentList);
    $this->parent = $parent;
  }

  public function __toString(): string
  {
    return trim($this->parent . ' ' . self::STATEMENT . ' ' . $this->assignmentList);
  }
}