<?php
include('_koneksi.php');

$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM admin WHERE 
            username = '".$username."'
        AND
            password = '".$password."'";
$query = mysqli_query($conn, $sql);
$ada = mysqli_num_rows($query);

if($ada > 0){
    $data = mysqli_fetch_assoc($query);
    session_start();
    $_SESSION['login'] = true;
    $_SESSION['id_admin'] = $data['id_admin'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['password'] = $data['password'];
    
} else {
    header('location:login.php');
}

echo $sql;
?>
