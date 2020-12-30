<?php


namespace Block;


use AssignmentList;
use WhereClause;

class Set
{
  const STATEMENT = 'SET';

  use WhereClause;

  protected ?AssignmentList $assignmentList;

  public function __construct(array $assignmentList)
  {
    $this->assignmentList = AssignmentList::fromArray($assignmentList);
  }

  public function __toString(): string
  {
    return self::STATEMENT . " " . $this->assignmentList;
  }
}