<?php


namespace Query;


class Select extends Query
{

  const STATEMENT = 'SELECT';
  const DISTINCT = 'DISTINCT';

  public function __construct(array $fields = ['*'], string $mode = null)
  {
  }
}