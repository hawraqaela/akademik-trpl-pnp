<?php
require_once 'koneksi.php';
session_start();

if (!isset($_SESSION['login'])) {
    header('location: login.php');
    exit;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #ff69b4;">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="index.php">📚 Sistem Akademik</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=mahasiswa">Mahasiswa</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=prodi">Program Studi</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php?page=profile">Profile</a></li>
                    <li class="nav-item"><a class="nav-link btn btn-danger text-white ms-2" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5 mb-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <?php
                $page = isset($_GET["page"]) ? $_GET["page"] : "home";

                if ($page == "mahasiswa") {
                    include("mahasiswa/list.php");
                } elseif ($page == "home") {
                    include("home.php");
                } elseif ($page == "create") {
                    include("mahasiswa/create.php");
                } elseif ($page == "edit") {
                    include("mahasiswa/edit.php");
                } elseif ($page == "prodi") {
                    include("prodi/listp.php");
                } elseif ($page == "prodi-create") {
                    include("prodi/createp.php");
                } elseif ($page == "prodi-edit") {
                    include("prodi/editp.php");
                } elseif ($page == "profile") {
                    include("profile.php");
                }
                ?>
            </div>
        </div>
    </div>

    <footer class="text-white text-center py-3 mt-5" style="background-color: #ff69b4;">
        <p class="mb-0">&copy; 2026 Sistem Akademik. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>