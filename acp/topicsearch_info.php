<?php
/**
*
* @package phpBB Extension - LMDI Topic Search
* @copyright (c) 2017 Pierre Duhem - LMDI
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace lmdi\topicsearch\acp;

class topicsearch_info
{
	function module()
	{
		return array(
			'filename'	=> '\lmdi\topicsearch\acp\topicsearch_module',
			'title'		=> 'ACP_TOPICSEARCH_TITLE',
			'version'		=> '1.0.0',
			'modes'		=> array (
				'settings'	=> array('title' => 'ACP_TOPICSEARCH_CONFIG',
					'auth' => 'ext_lmdi/topicsearch && acl_a_board',
					'cat' => array('ACP_TOPICSEARCH_TITLE')),
			),
		);
	}
}
