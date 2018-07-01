<?php
/**
 * Model for [posts] table
 */


/**
 * Get posts
 *
 * @param int $postID
 * @return array|null
 */
function get_posts($postID) {
	global $db;

	$postID = intval($postID);
	$sql = "SELECT *
			FROM `posts`
			WHERE `id` = '{$postID}'";

	$rs = $db->query($sql);

	return $rs->fetch(PDO::FETCH_ASSOC);
}