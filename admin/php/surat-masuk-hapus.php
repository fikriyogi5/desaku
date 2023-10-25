<?php
require_once 'crud-modal.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $crud = new CRUD();
    $id = $_POST['id'];
    $crud->delete($id);
}
?>
