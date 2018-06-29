<?php
/**
 * Pages Controller {/page/1}
 */

include_once '../models/CategoriesModel.php';
include_once '../models/PostsModel.php';

/**
 * Load Pages
 *
 * @param object $smarty
 */
function indexAction($smarty) {

	$postID = isset($_GET['id']) ? $_GET['id'] : null;

	if(!$postID) redirect('/');

	$rsCategories = get_cats();
	$rsPosts = get_posts($postID);

	$smarty->assign('titlePage', $rsPosts['post_title']);
	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsPosts', $rsPosts);

	loadTemplate($smarty, 'header');
	loadTemplate($smarty, 'page');
	loadTemplate($smarty, 'footer');
}