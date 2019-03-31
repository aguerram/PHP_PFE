<?php
require_once "../dao/CommentDAO.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $comm = new CommentDAO();
    $comm->delete($id);
}
header("Location: " . route("tdb"));