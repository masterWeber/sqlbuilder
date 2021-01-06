<?php


namespace SQLBuilder\Expression;


class NotBetween extends Between
{
  protected string $operator = 'NOT BETWEEN';
}