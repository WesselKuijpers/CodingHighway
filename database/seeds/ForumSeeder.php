<?php

use Illuminate\Database\Seeder;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question = new \App\Models\forum\Question();
        $question->title = str_random(rand(12, 30));
        $question->content = str_random(rand(30, 150));
        $question->exercise_id = null;
        $question->user_id = \App\User::all()->last()->id;
        $question->solved = false;
        $question->save();

        $question = new \App\Models\forum\Question();
        $question->title = str_random(rand(12, 30));
        $question->content = str_random(rand(30, 150));
        $question->exercise_id = null;
        $question->user_id = \App\User::all()->last()->id;
        $question->solved = false;
        $question->save();

        $question = new \App\Models\forum\Question();
        $question->title = str_random(rand(12, 30));
        $question->content = str_random(rand(30, 150));
        $question->exercise_id = null;
        $question->user_id = \App\User::all()->last()->id;
        $question->solved = false;
        $question->save();

        $question = new \App\Models\forum\Question();
        $question->title = str_random(rand(12, 30));
        $question->content = str_random(rand(30, 150));
        $question->exercise_id = null;
        $question->user_id = \App\User::all()->last()->id;
        $question->solved = false;
        $question->save();

        $answer = new \App\Models\forum\Answer();
        $answer->content = str_random(rand(30, 150));
        $answer->user_id = \App\User::all()->last()->id;
        $answer->question_id = \App\Models\forum\Question::all()->last()->id;
        $answer->is_best = false;
        $answer->save();

        $answer = new \App\Models\forum\Answer();
        $answer->content = str_random(rand(30, 150));
        $answer->user_id = \App\User::all()->last()->id;
        $answer->question_id = \App\Models\forum\Question::all()->last()->id;
        $answer->is_best = false;
        $answer->save();

        $answer = new \App\Models\forum\Answer();
        $answer->content = str_random(rand(30, 150));
        $answer->user_id = \App\User::all()->last()->id;
        $answer->question_id = \App\Models\forum\Question::all()->last()->id;
        $answer->is_best = false;
        $answer->save();

        $answer = new \App\Models\forum\Answer();
        $answer->content = str_random(rand(30, 150));
        $answer->user_id = \App\User::all()->last()->id;
        $answer->question_id = \App\Models\forum\Question::all()->last()->id;
        $answer->is_best = false;
        $answer->save();

        $tag = new \App\Models\forum\Tag();
        $tag->name = str_random(rand(12, 30));
        $tag->save();

        $tag = new \App\Models\forum\Tag();
        $tag->name = str_random(rand(12, 30));
        $tag->save();

        $tag = new \App\Models\forum\Tag();
        $tag->name = str_random(rand(12, 30));
        $tag->save();

        $tag = new \App\Models\forum\Tag();
        $tag->name = str_random(rand(12, 30));
        $tag->save();

        $reply = new \App\Models\forum\Reply();
        $reply->content = str_random(rand(30, 150));
        $reply->user_id = \App\User::all()->last()->id;
        $reply->answer_id = \App\Models\forum\Question::all()->last()->id;
        $reply->save();

        $reply = new \App\Models\forum\Reply();
        $reply->content = str_random(rand(30, 150));
        $reply->user_id = \App\User::all()->last()->id;
        $reply->answer_id = \App\Models\forum\Question::all()->last()->id;
        $reply->save();

        $reply = new \App\Models\forum\Reply();
        $reply->content = str_random(rand(30, 150));
        $reply->user_id = \App\User::all()->last()->id;
        $reply->answer_id = \App\Models\forum\Question::all()->last()->id;
        $reply->save();

        $reply = new \App\Models\forum\Reply();
        $reply->content = str_random(rand(30, 150));
        $reply->user_id = \App\User::all()->last()->id;
        $reply->answer_id = \App\Models\forum\Question::all()->last()->id;
        $reply->save();

        $questiontag = new \App\Models\forum\QuestionTag();
        $questiontag->question_id = \App\Models\forum\Question::all()->last()->id;
        $questiontag->tag_id = \App\Models\forum\Tag::all()->last()->id;
        $questiontag->save();

        $questiontag = new \App\Models\forum\QuestionTag();
        $questiontag->question_id = \App\Models\forum\Question::all()->last()->id;
        $questiontag->tag_id = \App\Models\forum\Tag::all()->last()->id;
        $questiontag->save();

        $questiontag = new \App\Models\forum\QuestionTag();
        $questiontag->question_id = \App\Models\forum\Question::all()->last()->id;
        $questiontag->tag_id = \App\Models\forum\Tag::all()->last()->id;
        $questiontag->save();

        $questiontag = new \App\Models\forum\QuestionTag();
        $questiontag->question_id = \App\Models\forum\Question::all()->last()->id;
        $questiontag->tag_id = \App\Models\forum\Tag::all()->last()->id;
        $questiontag->save();

        $vote = new \App\Models\forum\Vote();
        $vote->increment = true;
        $vote->question_id = \App\Models\forum\Question::all()->last()->id;
        $vote->user_id = \App\User::all()->last()->id;
        $vote->answer_id = \App\Models\forum\Question::all()->last()->id;
        $vote->save();

        $vote = new \App\Models\forum\Vote();
        $vote->increment = true;
        $vote->question_id = \App\Models\forum\Question::all()->last()->id;
        $vote->user_id = \App\User::all()->last()->id;
        $vote->answer_id = \App\Models\forum\Question::all()->last()->id;
        $vote->save();

        $vote = new \App\Models\forum\Vote();
        $vote->increment = true;
        $vote->question_id = \App\Models\forum\Question::all()->last()->id;
        $vote->user_id = \App\User::all()->last()->id;
        $vote->answer_id = \App\Models\forum\Question::all()->last()->id;
        $vote->save();

        $vote = new \App\Models\forum\Vote();
        $vote->increment = true;
        $vote->question_id = \App\Models\forum\Question::all()->last()->id;
        $vote->user_id = \App\User::all()->last()->id;
        $vote->answer_id = \App\Models\forum\Question::all()->last()->id;
        $vote->save();
    }
}
