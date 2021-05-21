<?php
include("connection.php");
session_start();

$email = $_POST["email_user"];
$password = $_POST["password_user"];

$select = mysqli_query($connection, "SELECT * FROM user WHERE EMAIL_USER='$email' && PASSWORD_USER='$password'");
$num = mysqli_num_rows($select);

if ($num == 0) {
?>
    <script>
        alert("Wrong email or password !");
        document.location = "../signin.php";
    </script>
<?php
} else {
    while ($data = mysqli_fetch_array($select)) {
        $_SESSION["email_user"] = $data["email_user"];
        $_SESSION["nama_user"] = $data["nama_user"];
        $_SESSION["level_user"] = $data["level_user"];
    }
    header("location:../index.php");
}
?>