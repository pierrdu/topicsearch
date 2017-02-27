<?php
/**
*
* @package phpBB Extension - LMDI Topic Search
* @copyright (c) 2017 Pierre Duhem - LMDI
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace lmdi\topicsearch\migrations;

class migration_1 extends \phpbb\db\migration\migration
{

	public function effectively_installed()
	{
		return isset($this->config['lmdi_topicsearch']);
	}


	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v310\alpha2');
	}


	public function update_data()
	{
		return array(
			array('module.add', array('acp', 'ACP_CAT_DOT_MODS', 'ACP_TOPICSEARCH_TITLE')),
			array('module.add', array('acp', 'ACP_TOPICSEARCH_TITLE', array(
					'module_basename'	=> '\lmdi\topicsearch\acp\topicsearch_module',
					'auth'			=> 'ext_lmdi/topicsearch && acl_a_board',
					'modes'			=> array('settings'),
					),
			)),

			array('config.add', array('lmdi_topicsearch_ql', -1)),
			array('config.add', array('lmdi_topicsearch_kw', 0)),
			array('config.add', array('lmdi_topicsearch_ad', 0)),
		);
	}

}
