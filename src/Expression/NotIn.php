<?php


namespace SQLBuilder\Expression;


class NotIn extends In
{
  protected string $operator = 'NOT IN';
}