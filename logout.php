<?php
session_start();
session_destroy();
header('Location:cafe.php');