<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex align-items-center" style="min-height: 100vh;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card shadow">
                    <div class="card-body p-5">
                        <h1 class="card-title text-center mb-4">Login Akademik</h1>

                        <?php
                        if (isset($_POST['submit'])) {
                            require __DIR__ . '/koneksi.php';
                            session_start();
                            
                            $email = mysqli_real_escape_string($koneksi, $_POST['email']);
                            $pass = md5(mysqli_real_escape_string($koneksi, $_POST['password']));

                            $ceklogin = "SELECT * FROM pengguna WHERE email='$email' AND password='$pass'";
                            $result = $koneksi->query($ceklogin);

                            if ($result && $result->num_rows > 0) {
                                $user = $result->fetch_assoc();
                                $_SESSION['login'] = TRUE;
                                $_SESSION['email'] = $email;
                                $_SESSION['nama'] = $user['nama'];
                                header('location: index.php');
                            } else {
                                echo '<div class="alert alert-danger mb-4">Email atau password salah!</div>';
                            }
                        }
                        ?>

                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input name="email" type="email" class="form-control" id="email" required>
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" id="password" required>
                            </div>
                            <button type="submit" name="submit" class="btn w-100 text-white" style="background-color: #ff69b4; border-color: #ff69b4;">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>