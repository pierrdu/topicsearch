<?php
/**
*
* @package phpBB Extension - LMDI Topic Search
* @copyright (c) 2017 Pierre Duhem - LMDI
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// Some characters you may want to copy&paste:
// ’ » “ ” …

$lang = array_merge($lang, array(
	'ACP_TOPICSEARCH_TITLE'		=> 'Search By Topics',
	'ACP_TOPICSEARCH_CONFIG'		=> 'Extension settings',
	'ACP_TOPICSEARCH_UPDATED'	=> 'The configuration was successfully updated.',
	'MY_TOPICS'			=> 'Your Topics',
	'MYTOP_POS'			=> 'Position of item “Your Topics”',
	'MYTOP_POS_EXPLAIN'		=> 'Select “Top” to put the new menu item at the beginning of the “Quick links” dropdown menu. Select “Bottom” to put it at the end.',
	'ACP_MYTOP_TOP'		=> 'Top',
	'ACP_MYTOP_BOTTOM'		=> 'Bottom',
	'MYTOP_ADD'			=> 'Addition of a new item “Your Topics”',
	'MYTOP_ADD_EXPLAIN'		=> 'You may select to display a new “Your Topics” menu item in the “Quick links” dropdown menu to complement or replace the “Your Posts” menu item.',
'MYPOST_NO'			=> 'Hide the “Your Posts” item',
	'MYPOST_NO_EXPLAIN'		=> 'You may want to hide the “Your Posts” item in the “Quick links” menu, since both menu items are really similar.',
	'TS_QUICKLINKS'		=> 'Management of “Quick links” menu items',
	'TS_TOPICS'			=> 'As topics',
	'TS_POSTS'			=> 'As posts',
	'TS_KEYWORDS'		=> 'Search by keywords',
	'TS_KEYWORDS_EXPLAIN'	=> 'You may want that searches launched from the board index page or from forum pages display their results as posts (default behaviour) or as topics.',
	'TS_ADVANCED'		=> 'Advanced search',
	'TS_ADVANCED_EXPLAIN'	=> 'You may want that searches launched from the advanced search page display their results as posts (default behaviour) or as topics.',

));
