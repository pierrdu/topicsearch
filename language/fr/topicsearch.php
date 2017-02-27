<?php
/**
*
* @package phpBB Extension - LMDI Topic Search
* @copyright (c) 2017 Pierre Duhem — LMDI
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
	'ACP_TOPICSEARCH_TITLE'		=> 'Recherche par sujets',
	'ACP_TOPICSEARCH_CONFIG'		=> 'Configuration de l’extension',
	'ACP_TOPICSEARCH_UPDATED'	=> 'La configuration a bien été mise à jour.',

	'MY_TOPICS'			=> 'Mes sujets',
	'MYTOP_POS'			=> 'Position de la rubrique « Mes sujets »',
	'MYTOP_POS_EXPLAIN'		=> 'Sélectionnez « Haut » pour insérer le nouveau menu en haut du menu « Accès rapide ». Sélectionnez « Bas » pour le mettre à la fin.',
	'ACP_MYTOP_TOP'		=> 'Haut',
	'ACP_MYTOP_BOTTOM'		=> 'Bas',
	'MYTOP_ADD'			=> 'Addition d’une rubrique « Mes sujets »',
	'MYTOP_ADD_EXPLAIN'		=> 'Vous pouvez choisir d’ajouter une rubrique « Mes sujets » dans le menu « Accès rapide » (par opposition à « Mes messages »).',
	'MYPOST_NO'			=> 'Masquage de la rubrique « Mes messages »',
	'MYPOST_NO_EXPLAIN'		=> 'Vous pouvez souhaiter masquer la rubrique « Mes messages » dans le menu « Accès rapide », dans la mesure où les deux rubriques ont une utilisation très proche.',
	'TS_QUICKLINKS'		=> 'Gestion des rubriques du menu « Accès rapide »',
	'TS_TOPICS'			=> 'Par sujets',
	'TS_POSTS'			=> 'Par messages',
	'TS_KEYWORDS'		=> 'Recherche par mots-clefs',
	'TS_KEYWORDS_EXPLAIN'	=> 'Vous pouvez choisir que les recherches lancées depuis l’index général du forum ou depuis un sous-forum affichent leur résultat par messages (comportement par défaut) ou par sujets.',
	'TS_ADVANCED'		=> 'Recherche avancée',
	'TS_ADVANCED_EXPLAIN'	=> 'Vous pouvez choisir que les recherches lancées depuis la page de recherche avancée affichent leur résultat par messages (comportement par défaut) ou par sujets.',

));
