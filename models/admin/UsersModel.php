<?php
/**
 * Created by PhpStorm.
 * User: grantorino
 * Date: 28.06.2018
 * Time: 13:50
 */

/**
 * Login User
 *
 * @param string $email
 * @param string $pwd
 * @return array|bool
 */
function login_user ($email, $pwd) {
	global $db;

	$email = htmlspecialchars(mysqli_real_escape_string ($db, $email));
	$pwd   = md5($pwd);

	$sql = "SELECT *
			FROM `users`
			WHERE (`email` = '{$email}' AND `pwd` = '{$pwd}' AND `role` = 1)
			LIMIT 1";

	$rs = mysqli_query($db, $sql);
	$rs = createSmartyRsArray($rs);

	return $rs;
}
