<?php 
include("connection.php");
if(isset($_POST['SendData'])){
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $password = $_POST['Password'];
    $query_sendData = "CALL tambah_user('$name', '$email', '$password')";
    $check_sendData = mysqli_query($connection, $query_sendData);
    if($check_sendData){
        ?>
        <script>
            document.location = "../signin.php";
            alert('Sign up success');
        </script>
        <?php
    }else{
        echo mysqli_error($connection);
    }
}
?>