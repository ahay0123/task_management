<?php
// panggil file koneksi.php
require_once('koneksi.php');

// membuat query ke / dari database
function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// function tambah data task
function tambah_task($data)
{
    global $koneksi;

    $title         = htmlspecialchars($data["title"]);
    $description         = htmlspecialchars($data["description"]);
    $assigned_to         = htmlspecialchars($data["assigned_to"]);
    $status         = htmlspecialchars($data["status"]);
    $priority         = htmlspecialchars($data["priority"]);
    $deadline = htmlspecialchars($data["deadline"]);

    $query = "INSERT INTO tasks (title, description, assigned_to, status, priority, deadline) 
              VALUES ('$title', '$description', '$assigned_to', '$status', '$priority', '$deadline')";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}
