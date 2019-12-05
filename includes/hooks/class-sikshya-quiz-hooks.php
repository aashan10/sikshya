<?php

class Sikshya_Quiz_Hooks
{

    public function __construct()
    {
        add_action('sikshya_after_quiz_content', array($this, 'quiz_button_form'));

    }

    public function quiz_button_form()
    {


        $params = array(
            'quiz_id' => get_the_ID(),
            'course_id' => get_post_meta(get_the_ID(), 'course_id', true),
            'lesson_id' => get_post_meta(get_the_ID(), 'lesson_id', true)
        );
        if (!sikshya()->quiz->is_started(get_current_user_id(), $params['quiz_id'])) {
            sikshya_load_template('parts.quiz.start-form', $params);
        }

    }
}

new Sikshya_Quiz_Hooks();