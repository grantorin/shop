<?php
/**
 * Model for categories table
 */


/**
 * Get All Categories Primary
 *
 * @return array
 */
function getAllMainCategories() {
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
function insertCat($catName, $catParentID = 0) {
	global $db;
	$sql = "INSERT INTO
            `categories` (`parent_id`, `name`)
            VALUES ('{$catParentID}', '{$catName}')";

	mysqli_query($db, $sql);

	// get insert id
	$id = mysqli_insert_id($db);

	return $id;
}