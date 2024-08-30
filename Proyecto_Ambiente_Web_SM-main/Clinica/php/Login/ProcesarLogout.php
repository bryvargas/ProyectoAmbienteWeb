<?php
    setcookie("username", '' , time() - (86400 * 30), "/");
    header("Location: ../../Index.php");
?>