<?php
include 'config.php';


error_reporting(E_ERROR | E_PARSE);


$username = $_POST['username'];
$password = $_POST['password'];
$is_admin = $_POST['is_admin'];

// Create

if (isset($_POST['submit'])) {
	$sql = ("INSERT INTO `users`(`username`, `password`, `is_admin`) VALUES(?,?,?)");
	$query = $pdo->prepare($sql);
    $password = password_hash($password, PASSWORD_DEFAULT);
	$query->execute([$username, $password, $is_admin]);
	$success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Данные успешно отправлены!</strong> Вы можете закрыть это сообщение.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

}

// Read

$sql = $pdo->prepare("SELECT * FROM `users`");
$sql->execute();
$result = $sql->fetchAll();

// Update
$edit_username = $_POST['edit_username'];
$edit_password = $_POST['edit_password'];
$edit_is_admin = $_POST['edit_is_admin'];
$get_id = $_GET['id'];
if (isset($_POST['edit-submit'])) {
	$sqll = "UPDATE users SET username=?, password=?, is_admin=? WHERE id=?";
	$querys = $pdo->prepare($sqll);
	$querys->execute([$edit_username, $edit_password, $edit_is_admin, $get_id]);
	header('Location: '. $_SERVER['HTTP_REFERER']);
}

// DELETE
if (isset($_POST['delete_submit'])) {
	$sql = "DELETE FROM users WHERE id=?";
	$query = $pdo->prepare($sql);
	$query->execute([$get_id]);
	header('Location: '. $_SERVER['HTTP_REFERER']);
}
