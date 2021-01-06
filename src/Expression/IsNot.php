<?php


namespace SQLBuilder\Expression;


class IsNot extends Is
{
  protected string $operator = 'IS NOT';
}