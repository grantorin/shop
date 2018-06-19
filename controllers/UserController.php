<?php
/**
 * User controller
 */

include_once '../models/CategoriesModel.php';
//include_once '../models/OrdersModel.php';
include_once '../models/UsersModel.php';


/**
 * AJAX register users
 *
 * @return json
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
			$resData['userName'] = $userData['name'] ? $userData['name'] : $userData['email'];
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