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

  /**
   * @param \App\Models\course\Lesson|\App\Models\course\Exercise $old
   * @param \App\Models\course\Lesson|\App\Models\course\Exercise $new
   * @return bool
   */
  public function SwitchList($old, $new)
  {
    $new->next_id = $old->next_id;
    $old->next_id = $new->id;

    if ($old->save() && $new->save()):
      return true;
    endif;

    return false;
  }

  /**
   * @param \App\Models\course\Lesson|\App\Models\course\Exercise $old
   * @param \App\Models\course\Lesson|\App\Models\course\Exercise $new
   * @return bool
   */
  public function SwitchFirst($old, $new)
  {
    $new->is_first = true;
    $old->is_first = false;

    $new->next_id = $old->id;


    if ($old->save() && $new->save()):
      return true;
    endif;

    return false;
  }
}
