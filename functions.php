<?php

function authenticate($connect, $email, $password) {
    $password = md5($password);
    $q = mysqli_query($connect, "SELECT * FROM users WHERE email='$email' AND password='$password'");
    return mysqli_fetch_assoc($q);
}

?>