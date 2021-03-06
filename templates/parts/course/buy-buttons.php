<div class="buy-btns">

	<?php

	if (sikshya()->course->is_premium(get_the_ID())) {

		if (!sikshya()->course->has_enrolled(get_the_ID())) {
			$enroll_now_button_text = __('Add To Cart', 'sikshya');
		} else if (!sikshya()->course->user_course_completed(get_the_ID())) {
			$enroll_now_button_text = __('Continue to Course', 'sikshya');
		} else {
			$enroll_now_button_text = __('Restart The Course', 'sikshya');

		}
	} else {
		$enroll_now_button_text = __('Enroll Now', 'sikshya');

		if (!is_user_logged_in()) {
			$enroll_now_button_text = __('Login & Enroll Now', 'sikshya');
		} else if (!sikshya()->course->has_enrolled(get_the_ID())) {
			$enroll_now_button_text = __('Enroll Now', 'sikshya');
		} else if (!sikshya()->course->user_course_completed(get_the_ID())) {
			$enroll_now_button_text = __('Continue to Course', 'sikshya');
		} else {
			$enroll_now_button_text = __('Restart The Course', 'sikshya');
		}
	}
	?>
	<form class="sikshya-enroll-form" method="post">
		<input type="hidden" name="sikshya_course_id"
			   value="<?php echo absint(get_the_ID()); ?>">
		<input type="hidden" value="sikshya_enroll_in_course"
			   name="sikshya_action"/>
		<input type="hidden" value="sikshya_notice"
			   name="sikshya_enroll_in_course"/>
		<input type="hidden"
			   value="<?php echo wp_create_nonce('wp_sikshya_enroll_in_course_nonce') ?>"
			   name="sikshya_nonce"/>

		<div class=" sikshya-course-enroll-wrap">
			<?php
			if (!is_user_logged_in()) {
				$login_page_id = absint(get_option('sikshya_login_page'));
				$login_page_permalink = '#';
				if ($login_page_id > 0) {
					$login_page_permalink = get_permalink($login_page_id);
				}
				?>
				<a href="<?php echo esc_attr($login_page_permalink); ?>"
				   class="btn btn-add-cart">
					<?php echo esc_html($enroll_now_button_text); ?>
				</a>
				<?php
			} else {
				?>
				<button type="submit"
						class="btn btn-add-cart">
					<?php echo esc_html($enroll_now_button_text); ?>
				</button>
			<?php } ?>
		</div>
	</form>


</div>
