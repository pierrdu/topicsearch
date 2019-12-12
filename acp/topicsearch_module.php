<?php
/**
* @package phpBB Extension - LMDI Topic Search
* @copyright (c) 2017 Pierre Duhem - LMDI
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace lmdi\topicsearch\acp;

class topicsearch_module {

	public $u_action;
	protected $action;
	protected $table;

	public function main ($id, $mode)
	{
		global $db, $language, $template, $cache, $request;
		global $config, $phpbb;
		global $table_prefix, $phpbb_log;

		$language->add_lang ('topicsearch', 'lmdi/topicsearch');
		$this->tpl_name = 'acp_topicsearch_body';
		$this->page_title = $language->lang('ACP_TOPICSEARCH_TITLE');

		$action = $request->variable ('action', '');
		$update_action = false;
		$form_key = 'lmdi_topicsearch';

		if ($request->is_set_post('submit'))
		{
			if (!check_form_key($form_key))
			{
				trigger_error('FORM_INVALID');
			}

			$advanced = $request->variable ('advanced', 0);
			// var_dump ($advanced);
			$config->set ('lmdi_topicsearch_ad', $advanced);
			$keywords = $request->variable ('keywords', 0);
			// var_dump ($keywords);
			$config->set ('lmdi_topicsearch_kw', $keywords);

			$yes = $request->variable ('mytop_yes', 0);
			if ($yes)
			{
				$down = $request->variable ('mytop_up', 0);
				$hidden = $request->variable ('myposts_no', 0);

				if ($down && $hidden)
				{
					$config->set ('lmdi_topicsearch_ql', 3);
				}
				if (!$down && $hidden)
				{
					$config->set ('lmdi_topicsearch_ql', 2);
				}
				if ($down && !$hidden)
				{
					$config->set ('lmdi_topicsearch_ql', 1);
				}
				if (!$down && !$hidden)
				{
					$config->set ('lmdi_topicsearch_ql', 0);
				}
			}
			else
			{
				$config->set ('lmdi_topicsearch_ql', -1);
			}
			trigger_error($language->lang('ACP_TOPICSEARCH_UPDATED') . adm_back_link($this->u_action));
		}

		add_form_key ($form_key);

		$options = $config['lmdi_topicsearch_ql'];
		switch ($options)
		{
			case -1 :
				$down = 0;
				$hidden = 0;
				$yes = 0;
			break;
			case 0 :
				$down = 0;
				$hidden = 0;
				$yes = 1;
			break;
			case 1 :
				$down = 1;
				$hidden = 0;
				$yes = 1;
			break;
			case 2 :
				$down = 0;
				$hidden = 1;
				$yes = 1;
			break;
			case 3 :
				$down = 1;
				$hidden = 1;
				$yes = 1;
			break;
		}
		$template->assign_vars(array(
			'U_ACTION'		=> $this->u_action,
			'S_CONFIG_PAGE'	=> true,
			'ADVANCED_POSTS'	=> $config['lmdi_topicsearch_ad'] == 0 ? 'checked="checked"' : '',
			'ADVANCED_TOPICS'	=> $config['lmdi_topicsearch_ad'] == 1 ? 'checked="checked"' : '',
			'KEYWORDS_POSTS'	=> $config['lmdi_topicsearch_kw'] == 0 ? 'checked="checked"' : '',
			'KEYWORDS_TOPICS'	=> $config['lmdi_topicsearch_kw'] == 1 ? 'checked="checked"' : '',
			'MYTOP_YES'		=> $yes == 1 ? 'checked="checked"' : '',
			'MYTOP_NO'		=> $yes == 0 ? 'checked="checked"' : '',
			'MYTOP_UP'		=> $down == 0 ? 'checked="checked"' : '',
			'MYTOP_DOWN'		=> $down == 1 ? 'checked="checked"' : '',
			'MYPOSTS_YES'		=> $hidden == 1 ? 'checked="checked"' : '',
			'MYPOSTS_NO'		=> $hidden == 0 ? 'checked="checked"' : '',
			));
	}
}
