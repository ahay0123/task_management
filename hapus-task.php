<?php
require_once 'function.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    if (hapus_task($id) > 0) {
        header("Location: task.php?status=success&message=Data berhasil dihapus!");
        exit;
    } else {
        header("Location: task.php?status=error&message=Data gagal disimpan!");
        exit;
    }
}
