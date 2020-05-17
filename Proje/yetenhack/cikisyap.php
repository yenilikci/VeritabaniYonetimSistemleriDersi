<?php
//klasik oturum başlatma.
session_start();
//tüm oturum işlemini bitir.
session_destroy();

header("Location: yonetimpaneli.php");
?>