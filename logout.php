<?php
setcookie("username", null, -300);
header("Location: auth.php");