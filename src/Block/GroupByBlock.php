<?php


namespace SQLBuilder\Block;


use SQLBuilder\Clause\GroupBy;
use SQLBuilder\Stringable_;

trait GroupByBlock
{
  public function groupBy($expression, ?string $modifier = null): GroupBy
  {
    /** @var Stringable_ $this */
    return new GroupBy($expression, $modifier, $this);
  }
}