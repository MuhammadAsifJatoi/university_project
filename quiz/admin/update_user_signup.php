<?php
require_once 'includes/db_connection.php';

$id = $_POST['id'];

$sql = "SELECT * FROM `user_signup` WHERE `id` = ?";

$stmt = mysqli_prepare($connection, $sql);

if (is_object($stmt)) {
	mysqli_stmt_bind_param($stmt, 'i', $id);
	mysqli_stmt_bind_result($stmt, $id, $name, $cnic, $password);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_store_result($stmt);
	mysqli_stmt_fetch($stmt);

	if (mysqli_stmt_num_rows($stmt)) {
		echo json_encode(['status' => 'success', 'id' => $id, 'name' => $name, 'cnic' => $cnic ]);
	} else {
		echo json_encode(['status' => 'error', 'message' => 'Error:Failed to insert resord.']);
	}
}

?>