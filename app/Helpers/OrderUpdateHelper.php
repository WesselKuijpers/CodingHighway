<?php

class OrderUpdateHelper 
{
  /**
   * Check
   *
   * @param  \App\Models\course\Lesson | \App\Models\course\Exercise $random
   * @param  integer $next_id
   * @param  integer $request_next_id
   * @param  \App\Models\course\Lesson | \App\Models\course\Exercise $first
   * @param  \App\Models\course\Lesson | \App\Models\course\Exercise $last
   * @param  \App\Models\course\Lesson | \App\Models\course\Exercise $previous
   * @param  \App\Models\course\Lesson | \App\Models\course\Exercise $request_next_previous
   * @return void
   */
    public static function Check($random, $next_id, $request_next_id, $first, $last, $previous, $request_next_previous)
    {
        if($random->is_first):
            // sit 1 or 2
            if($first->next_id == $random->id):
                // sit 1, second becomes first
                $bool = OrderUpdateHelper::SecondBecomesFirst($first, $next_id, $random);
            elseif($random->next_id == null):
                OrderUpdateHelper::LastBecomesFirst($last, $first, $previous);
            else:
                // sit 2, random becomes first
                OrderUpdateHelper::RandomBecomesFirst($first, $next_id, $random, $previous);
            endif;
        elseif(empty($request_next_id) && !empty($next_id)):
            //sit 4, random becomes last
            OrderUpdateHelper::RandomBecomesLast($last, $next_id, $random, $previous);
        else:
            //sit 3 
            OrderUpdateHelper::SwitchAdjacent($random, $next_id, $previous, $request_next_previous);
        endif;
    }
    /**
     * SecondBecomesFirst
     *
     * @param  \App\Models\course\Lesson | \App\Models\course\Exercise $first
     * @param  \App\Models\course\Lesson | \App\Models\course\Exercise $second
     *
     * @return boolean
     */
    public static function SecondBecomesFirst($first, $next_id, $second)
    {
        $first->is_first = false;
        $second->is_first = true;

        $first->next_id = $next_id;
        $second->next_id = $first->id;

        if ($first->save() && $second->save()):
            return true;
        else :
            return false;
        endif;
    }

    /**
     * RandomBecomesFirst
     *
     * @param  \App\Models\course\Lesson | \App\Models\course\Exercise $first
     * @param  \App\Models\course\Lesson | \App\Models\course\Exercise $random
     * @param  \App\Models\course\Lesson | \App\Models\course\Exercise $previous
     *
     * @return boolean
     */
    public static function RandomBecomesFirst($first, $next_id, $random, $previous)
    {
        $first->is_first = false;
        $random->is_first = true;

        $previous->next_id = $next_id;
        $random->next_id = $first->id;

        if ($first->save() && $random->save() && $previous->save()):
            return true;
        else:
            return false;
        endif;
    }

    /**
     * SwitchList
     *
     * @param  \App\Models\course\Lesson | \App\Models\course\Exercise $old
     * @param  \App\Models\course\Lesson | \App\Models\course\Exercise $new
     *
     * @return boolean
     */
    public static function SwitchAdjacent($random, $next_id, $previous, $request_next_previous)
    {
        if(!empty($previous->next_id)):
            $request_next_previous->next_id = $random->id;
            $previous->next_id = $next_id;
    
            if ($request_next_previous->save() && $previous->save()):
                return true;
            endif;
        endif;

        return false;
    }

    /**
     * RandomBecomesLast
     *
     * @param  \App\Models\course\Lesson | \App\Models\course\Exercise $last
     * @param  \App\Models\course\Lesson | \App\Models\course\Exercise $random
     * @param  \App\Models\course\Lesson | \App\Models\course\Exercise $previous
     *
     * @return boolean
     */
    public static function RandomBecomesLast($last, $next_id, $random, $previous)
    {
        $previous->next_id = $next_id;
        $random->next_id = null;
        $last->next_id = $random->id;

        if ($last->save() && $random->save() && $previous->save()):
            return true;
        else:
            return false;
        endif;
    }

    public static function LastBecomesFirst($last, $first, $previous)
    {
        $previous->next_id = null;
        $first->is_first = false;
        $last->is_first = true;

        $last->next_id = $first->id;

        if ($last->save() && $first->save() && $previous->save()):
            return true;
        endif;

        return false;
    }
}