<?php
/**
*
* @package phpBB Extension - LMDI Topic Search
* @copyright (c) 2017 LMDI - Pierre Duhem
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace lmdi\topicsearch\event;

/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
* Event listener
*/
class listener implements EventSubscriberInterface
{

	protected $template;
	protected $config;
	protected $user;
	protected $phpbb_root_path;
	protected $phpEx;


	public function __construct(
		\phpbb\template\template $template,
		\phpbb\config\config $config,
		\phpbb\user $user,
		$phpbb_root_path,
		$phpEx)
	{
		$this->template = $template;
		$this->config = $config;
		$this->user = $user;
		$this->phpbb_root_path = $phpbb_root_path;
		$this->phpEx = $phpEx;

	}

	static public function getSubscribedEvents ()
	{
	return array(
		'core.user_setup'				=> 'load_language',
		'core.page_header'				=> 'build_url',
		'core.search_modify_param_before'	=> 'modify_params_before',
		);
	}

	/**
	* Load the language strings
	*/
	public function load_language ($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'lmdi/topicsearch',
			'lang_set' => 'topicsearch',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}


	public function build_url($event)
	{
		if (version_compare ($this->config['version'], '3.2.x', '<'))
		{
			$mytop_320 = 0;
		}
		else
		{
			$mytop_320 = 1;
		}

		$options = $this->config['lmdi_topicsearch_ql'];
		$s_mytopics = true;
		$hidden = 0;
		$down = 0;

		switch ($options)
		{
			case -1 :
				$s_mytopics = false;
			break;
			case 0 :
				$down = 0;
				$hidden = 0;
			break;
			case 1 :
				$down = 1;
				$hidden = 0;
			break;
			case 2 :
				$down = 0;
				$hidden = 1;
			break;
			case 3 :
				$down = 1;
				$hidden = 1;
			break;
		}
		$params  = "author=" . $this->user->data['username'] . "&amp;sf=firstpost&amp;sr=topics";
		$url = append_sid($this->phpbb_root_path . "search." . $this->phpEx, $params);
		$this->template->assign_vars(array(
			'S_MYTOPICS'		=> $s_mytopics,
			'S_ADTOPICS'		=> $this->config['lmdi_topicsearch_ad'] == 1 ? true : false,
			'U_MYTOPICS'		=> $url,
			'S_MASK_MYPOSTS'	=> $hidden == 1 ? true : false,
			'S_MYTOP_AFTER'	=> $down == 1 ? true : false,
			'S_MYTOP_BEFORE'	=> $down == 0 ? true : false,
			'S_320'			=> $mytop_320,
		));
	}


	public function modify_params_before ($event)
	{
		/*
		* @var	string	keywords		String of the specified keywords
		* @var	array	sort_by_sql	Array of SQL sorting instructions
		* @var	array	ex_fid_ary	Array of excluded forum ids
		* @var	array	author_id_ary	Array of exclusive author ids
		* @var	string	search_id		The id of the search request
		* @var	array	id_ary		Array of post or topic ids for search result
		* @var	string	show_results	'posts' or 'topics' type of ids
		*/

		$sort_by_sql = $event['sort_by_sql'];
		$search_id = $event['search_id'];
		$show_results = $event['show_results'];
		$topics = $this->config['lmdi_topicsearch_kw'];
		if ($search_id == '' && $topics)
		{
			$sort_by_sql['t'] = 't.topic_last_post_time';
			$sort_by_sql['s'] = 't.topic_title';
			$event['sort_by_sql'] = $sort_by_sql;
			$show_results = 'topics';
			$event['show_results'] = $show_results;
		}
	}

}
