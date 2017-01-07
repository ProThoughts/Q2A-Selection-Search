<?php
/*
	Question2Answer by Gideon Greenspan and contributors
	http://www.question2answer.org/

	File: qa-plugin/selection-search/qa-selection-search-admin-form.php
	Description: Generic module class for mouseover layer plugin to provide admin form and default option


	This program is free software; you can redistribute it and/or
	modify it under the terms of the GNU General Public License
	as published by the Free Software Foundation; either version 2
	of the License, or (at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	More about this license: http://www.question2answer.org/license.php
*/

class qa-selection-search-admin-form
{
	public function option_default($option)
	{
		if ($option === 'selection_search_fade_in_time')
			return 1;
	}


	public function admin_form(&$qa_content)
	{
		$saved = qa_clicked('selection_search_save_button');

		if ($saved) {
			qa_opt('selection_search_fade_in_time', (int) qa_post_text('selection_search_fade_in_time_field'));
		}
/*
		qa_set_display_rules($qa_content, array(
			'selection_search_fade_in_time_display' => 'mouseover_content_on_field',
		));
*/
		return array(
			'ok' => $saved ? 'Selection search settings saved' : null,

			'fields' => array(
				array(
					'id' => 'selection_search_fade_in_time_display',
					'label' => 'Thời gian hiện ra:',
					'suffix' => 'giây',
					'type' => 'number',
					'value' => (int) qa_opt('selection_search_fade_in_time'),
					'tags' => 'name="selection_search_fade_in_time_field"',
				),
			),

			'buttons' => array(
				array(
					'label' => 'Save Changes',
					'tags' => 'name="selection_search_save_button"',
				),
			),
		);
	}
}
