<!--Veritabanı bağlantı dosyamızı dahil edelim ve genelatarlar tablosundan verileri çekelim.-->
<?php include 'veritabanibaglantisi.php'; 

//kullanıcıyı önce girişe yönlendirme
if(!$_SESSION["admin_kadi"])
{
    header("Location: giris.php");
}

$id = 1;
$sorgu = $db->prepare("SELECT *FROM genelayarlar");
$sorgu->execute();
$vericek = $sorgu->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $vericek["site_yazi"]; ?> - Yönetim Paneli</title>
    <!--Jquery Dahil Edilmesi-->
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <!--Font Awesome kütüphanesinin projeye dahil edilmesi.-->
    <link rel="stylesheet" href="kutuphaneler/fontawesome-free-5.11.2-web/css/all.css">
    <!--Bootstrap kütüphanesinin projeye dahil edilmesi.-->
    <link rel="stylesheet" href="kutuphaneler/bootstrap-4.4.1-dist/css/bootstrap.css">
    <!--Yüklenme Efekti Stil Dosyasının dahil edilmesi.-->
    <link rel="stylesheet" href="stil/yuklenmeefekti.css">
    <!--Yönetim Paneli Üst Çubuğunun Stil Dosyasının Projeye Dahil Edilmesi-->
    <link rel="stylesheet" href="stil/yonetimpaneliustcubuk.css">
    <!--Yönetim Paneli Sol Menüsünün Stil Dosyasının Projeye Dahil Edilmesi-->
    <link rel="stylesheet" href="stil/yonetimpanelisolmenu.css">
    <!--Yönetim Panelinde Ayarların Uygulandığı İçerik Kısmı-->
    <link rel="stylesheet" href="stil/yonetimpaneliicerik.css">
</head>

<body>
    <!--Yönetim Paneli Yüklenme Efekti-->
    <div id="preloader">
        <p class="mt-5">Yönetim Paneli</p>
        <div id="status">&nbsp;</div>
    </div>


    <div class="container-fluid">
        <!--Üst bilgi çubuğu-->
        <nav class="navbar hosgeldiniz">
        <a href="http://localhost/yetenhack/cikisyap.php" target="_blank" class="btn btn-sm bg-danger rounded"><i class="fas fa-sign-out-alt mr-2"></i></i>Çıkış Yap</a>
            <a class="navbar-brand" href="#"><i class="fas fa-hat-wizard logo mr-2"></i>Yetenhack Yönetim Paneli</a>
            <a href="http://localhost/yetenhack/" target="_blank" class="btn bg-success"><i class="fas fa-arrow-alt-circle-left mr-2"></i>Siteye Geri Dön</a>
        </nav>