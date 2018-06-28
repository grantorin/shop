<?php
/**
 * Admin controller {/admin/}
 */

//d($_SESSION,0);
// if not auth admin

if ($_SESSION['user']['role'] != 1 && ($actionName !== 'index' && $actionName !== 'login')) {
	exit('Please login');
}


include_once '../models/admin/CategoriesModel.php';
include_once '../models/admin/UsersModel.php';
include_once '../models/admin/ProductsModel.php';
include_once '../models/admin/OrdersModel.php';


// Set global path for admin
$smarty->setTemplateDir(TemplateAdminPrefix);
$smarty->assign('templateWebPath', TemplateAdminWebPath);



/**
 * Load Index Page Auth Admin
 *
 * @param object $smarty
 */
function indexAction ($smarty) {

	loadTemplate($smarty, 'auth-admin');
}

/**
 * Load Home Page Admin
 *
 * @param object $smarty
 */
function homeAction ($smarty) {

	$rsCategories = get_cats_primary();

	$helpers = array(
		'activeMenu' => array(
			'index' => 1,
			'categories' => 0,
			'products' => 0,
			'orders' => 0
		)
	);

	$smarty->assign('helpers', $helpers);
	$smarty->assign('titlePage', __('Info'));
	$smarty->assign('rsCategories', $rsCategories);

	loadTemplate($smarty, 'header-admin');
	loadTemplate($smarty, 'index-admin');
	loadTemplate($smarty, 'footer-admin');
}

/**
 * Login User
 */
function loginAction () {

	$email = $_POST['email'];
	$pwd   = $_POST['pwd'];

	if (!($email && $pwd)) {
		echo "Error auth, not required parameters";
		return;
	}

	$rs =  login_user ($email, $pwd);

	if ($rs) {

		$_SESSION['user'] = $rs[0];

		redirect('/admin/home/');
	}

	// TODO replace to login.tpl
	echo "Login or password invalid, <a href='/admin/'>LogIn</a>";
}

/**
 * Insert category from AJAX
 */
function addnewcatAction () {

	$catName     = $_POST['cat'];
	$catParentID = $_POST['catParent'];

	$res = set_cat($catName, $catParentID);

	if ($res) {
		$resData['success'] = 1;
		$resData['message'] = __('Category Add');
	} else {
		$resData['success'] = 0;
		$resData['message'] = __('Category Add Error');
	}

	echo json_encode($resData);
}


/**
 * Load Category Page Admin
 *
 * @param object $smarty
 */
function categoryAction ($smarty) {

	$rsCategories = get_cats();
	$rsCategoriesPrimary = get_cats_primary();

	$helpers = array(
		'activeMenu' => array(
			'category'   => 1
		)
	);

	$smarty->assign('helpers', $helpers);
	$smarty->assign('titlePage', __('Categories'));
	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsCategoriesPrimary', $rsCategoriesPrimary);

	loadTemplate($smarty, 'header-admin');
	loadTemplate($smarty, 'category-admin');
	loadTemplate($smarty, 'footer-admin');
}


/**
 * Update category from AJAX
 */
function updatecategoryAction() {

	$catID = intval($_POST['catID']);
	$catParentID = intval($_POST['catParent']);
	$catName = trim($_POST['cat']);

	$res = update_cat($catID, $catParentID, $catName);

	if ($res) {
		$resData['success'] = 1;
		$resData['message'] = __('Category Update');
	} else {
		$resData['success'] = 0;
		$resData['message'] = __('Category Update Error');
	}

	echo json_encode($resData);
}


/**
 * Load Products Page Admin
 *
 * @param object $smarty
 */
function productsAction ($smarty) {

	$rsCategories = get_cats();
	$rsProducts = get_products();

	$helpers = array(
		'activeMenu' 	 => array(
			'products' 	 => 1
		)
	);

	$smarty->assign('helpers', $helpers);
	$smarty->assign('titlePage', __('Products'));
	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsProducts', $rsProducts);

	loadTemplate($smarty, 'header-admin');
	loadTemplate($smarty, 'product-admin');
	loadTemplate($smarty, 'footer-admin');
}

/**
 * Add product from JSON
 *
 * TODO Change logic save image or generate filename
 */
function addproductAction() {

	$newProdName 		= $_POST['newProdName']  		? trim($_POST['newProdName']) 		 : '';
	$newProdPrice 		= $_POST['newProdPrice']  		? intval($_POST['newProdPrice']) 	 : 0;
	$newProdCatList 	= $_POST['newProdCatList']  	? intval($_POST['newProdCatList']) 	 : 0;
	$newProdDescription = $_POST['newProdDescription']  ? trim($_POST['newProdDescription']) : '';
	$newProdImage 		= '';

	if ($_FILES['fileimg']['size'] > FILEMAXSIZE) {
		echo "Uploaded file size exceeded";
		return;
	}

	if (is_uploaded_file($_FILES['fileimg']['tmp_name'])) {

		// shift img from tmp directory to base img path
		$res = move_uploaded_file($_FILES['fileimg']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/img/products/' . $_FILES['fileimg']['size'] . '_' . $_FILES['fileimg']['name']);
		if ($res) {
			$newProdImage = $_FILES['fileimg']['size'] . '_' . $_FILES['fileimg']['name'];
		}
	} else {
		echo "Uploaded file Error";
	}

	$res = set_product($newProdName, $newProdPrice, $newProdCatList, $newProdDescription, $newProdImage);

	if ($res) {
		$resData['success'] = 1;
		$resData['message'] = __('Product Add');
	} else {
		$resData['success'] = 0;
		$resData['message'] = __('Error product add');
	}

	echo json_encode($resData);
}


/**
 * Update Product from AJAX
 */
function updateproductAction() {

	$ID 		 = isset($_POST['itemID']) 	 	? $_POST['itemID'] 	 	: null;
	$name 		 = isset($_POST['name']) 		? $_POST['name'] 		: '';
	$price 		 = isset($_POST['price']) 		? $_POST['price'] 		: 0;
	$status 	 = isset($_POST['status']) 	 	? $_POST['status']		: 1;
	$description = isset($_POST['description']) ? $_POST['description'] : '';
	$cat 		 = isset($_POST['catParent']) 	? $_POST['catParent'] 	: 0;
	$del 		 = $_POST['del'];

	if (!$ID) return;

	$res = update_product($ID, $name, $price, $status, $description, $cat, null, $del);

	if ($res) {
		$resData['success'] = 1;
		$resData['message'] = __('Product data Update');
	} else {
		$resData['success'] = 0;
		$resData['message'] = __('Error product data Update');
	}

	echo json_encode($resData);
}


/**
 * Image file uploading
 */
function uploadAction() {

	$itemID = $_POST['itemID'];

	$ext = pathinfo($_FILES['fileimg']['name'], PATHINFO_EXTENSION);

	$newFileName = $itemID . '.' . $ext;

	if ($_FILES['fileimg']['size'] > FILEMAXSIZE) {
		echo "Uploaded file size exceeded";
		return;
	}

	if (is_uploaded_file($_FILES['fileimg']['tmp_name'])) {

		// shift img from tmp directory to base img path
		$res = move_uploaded_file($_FILES['fileimg']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/img/products/' . $newFileName);
		if ($res) {
			$res = update_image($itemID, $newFileName);
			if ($res) {
				redirect('/admin/products/');
			}
		}
	} else {
		echo "Uploaded file Error";
	}
}

/**
 * Load Media Page Admin
 *
 * @param object $smarty
 */
function mediaAction($smarty) {

	$rsCategories = get_cats();

	$helpers = array(
		'activeMenu' 	 => array(
			'media' 	 => 1
		)
	);

	$smarty->assign('helpers', $helpers);
	$smarty->assign('titlePage', __('Media'));
	$smarty->assign('rsCategories', $rsCategories);

	loadTemplate($smarty, 'header-admin');
	loadTemplate($smarty, 'media-admin');
	loadTemplate($smarty, 'footer-admin');
}

/**
 * Load Options Page Admin
 *
 * @param object $smarty
 */
function optionsAction($smarty) {

	$rsCategories = get_cats();

	$helpers = array(
		'activeMenu' 	 => array(
			'options' 	 => 1
		)
	);

	$smarty->assign('helpers', $helpers);
	$smarty->assign('titlePage', __('Options'));
	$smarty->assign('rsCategories', $rsCategories);

	loadTemplate($smarty, 'header-admin');
	loadTemplate($smarty, 'options-admin');
	loadTemplate($smarty, 'footer-admin');
}


/**
 * Load Orders Page Admin
 *
 * @param object $smarty
 */
function ordersAction ($smarty) {

	$rsCategories = get_cats();
	$rsOrders = get_orders();

	$helpers = array (
		'activeMenu' => array(
			'orders' => 1
		),
		'message' 			=> array(
			'empty-content'	=> __('No products'),
			'details-order'	=> __('Details')
		),
		'status' => array(
			0	 => __('<span class="text-danger">No Payment</span>'),
			1	 => __('<span class="text-success">Payment</span>')
		)
	);

	$smarty->assign('helpers', $helpers);
	$smarty->assign('titlePage', __('Orders'));
	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsOrders', $rsOrders);

	loadTemplate($smarty, 'header-admin');
	loadTemplate($smarty, 'orders-admin');
	loadTemplate($smarty, 'footer-admin');
}



function setorderstatusAction () {

	$itemID = $_POST['id'] ? intval($_POST['id']) : null;
	$date = $_POST['date'] ? $_POST['date'] : null;

	if (!($itemID && $date)) {
		$resData['success'] = 0;
		$resData['message'] = __('Error set date');

		echo json_encode($resData);
		return;
	}

	$res = update_order_status ($itemID, $date);

	if ($res) {
		$resData['success'] = 1;
		$resData['message'] = __('Order Status Update');
		$resData['date-payment'] = $date;
	} else {
		$resData['success'] = 0;
		$resData['message'] = __('Error Order Status Update');
	}

	echo json_encode($resData);
}