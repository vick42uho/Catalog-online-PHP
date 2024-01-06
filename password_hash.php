<?php



$hash = password_hash("admin", PASSWORD_DEFAULT);



if (password_verify('admin', $hash)) {
    echo 'Password is valid!';
} else {
    echo 'Invalid password.';
}

?>