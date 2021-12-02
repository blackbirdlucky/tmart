<?php
require_once 'config.php';

error_reporting(E_ERROR | E_PARSE);


$name_order = $_POST['name_order'];
$fam_order = $_POST['fam_order'];
$mail_order = $_POST['mail_order'];
$phone_order = $_POST['phone_order'];
$desc_order = $_POST['desc_order'];
$city_order = $_POST['city_order'];
$address_order = $_POST['address_order'];



// Create

if (isset($_POST['submit_order'])) {
    $sql_order = ("INSERT INTO `orders`(`name_order`, `fam_order`,`mail_order`,`phone_order`,`desc_order`,`city_order`, `address_order`) VALUES(?,?,?,?,?,?,?)");
    $query_order = $pdo->prepare($sql_order);
    $query_order->execute([$name_order, $fam_order,$mail_order,$phone_order,$desc_order,$city_order, $address_order]);
    $success_order = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Данные успешно отправлены!</strong> Вы можете закрыть это сообщение.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

}

// Read
$sql_order = $pdo->prepare("SELECT * FROM `orders`");
$sql_order->execute();
$result_order = $sql_order->fetchAll();


// Update
$edit_name_order = $_POST['edit_name_order'];
$edit_fam_order = $_POST['edit_fam_order'];
$edit_mail_order = $_POST['edit_mail_order'];
$edit_phone_order = $_POST['edit_phone_order'];
$edit_desc_order = $_POST['edit_desc_order'];
$edit_city_order = $_POST['edit_city_order'];
$edit_address_order = $_POST['edit_address_order'];
$get_id_order  = $_GET['id_order'];
if (isset($_POST['edit-submit_order'])) {
    $sqll_order = "UPDATE orders SET name_order=?, fam_order=?,mail_order=?,phone_order=?,desc_order=?,city_order=?, address_order=? WHERE id_order=?";
    $querys_order = $pdo->prepare($sqll_order);
    $querys_order->execute([$edit_name_order, $edit_fam_order,$edit_mail_order,$edit_phone_order,$edit_desc_order,$edit_city_order, $edit_address_order, $get_id_order]);
    header('Location: '. $_SERVER['HTTP_REFERER']);
}


// DELETE
if (isset($_POST['delete-submit_order'])) {
    $sql_order = "DELETE FROM orders WHERE id_order=?";
    $query_order = $pdo->prepare($sql_order);
    $query_order->execute([$get_id_order]);
    header('Location: '. $_SERVER['HTTP_REFERER']);
}

?>
