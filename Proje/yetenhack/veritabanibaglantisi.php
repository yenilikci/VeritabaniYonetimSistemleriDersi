<?php
//oturumları başlatma yonetimpaneline girince işimize yarayacak. 
session_start();
ob_start();

//veritabanı bağlantımızı yapacağız
$kullanici = "root";
$sifre = "";
 //PDO veritabanı bağlantısı
 try
 {
//database değişkeni 
    $db = new PDO("mysql:host=localhost;dbname=proje;charset=utf8",$kullanici,$sifre);
 }
 //eğer veritabano bağlantıs kurulamaz ise hata mesajı fırlatacak.
 catch(PDOException $error)
 {
    echo "Veritabanı bağlantısı kurulamadı";
    $error -> getMessage();
 }
 ?>