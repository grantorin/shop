<?php
/**
 * Model for categories table
 */

/**
 * Get All Categories
 *
 * @return array
 */
function get_cats () {
	global $db;
	$sql = "SELECT *
            FROM `categories`
            ORDER BY `parent_id` ASC";

	$rs = mysqli_query($db, $sql); // use query

	return createSmartyRsArray($rs);
}


/**
 * Get All Categories Primary
 *
 * @return array
 */
function get_cats_primary() {
	global $db;
	$sql = "SELECT *
            FROM `categories`
            WHERE `parent_id` = 0" ;

	$rs = mysqli_query($db, $sql); // use query

	return createSmartyRsArray($rs);
}


/**
 * Insert category
 *
 * @param string $catName
 * @param int $catParentID
 * @return int|string
 */
function set_cat($catName, $catParentID = 0) {
	global $db;
	$sql = "INSERT INTO
            `categories` (`parent_id`, `name`)
            VALUES ('{$catParentID}', '{$catName}')";

	mysqli_query($db, $sql);

	// get insert id
	$id = mysqli_insert_id($db);

	return $id;
}


/**
 * Update category
 *
 * @param int $catID
 * @param int $catParentID
 * @param string $catName
 * @return bool|mysqli_result
 */
function update_cat($catID, $catParentID = -1, $catName = '') {
	global $db;

	$set = array();

	if ($catName) {
		$set[] = "`name` = '{$catName}'";
	}

	if ($catParentID > -1) {
		$set[] = "`parent_id` = '{$catParentID}'";
	}
	$setStr = implode($set, ", ");
	$sql = "UPDATE `categories`
            SET {$setStr}
            WHERE id = '{$catID}'";

	$rs = mysqli_query($db, $sql);

	return $rs;
}