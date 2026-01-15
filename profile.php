<?php
require __DIR__ . '/koneksi.php';
$email = $_SESSION['email'];
$query = $koneksi->prepare("SELECT * FROM pengguna WHERE email = ?");
$query->bind_param("s", $email);
$query->execute();
$result = $query->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    echo '<div class="alert alert-danger">User tidak ditemukan.</div>';
    exit;
}
?>

<div class="mb-4">
    <h2 class="mb-4">Edit Profile</h2>

    <div id="errorMessage" class="alert alert-danger" role="alert" style="display: none;"></div>

        <form action="proses.php" method="post" onsubmit="return validateForm()" style="max-width: 500px;">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($user['email']) ? htmlspecialchars($user['email']) : ''; ?>" readonly>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password Baru</label>
            <input type="password" class="form-control" id="password" name="password" minlength="6" placeholder="Biarkan kosong jika tidak ingin mengubah">
        </div>

        <div class="mb-4">
            <label for="confirm_password" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Konfirmasi password baru">
        </div>

        <button type="submit" name="update_profile" class="btn text-white" style="background-color: #ff69b4; border-color: #ff69b4;">Update Profile</button>
    </form>
</div>

<script>
    function validateForm() {
        const password = document.getElementById('password').value;
        const confirmPassword = document.getElementById('confirm_password').value;
        const errorMessage = document.getElementById('errorMessage');

        if (password.trim() !== '') {
            if (password.length < 6) {
                errorMessage.textContent = 'Password minimal 6 karakter.';
                errorMessage.style.display = 'block';
                return false;
            }
            if (password !== confirmPassword) {
                errorMessage.textContent = 'Password konfirmasi tidak cocok!';
                errorMessage.style.display = 'block';
                return false;
            }
        }

        errorMessage.style.display = 'none';
        return true;
    }
</script>