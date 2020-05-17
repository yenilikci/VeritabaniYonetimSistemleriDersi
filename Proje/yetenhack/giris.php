<?php include 'veritabanibaglantisi.php';
//yonetimpaneli_ustkisimdaki ayarlar tablosunun aynısı çekiyorum.
$id = 1;
$sorgu = $db->prepare("SELECT *FROM genelayarlar");
$sorgu->execute();
$vericek = $sorgu->fetch(PDO::FETCH_ASSOC);

error_reporting(0);
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $vericek["site_yazi"]; ?> - Giriş Sayfası</title>
    <!--Jquery Dahil Edilmesi-->
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <!--Font Awesome kütüphanesinin projeye dahil edilmesi.-->
    <link rel="stylesheet" href="kutuphaneler/fontawesome-free-5.11.2-web/css/all.css">
    <!--Bootstrap kütüphanesinin projeye dahil edilmesi.-->
    <link rel="stylesheet" href="kutuphaneler/bootstrap-4.4.1-dist/css/bootstrap.css">
    <!--Yüklenme Efekti Stil Dosyasının dahil edilmesi.-->
    <link rel="stylesheet" href="stil/yuklenmeefekti.css">
    <!--Giriş Ekranı-->
    <link rel="stylesheet" href="stil/girisekrani.css">
</head>
<body>
    <!--Giriş Ekranı Yüklenme Efekti-->
    <div id="preloader">
        <p class="mt-5">Oturum Aç</p>
        <div id="status">&nbsp;</div>
    </div>
    <div class="sapkaarkasi p-5"><i class="fas fa-hat-wizard logo fa-spin" style="font-size: 40px;"></i></div>
    <h2 class="text-center text-white mt-4">Yetenhack Oturum Aç</h2>
        <div class="container">
        <div class="card bg-white efekt">
                <div class="card-body">
                   <form action="islem.php" method="POST">
                   <p class="text-dark text-center" style="font-size: 30px;">Kullanıcı Adı:</p>   
                    <input name="admin_kadi" class="form-control text-center mt-2 kadi" type="text" placeholder="Kullanıcı Adı Giriniz">
                    <p class="text-dark text-center mt-2" style="font-size: 30px;">Şifre:</p>   
                    <input name="admin_sifre" type="password" class="form-control text-center mt-2 sifre" placeholder="Şifre Giriniz">
                    <!--Boş bırakılınca çıkacak uyarı.-->
                    <?php
                        //get ile gönderdiğim veri bos'a eşitse burası çalışsın.
                        if($_GET["giris"]=="bos")
                        {
                            ?>                            
                                <div class="alert alert-warning mt-4 text-center">
                                    <span><i class="fas fa-exclamation-triangle"></i></span>
                                    Boş alan bırakmayınız.
                                </div>
                            <?php
                        }
                        elseif($_GET["giris"]=="basarisiz")
                        {
                            ?>
                                   <div class="alert alert-danger mt-4 text-center">
                                    <span><i class="fas fa-exclamation-triangle"></i></span>
                                        Kullanıcı adınız veya şifreniz hatalı!
                                </div>
                            <?php
                        }
                    ?>               
                    <button name="login" class="btn giris mt-4 form-control">Giriş</button>
                   </form>
                </div>
            </div>
        </div>

<p class="text-center mt-5" style="font-size: 20px;"><i class="fas fa-hat-wizard"></i> YETENHACK. gururla sunar geliştirici <i class="fas fa-code mx-2"></i>Muhammed Melih Çelik & Ceyda Önemli</p>
<script>
        //yüklenme efekti
        $(window).load(function() { // makes sure the whole site is loaded
        $('#status').fadeOut(); // will first fade out the loading animation
        $('#preloader').delay(350).fadeOut('very slow'); // will fade out the white DIV that covers the website.
        $('body').delay(350).css({'overflow':'visible'});
        })
    </script>
</body>
</html>