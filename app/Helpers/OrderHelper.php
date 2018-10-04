<?php

class OrderHelper {
  /**
   * Sort the list
   * TODO fix code to the new db fields
   *
   * @param $unsortedList
   * @return array
   */
  public static function sortList($unsortedList)
  {
    $first = $unsortedList->where('is_first', true)->first();
    $next = null;
    $list = [$first];

    for($i = 1; $i < $unsortedList->count(); $i++):
      if ($next == null):
        $next = $first->next;
      else:
        $next = $next->next;
      endif;

      array_push($list, $next);
    endfor;

    return $list;
  }
}
