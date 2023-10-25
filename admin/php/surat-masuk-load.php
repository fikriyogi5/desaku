<?php
require_once 'crud-modal.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $crud = new CRUD();
    $data = $crud->read();
    echo json_encode($data);
}
?>
