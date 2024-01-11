<?php

session_start();
session_destroy();

header('Location: /Views/Home/index.php');

?>