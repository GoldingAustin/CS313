<?php
session_start();

$conn = pg_connect("host=ec2-54-163-246-165.compute-1.amazonaws.com port=5432 dbname=dcfekv66t3orlp user=dxgkrpudzqxphn password=dbb68ad52247be47330ba3c1ae9d5e877ed1ee6a97f3fe33315580982eeef26d");
//if(!$conn){  echo "Error : Unable to open database\n"; }
//return $conn;
$myusername = pg_escape_string($conn, $_POST['name']);
$pass = password_hash($_POST['pass1'], PASSWORD_DEFAULT);
//$pass = $_POST['pass1'];
//$mypassword = pg_escape_string($conn, $pass);
echo "<script>console.log('". $pass ."')</script>";
$sql = "SELECT * FROM `user` WHERE username = '$myusername'";
$result = pg_query($conn, $sql);
$row = pg_fetch_array($result, PGSQL_ASSOC);
$active = $row['active'];

$count = pg_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row

if ($count == 1) {
    $error = "Username already exists";
    echo "true";
    return true;
} else {
    $sql = "INSERT INTO `user` (`username`, `password`, `create_time`, `user_id`) VALUES ('$myusername', '$pass', CURRENT_TIMESTAMP, NULL)";
    $result = pg_query($conn, $sql);
    $_SESSION['login_user'] = $myusername;
    echo "false";
    return true;
}

?>