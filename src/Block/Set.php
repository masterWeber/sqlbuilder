<?php


namespace Block;


use AssignmentList;

class Set
{
  const STATEMENT = 'SET';

  protected ?AssignmentList $assignmentList;

  public function __construct(array $assignmentList)
  {
    $this->assignmentList = AssignmentList::fromArray($assignmentList);
  }

  public function where($column, $operator = null, $value = null): Where
  {
    return new Where($column, $operator, $value);
  }

  public function __toString(): string
  {
    return self::STATEMENT . " " . $this->assignmentList;
  }
}