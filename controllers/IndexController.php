<?php
/**
 * Created by PhpStorm.
 * User: grantorino
 * Date: 16.06.2018
 * Time: 16:15
 */

include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

function testAction() {
    echo 'IndexController.php > testAction';
}

function indexAction($smarty) {

    $rsCategories = getAllMainCatsWithChildren();
    $rsProducts = getLastProducts(16);

    $smarty->assign('pageTitle', 'Главная страница сайта');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}