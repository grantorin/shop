<?php
/**
 * Index page Controller
 */

include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

/**
 * Load Index Page
 *
 * @param object $smarty
 */
function indexAction($smarty) {

	$rsCategories = get_cats();
	$rsProducts = get_products_last(16);

	//> Paginator
	$paginator = array();
	$paginator['per_page'] = 9;
	$paginator['cur_page'] = isset($_GET['page']) ? $_GET['page'] : 1;
	$paginator['offset'] = $paginator['cur_page'] * $paginator['per_page'] - $paginator['per_page'];
	$paginator['link'] = '/index/?page=';

	list($rsProducts, $all_cnt) = get_products_last($paginator['per_page'], $paginator['offset']);

	$paginator['page_count'] = ceil($all_cnt / $paginator['per_page']);
	//<


	$smarty->assign('titlePage', __('Главная страница сайта'));
	$smarty->assign('paginator', $paginator);
	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsProducts', $rsProducts);

	loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}