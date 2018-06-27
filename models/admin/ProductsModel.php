<?php
/**
 * Model for products table
 */

/**
 * Get All Products
 *
 * @return array
 */
function get_products () {
	global $db;

	$sql = "SELECT *
            FROM `products`
            ORDER BY `category_id`";

	$rs = mysqli_query($db, $sql); // use query

	return createSmartyRsArray($rs);
}


/**
 * Set New Product
 *
 * @param string $newProdName
 * @param int $newProdPrice
 * @param int $newProdCatList
 * @param string $newProdDescription
 * @param string $newProdImage
 * @return bool|mysqli_result
 */
function set_product($newProdName = '', $newProdPrice = 0, $newProdCatList = 0, $newProdDescription = '', $newProdImage = '') {
	global $db;

	$sql = "INSERT INTO `products`
            SET 
            	`category_id` = '{$newProdCatList}',
            	`name` = '{$newProdName}',
            	`description` = '{$newProdDescription}',
            	`price` = '{$newProdPrice}',
            	`image` = '{$newProdImage}'";

	$rs = mysqli_query($db, $sql); // use query

	return $rs;
}


/**
 * Update product
 *
 * @param int $ID
 * @param string $name
 * @param int $price
 * @param null $status
 * @param string $description
 * @param int $cat
 * @param null $image
 * @param bool $del
 * @return bool|mysqli_result
 */
function update_product($ID, $name = '', $price = 0, $status = null,
						$description = '', $cat = 0, $image = null, $del = false ) {
	global $db;

	if ($del && $ID) {
		$sql = "DELETE FROM `products`
			WHERE `id` = '{$ID}'";

		$rs = mysqli_query($db, $sql);
		return $rs;
	}

	$set = array();

	if ($cat) {
		$set[] = "`category_id` = '{$cat}'";
	}

	if ($name) {
		$set[] = "`name` = '{$name}'";
	}

	if ($description) {
		$set[] = "`description` = '{$description}'";
	}

	if ($price > 0) {
		$set[] = "`price` = '{$price}'";
	}

	if ($image) {
		$set[] = "`image` = '{$image}'";
	}

	if ($status) {
		$set[] = "`status` = '{$status}'";
	}

	$rsSet = implode($set, ", ");
	$sql = "UPDATE `products`
			SET {$rsSet}
			WHERE `id` = '{$ID}'";

//	d($sql);
	$rs = mysqli_query($db, $sql); // use query

	return $rs;
}

/**
 * Update img file
 *
 * @param int $itemID
 * @param string $newFileName
 * @return bool|mysqli_result
 */
function update_image($itemID, $newFileName) {
	return update_product($itemID, null, null, null, null, null, $newFileName);
}