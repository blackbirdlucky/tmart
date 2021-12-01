<?php
require_once 'config.php';

error_reporting(E_ERROR | E_PARSE);


$title_auto = $_POST['title_auto'];
$desc_auto = $_POST['desc_auto'];
$class_auto = $_POST['class_auto'];
$oldprice_auto = $_POST['oldprice_auto'];
$newprice_auto = $_POST['newprice_auto'];
$cover_auto = $_FILES['cover_auto']['name'];
$slider1_auto = $_FILES['slider1_auto']['name'];
$slider2_auto = $_FILES['slider2_auto']['name'];
$slider3_auto = $_FILES['slider3_auto']['name'];
$link_auto = $_POST['link_auto'];



// Create

if (isset($_POST['submit_auto'])) {
    $sql_auto = ("INSERT INTO `auto`(`title_auto`, `desc_auto`,`class_auto`,`oldprice_auto`,`newprice_auto`,`cover_auto`,`slider1_auto`,`slider2_auto`,`slider3_auto`, `link_auto`) VALUES(?,?,?,?,?,?,?,?,?,?)");
    $query_auto = $pdo->prepare($sql_auto);
    $query_auto->execute([$title_auto, $desc_auto,$class_auto,$oldprice_auto,$newprice_auto,$cover_auto,$slider1_auto,$slider2_auto,$slider3_auto, $link_auto]);
    $success_auto = '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Данные успешно отправлены!</strong> Вы можете закрыть это сообщение.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';

}
// Add Image
if (move_uploaded_file($_FILES['cover_auto']['tmp_name'], 'images/' . $cover_auto)) {
    header('Location: '. $_SERVER['HTTP_REFERER']);
}

// Add Image
if (move_uploaded_file($_FILES['slider1_auto']['tmp_name'], 'images/' . $slider1_auto)) {
    header('Location: '. $_SERVER['HTTP_REFERER']);
}

// Add Image
if (move_uploaded_file($_FILES['slider2_auto']['tmp_name'], 'images/' . $slider2_auto)) {
    header('Location: '. $_SERVER['HTTP_REFERER']);
}

// Add Image
if (move_uploaded_file($_FILES['slider3_auto']['tmp_name'], 'images/' . $slider3_auto)) {
    header('Location: '. $_SERVER['HTTP_REFERER']);
}

// Read
$sql_auto = $pdo->prepare("SELECT * FROM `auto`");
$sql_auto->execute();
$result_auto = $sql_auto->fetchAll();


// Update
$edit_title_auto = $_POST['edit_title_auto'];
$edit_desc_auto = $_POST['edit_desc_auto'];
$edit_class_auto = $_POST['edit_class_auto'];
$edit_oldprice_auto = $_POST['edit_oldprice_auto'];
$edit_newprice_auto = $_POST['edit_newprice_auto'];
$edit_cover_auto = $_FILES['edit_cover_auto']['name'];
$edit_slider1_auto = $_FILES['edit_slider1_auto']['name'];
$edit_slider2_auto = $_FILES['edit_slider2_auto']['name'];
$edit_slider3_auto = $_FILES['edit_slider3_auto']['name'];
$edit_link_auto = $_POST['edit_link_auto'];
$get_id_auto  = $_GET['id_auto'];
if (isset($_POST['edit-submit_auto'])) {
    $sqll_auto = "UPDATE auto SET title_auto=?, desc_auto=?,class_auto=?,oldprice_auto=?,newprice_auto=?,cover_auto=?,slider1_auto=?,slider2_auto=?,slider3_auto=?, link_auto=? WHERE id_auto=?";
    $querys_auto = $pdo->prepare($sqll_auto);
    $querys_auto->execute([$edit_title_auto, $edit_desc_auto,$edit_class_auto,$edit_oldprice_auto,$edit_newprice_auto,$edit_cover_auto,$edit_slider1_auto,$edit_slider2_auto,$edit_slider3_auto, $edit_link_auto, $get_id_auto]);
    header('Location: '. $_SERVER['HTTP_REFERER']);
}

// Edit Image
if (move_uploaded_file($_FILES['edit_cover_auto']['tmp_name'], 'images/' . $edit_cover_auto)) {
    header('Location: '. $_SERVER['HTTP_REFERER']);
}

if (move_uploaded_file($_FILES['edit_slider1_auto']['tmp_name'], 'images/' . $edit_slider1_auto)) {
    header('Location: '. $_SERVER['HTTP_REFERER']);
}

if (move_uploaded_file($_FILES['edit_slider2_auto']['tmp_name'], 'images/' . $edit_slider2_auto)) {
    header('Location: '. $_SERVER['HTTP_REFERER']);
}

if (move_uploaded_file($_FILES['edit_slider3_auto']['tmp_name'], 'images/' . $edit_slider3_auto)) {
    header('Location: '. $_SERVER['HTTP_REFERER']);
}

// DELETE
if (isset($_POST['delete-submit_auto'])) {
    $sql_auto = "DELETE FROM auto WHERE id_auto=?";
    $query_auto = $pdo->prepare($sql_auto);
    $query_auto->execute([$get_id_auto]);
    header('Location: '. $_SERVER['HTTP_REFERER']);
}

?>
