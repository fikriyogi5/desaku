<?php
require_once 'crud-modal.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $crud = new CRUD();
    $name = $_POST['name'];
    $description = $_POST['description'];
    $crud->create($name, $description);
}
?>
