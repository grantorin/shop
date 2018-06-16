<?php
/**
 * Created by PhpStorm.
 * User: grantorino
 * Date: 16.06.2018
 * Time: 16:15
 */

function testAction() {
    echo 'IndexController.php > testAction';
}

function indexAction($smarty) {
    $smarty->assign('pageTitle', 'Главная страница сайта');

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}