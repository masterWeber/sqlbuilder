<?php


namespace SQLBuilder\Expression;


class NotRegExp extends RegExp
{
  protected string $operator = 'NOT REGEXP';
}