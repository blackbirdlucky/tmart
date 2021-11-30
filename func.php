<?php
include 'config.php';


error_reporting(E_ERROR | E_PARSE);

$id_cart = $_GET['id_cart'];
$id_user = $_POST['id_user'];
$id_auto = $_POST['id_auto'];

// Create

if (isset($_POST['submit'])) {
	$sql = ("INSERT INTO `cart`(`id_user`, `id_auto`) VALUES(?,?)");
	$query = $pdo->prepare($sql);
	$query->execute([ $id_user, $id_auto]);
	$success = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Данные успешно отправлены!</strong> Вы можете закрыть это сообщение.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

}

// DELETE
if (isset($_GET['delete_cart'])) {
    $sql = "DELETE FROM cart WHERE id_cart=?";
    $query = $pdo->prepare($sql);
    $query->execute([$id_cart]);
    header('Location: '. $_SERVER['HTTP_REFERER']);
}