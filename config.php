<?php session_start();
$koneksi = new mysqli('localhost', 'root', '', 'myapp_alffya') or die(mysqli_error($koneksi));
 if (isset($_POST['login'])) {
    $Username = htmlspecialchars($_POST['Username']);
    $password = sha1($_POST['password']);
    $query = $koneksi->query("SELECT * FROM user WHERE Username='$Username' and password='$password'");
    $num = mysqli_num_rows ($query);
    $c = mysqli_fetch_array($query);
    if ($num > 0) {
        $_SESSION['Username'] = $c['Username'];
        $_SESSION['nmUser'] = $c['nmUser'];
        header("location:index.php");
    } else { 
        echo "Gagal";
    }
}