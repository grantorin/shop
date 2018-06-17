<?php
/**
 * Created by PhpStorm.
 * User: grantorino
 * Date: 16.06.2018
 * Time: 16:15
 */

include_once '../models/CategoriesModel.php';

function testAction() {
    echo 'IndexController.php > testAction';
}

function indexAction($smarty) {

    $rsCategories = getAllMainCatsWithChildren();

    $smarty->assign('pageTitle', 'Главная страница сайта');
    $smarty->assign('rsCategories', $rsCategories);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}