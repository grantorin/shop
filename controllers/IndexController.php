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

    $smarty->assign('titlePage', __('Главная страница сайта'));
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}