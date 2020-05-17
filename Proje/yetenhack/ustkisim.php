<?php include 'veritabanibaglantisi.php';
//üst kısım bütün sayfalarda bulunduğu için genelayarlar sorgularımı buraya çekerim.
$ayarlar = $db->prepare("SELECT *FROM genelayarlar");
//ayarlar değişkeni ile veritabanına bağlandım ve genelayarlar tablosunu seçtim.
$ayarlar->execute(); //veri çekiceğimi belirttim.
$ayarlaricek = $ayarlar->fetch(PDO::FETCH_ASSOC); //veriyi tek tek seçeceğimi fetch yazarak belirtiyorum.
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <!--Veritabanımdan site_yazi verisini çekip title içine yazdırıyorum.-->
    <title><?php echo $ayarlaricek["site_yazi"];?></title>
    <!--Veritabanımdan site_bilgi verisini çekip description içeriğine yazdırıyorum.-->
    <meta name="description" content="<?php echo $ayarlaricek["site_bilgi"]; ?>">
    <!--Veritabanımdan site_anahtar verisini çekip keywords içeriğine yazdırıyorum.-->
    <meta name="keywords" content="<?php echo $ayarlaricek["site_anahtar"]; ?>">
    
    <!--Jquery Dahil Edilmesi-->
    <script src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
    <!--Yüklenme Efekti-->
    <link rel="stylesheet" href="stil/yuklenmeefekti.css">
    <!--Font Awesome kütüphanesinin projeye dahil edilmesi.-->
    <link rel="stylesheet" href="kutuphaneler/fontawesome-free-5.11.2-web/css/all.css">
    <!--Bootstrap kütüphanesinin projeye dahil edilmesi.-->
    <link rel="stylesheet" href="kutuphaneler/bootstrap-4.4.1-dist/css/bootstrap.css">
    <!--Üst kısım için Css'in içeri dahil edilmesi.-->
    <link rel="stylesheet" href="stil/ustkisim.css">
    <!--Site içeriğinin sol kısmı.-->
    <link rel="stylesheet" href="stil/solkisim.css">
    <!--Site içeriğinin orta kısmı-->
    <link rel="stylesheet" href="stil/ortakisim.css">
    <!--Site İçeriğinin Sağ Kısmı-->
    <link rel="stylesheet" href="stil/sagkisim.css">
    <!--Site içeriğinin alt kısmı-->
    <link rel="stylesheet" href="stil/altkisim.css">
</head>