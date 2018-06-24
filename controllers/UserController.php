<?php
/**
 * User controller
 */

include_once '../models/CategoriesModel.php';
include_once '../models/UsersModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';



/**
 * Register users from AJAX
 *
 * @return string JSON
 */
function registerAction() {
	$email = isset($_REQUEST['email']) ? trim($_REQUEST['email']) : null;

	$pwd1 = isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
	$pwd2 = isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;

	$phone   = isset($_REQUEST['phone'])   ? $_REQUEST['phone'] : null;
	$address = isset($_REQUEST['address']) ? $_REQUEST['address'] : null;
	$name    = isset($_REQUEST['name'])    ? trim($_REQUEST['name']) : null;

	$resData = null;
	$resData = checkRegisterParams($email, $pwd1, $pwd2);

	if (!$resData && checkUserEmail($email)) {
		$resData['success'] = false;
		$resData['message'] = __('A user with this email(') . $email . __(') has already been registered');
	}

	if (!$resData) {
		$pwdMD5 = md5($pwd1);

		$userData = registerNewUser($email, $pwdMD5, $name, $phone, $address);

		if ($userData['success']) {
			$resData['success'] = 1;
			$resData['message'] = __('User successfully registered');

			$userData = $userData[0];
			$resData['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
			$resData['userEmail'] = $email;

			$_SESSION['user'] = $userData;
			$_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
		} else {
			$resData['success'] = 0;
			$resData['message'] = __('Registration error');
		}
	}

	echo json_encode($resData);
}



/**
 * Logout User from system
 */
function logoutAction() {
	if (isset($_SESSION['user'])) {
		unset($_SESSION['user']);
		unset($_SESSION['cart']);
	}

	redirect('/');
}


/**
 * Login user from AJAX
 *
 * @return string JSON
 */
function loginAction() {
	$email = isset($_REQUEST['email']) ? trim($_REQUEST['email']) : null;
	$pwd   = isset($_REQUEST['pwd'])   ? trim($_REQUEST['pwd']) : null;

	$userData = loginUser($email, $pwd);

	if ($userData['success']) {
		$userData = $userData[0];

		$_SESSION['user'] = $userData;
		$_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];

		$resData = $_SESSION['user'];
		$resData['success'] = 1;

	} else {

		$resData['success'] = 0;
		$resData['message'] = __('Wrong login or password');
	}

	echo json_encode($resData);
}



/**
 * Load User Page
 *
 * @param object $smarty
 */
function indexAction($smarty) {

	if(!isset($_SESSION['user'])) redirect('/');

	$rsCategories = get_cats();

	$rsUserOrders = getCurUserOrders();

	$helpers = array(
		'isShippingRequired' => 0,
		'titleOrders' => __('Orders'),
		'status' => array(
			0 => __('No Payment'),
			1 => __('Payment')
		)
	);

	if (!$rsUserOrders) {
		$helpers['titleOrders'] = __('Not Orders');
	}

	$smarty->assign('helpers', $helpers);
	$smarty->assign('titlePage', __('User page'));
	$smarty->assign('rsCategories', $rsCategories); // all categories array
	$smarty->assign('rsUserOrders', $rsUserOrders);

	loadTemplate($smarty, 'header');
	loadTemplate($smarty, 'user');
	loadTemplate($smarty, 'footer');
}


/**
 * User Data Update from AJAX
 *
 * @return string JSON
 */
function updateAction() {

	if(!isset($_SESSION['user'])) redirect('/');

	$resData = array();
	$phone   = isset($_REQUEST['phone'])   ? trim($_REQUEST['phone'])   : null;
	$address = isset($_REQUEST['address']) ? trim($_REQUEST['address']) : null;
	$name    = isset($_REQUEST['name'])    ? trim($_REQUEST['name'])    : null;
	$pwd1    = isset($_REQUEST['pwd1'])    ? trim($_REQUEST['pwd1'])    : null;
	$pwd2    = isset($_REQUEST['pwd2'])    ? trim($_REQUEST['pwd2'])    : null;
	$curPwd  = isset($_REQUEST['curPwd'])  ? trim($_REQUEST['curPwd'])  : null;

	$curPwdMD5 = md5($curPwd);
	if (!$curPwd || ($_SESSION['user']['pwd'] != $curPwdMD5)) {
		$resData['success'] = 0;
		$resData['message'] = 'Current password error';
		echo json_encode($resData);
		return false;
	}

	//	User update
	$res = updateUserData ($name, $phone, $address, $pwd1, $pwd2, $curPwdMD5);
	if ($res) {
		$resData['success']     = 1;
		$resData['message']     = 'Data update';
		$resData['displayName'] = $name;
		$resData['phone']       = $phone;
		$resData['address']     = $address;

		$_SESSION['user']['name']        = $name;
		$_SESSION['user']['phone']       = $phone;
		$_SESSION['user']['address']     = $address;

		$newPwd = $_SESSION['user']['pwd'];
		if ($pwd1 && ($pwd1 == $pwd2)) $newPwd = md5(trim($pwd1));

		$_SESSION['user']['pwd']         = $newPwd;
		$_SESSION['user']['displayName'] = $name ? $name : $_SESSION['user']['email'];

	} else {

		$resData['success'] = 0;
		$resData['message'] = 'Error Update Action';
	}
	echo json_encode($resData);
}