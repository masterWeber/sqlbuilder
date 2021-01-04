<?php


namespace Block;


use AssignmentList;
use Clause\WhereClause;

class Set
{
  const STATEMENT = 'SET';

  protected ?AssignmentList $assignmentList;
  /**
   * @var mixed
   */
  protected $parent;

  use WhereClause;

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