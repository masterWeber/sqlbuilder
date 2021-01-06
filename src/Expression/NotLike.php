<?php


namespace SQLBuilder\Expression;


class NotLike extends Like
{
  protected string $operator = 'NOT LIKE';
}