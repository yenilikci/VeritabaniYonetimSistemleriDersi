<?php
//veritabanı ile bağlantıyı sağladık.
include 'veritabanibaglantisi.php';


#Giriş İşlemi
if(isset($_POST["login"]))
{
    //zararlı yazılım kodlarını devre dışı bırakmak için -> htmlspecialchars kullandık.
    //$_POST ile gelen input değerlerini bu fonksiyonun içine alırsak kodu işleme almaz yazı olarak alır.
    $admin_kadi = htmlspecialchars(trim($_POST["admin_kadi"])); //trim boşlukları yok saymasını sağlar.
    //md5 ile şifreleme yapıyoruz.
    $admin_sifre = htmlspecialchars(trim(md5($_POST["admin_sifre"])));   //trim boşlukları yok saymasını sağlar.


    //input değerleri boş bırakalamasın diye kontrol.
    if(!$admin_kadi || !$admin_sifre)
    {
        //bu değerler boş bırakıldıysa yönlendirme yapacak.
        header("Location: giris.php?giris=bos");
    }
    //kullanıcı bu değerleri boş bırakmadıysa
    else
    {
        //inputtan gelen değerler ile admin panelinden gelen değerler uyuşuyorsa
        $sorgu = $db->prepare("SELECT *FROM uye_admin WHERE admin_kadi=? AND admin_sifre=?");
        $sorgu->execute(array($admin_kadi,$admin_sifre));
        $admin_giris = $sorgu->fetch(PDO::FETCH_ASSOC);

        //eğer girilen bilgiler doğru ise
        if($admin_giris)
        {
            //admin giriş true ise oturum oluşturuyoruz
            $_SESSION["login"] = true;
            //bir session daha oluşturuyorum ve veri tabanından çektiğim admin_kadi'ye eşitliyorum.
            $_SESSION["admin_kadi"] = $admin_giris["admin_kadi"];
            //bir session daha oluşturuyorum ve veri tabanından çektiğim admin_id'ye eşitliyorum.
            $_SESSION["admin_id"] = $admin_giris["admin_id"]; 

            //ve beni yönlendir.
            header("Location: yonetimpaneli.php");
        }
        //eğer girilen bilgiler yanlış ise
        else
        {
            //beni basarisiz olarak tekrar giris.php ye yönlendirsin
            header("Location: giris.php?giris=basarisiz");
        }

    }

}







#GENEL AYARLAR GÜNCELLEME
#eğer genelayarlar isimli bir buton varsa buraya çalıştır.
if (isset($_POST["genelayarlar"]))
{
    #site_id olarak gönderdiğim get'i burada yakalıyorum.
    $site_id = $_GET["site_id"];


    #post ile gönderdiğim site_yazi'yi çektim.
    $site_yazi = $_POST["site_yazi"];
    #post ile gönderdiğim site_adres'i çektim.
    $site_adres = $_POST["site_adres"];
    #post ile gönderdiğim site_bilgi'yi çektim.
    $site_bilgi = $_POST["site_bilgi"];        
    #post ile gönderdiğim site_anahtar'ı çektim.
    $site_anahtar = $_POST["site_anahtar"];
    #post ile gönderdiğim site_altkisim'i çektim.
    $site_altkisim = $_POST["site_altkisim"];    
            
    #eğer bu kısımlar boş bırakıldıysa
    if(!$site_yazi || !$site_adres || !$site_bilgi || !$site_anahtar || !$site_altkisim)
    {
        //uyarı verdiriyoruz bunu aynı sayfada uyarı olarak yapacağız.
        //bunun için genelayarlar sayfasına bir get gönderiyorum.
        header("Location: genelayarlar.php?ayarguncelle=bos");
    }
    else
    {
        #eğer boş değilse.
        $sorgu = $db->prepare("UPDATE genelayarlar SET site_yazi=?,site_adres=?,site_bilgi=?,site_anahtar=?,site_altkisim=? WHERE
        site_id=?");
        $update = $sorgu->execute(array($site_yazi,$site_adres,$site_bilgi,$site_anahtar,$site_altkisim,$site_id));
        #güncellendiyse ekrana uyarı gelsin.
        if($update)
        {
            header("Location: genelayarlar.php?ayarguncelle=basarili");
        }else{
            header("Location: genelayarlar.php?ayarguncelle=basarisiz");
        }
    }
}

#BİLGİLERİM GÜNCELLEME
if(isset($_POST["bilgilerim"]))  
{

    #bilgi_id olarak gönderdiğim get'i burada yakalıyorum.
    $bilgi_id = $_GET["bilgi_id"];


    #post ile gönderdiğim bilgi_fotograf'ı çektim.
    $bilgi_fotograf = $_POST["bilgi_fotograf"];
    #post ile gönderdiğim bilgi_isim'i çektim.
    $bilgi_isim = $_POST["bilgi_isim"];
    #post ile gönderdiğim bilgi_hakkimnda'yi çektim.
    $bilgi_hakkinda = $_POST["bilgi_hakkinda"];        
    #post ile gönderdiğim bilgi_ikamet'ı çektim.
    $bilgi_ikamet = $_POST["bilgi_ikamet"];
    #post ile gönderdiğim bilgi_mail'i çektim.
    $bilgi_mail = $_POST["bilgi_mail"];    
    #post ile gönderdiğim bilgi_telefon'i çektim.
    $bilgi_telefon = $_POST["bilgi_telefon"];    
            
    #eğer bu kısımlar boş bırakıldıysa
    if(!$bilgi_fotograf || !$bilgi_isim || !$bilgi_hakkinda || !$bilgi_ikamet || !$bilgi_mail || !$bilgi_telefon)
    {
        //uyarı verdiriyoruz bunu aynı sayfada uyarı olarak yapacağız.
        //bunun için genelayarlar sayfasına bir get gönderiyorum.
        header("Location: bilgilerim.php?bilgiguncelle=bos");
    }
    else
    {
        $sorgu = $db->prepare("UPDATE bilgilerim SET bilgi_fotograf=?,bilgi_isim=?,bilgi_hakkinda=?,bilgi_ikamet=?,bilgi_mail=?,bilgi_telefon=? WHERE bilgi_id=? ");
        $update = $sorgu->execute(array($bilgi_fotograf,$bilgi_isim,$bilgi_hakkinda,$bilgi_ikamet,$bilgi_mail,$bilgi_telefon,$bilgi_id));
    }

        #güncellendiyse ekrana uyarı gelsin.
    if($update)
    {
        header("Location: bilgilerim.php?bilgiguncelle=basarili");
    }else{
        header("Location: bilgilerim.php?bilgiguncelle=basarisiz");
    }
}


    #SOSYAL BECERİ EKLEME
    if(isset($_POST["beceri-ekle"]))
    {                    
        

        $sosyalbeceri_adi = $_POST["sosyalbeceri_adi"];
        $sosyalbeceri_yuzde = $_POST["sosyalbeceri_yuzde"];


        if(!$sosyalbeceri_adi || !$sosyalbeceri_yuzde)
        {
            header("Location: sosyalbeceriler.php?sosyalbecerilerekle=bos");
        }
        else
        {
            //veri ekleme yapmak için insert into yapıyoruz
            $sorgu = $db->prepare("INSERT INTO sosyalbeceri_yeteneklerim SET sosyalbeceri_adi=?,sosyalbeceri_yuzde=?");
            $insert = $sorgu->execute(array($sosyalbeceri_adi,$sosyalbeceri_yuzde));   
    
                    //insert işlemi başarılı ise çalışır.
            if($insert)
            {
                header("Location: sosyalbeceriler.php?sosyalbecerilerekle=basarili");
            }
            //insert işlemi başarısız ise çalışır.
            else
            {
                header("Location: sosyalbeceriler.php?sosyalbecerilerekle=basarisiz");
            }
        }
  
    }
    
    #Becerilerimi Düzenleme
if(isset($_POST["beceri-duzenle"]))  
{

    #sosyalbeceri_id olarak gönderdiğim get'i burada yakalıyorum.
    $sosyalbeceri_id = $_GET["sosyalbeceri_id"];


    $sosyalbeceri_adi = $_POST["sosyalbeceri_adi"];
    $sosyalbeceri_yuzde = $_POST["sosyalbeceri_yuzde"];

    #eğer bu kısımlar boş bırakıldıysa
    if(!$sosyalbeceri_adi || !$sosyalbeceri_yuzde)
    {
        //uyarı verdiriyoruz bunu aynı sayfada uyarı olarak yapacağız.
        //bunun için genelayarlar sayfasına bir get gönderiyorum.
        header("Location: sosyalbeceriler.php?sosyalbecerilerduzenle=bos");
    }
    else
    {
        $sorgu = $db->prepare("UPDATE sosyalbeceri_yeteneklerim SET sosyalbeceri_adi=?,sosyalbeceri_yuzde=? WHERE sosyalbeceri_id=? ");
        $update = $sorgu->execute(array($sosyalbeceri_adi,$sosyalbeceri_yuzde,$sosyalbeceri_id));
              #güncellendiyse ekrana uyarı gelsin.
                if($update)
                {
                    header("Location: sosyalbeceriler.php?sosyalbecerilerduzenle=basarili");
                }else{
                    header("Location: sosyalbeceriler.php?sosyalbecerilerduzenle=basarisiz");
                }
    }
}

    #BECERİ Sil

    $sosyalbecerisil_id = $_GET["sosyalbecerisil_id"];
    if(isset($sosyalbecerisil_id))
    {
        //eğer sosyal beceri sil id varsa
        $sorgu = $db->prepare("DELETE FROM sosyalbeceri_yeteneklerim WHERE sosyalbeceri_id=?");
        $sil = $sorgu->execute(array($sosyalbecerisil_id));
        // eğer sil çalışıyorsa
        if($sil)
        {
            header("Location: sosyalbeceriler.php?sosyalbecerisil=basarili");
        }
        else
        {
            header("Location: sosyalbeceriler.php?sosyalbecerisil=basarisiz");
        }
    }




    #Yabancı Dil Ekleme
    if(isset($_POST["dil-ekle"]))
    {                    
        

        $yabancidil_isim = $_POST["yabancidil_isim"];
        $yabancidil_yuzde = $_POST["yabancidil_yuzde"];


        if(!$yabancidil_isim || !$yabancidil_yuzde)
        {
            header("Location: yabancidiller.php?yabancidillerekle=bos");
        }
        else
        {
            //veri ekleme yapmak için insert into yapıyoruz
            $sorgu = $db->prepare("INSERT INTO yabancidil_yeteneklerim SET yabancidil_isim=?,yabancidil_yuzde=?");
            $insert = $sorgu->execute(array($yabancidil_isim,$yabancidil_yuzde));   
    
                    //insert işlemi başarılı ise çalışır.
            if($insert)
            {
                header("Location: yabancidiller.php?yabancidillerekle=basarili");
            }
            //insert işlemi başarısız ise çalışır.
            else
            {
                header("Location: yabancidiller.php?yabancidillerekle=basarisiz");
            }
        }
  
    }
    
    #Yabancı Dilleri Düzenleme
if(isset($_POST["yabancidil-duzenle"]))  
{

    #yabancidil_id olarak gönderdiğim get'i burada yakalıyorum.
    $yabancidil_id = $_GET["yabancidil_id"];


    $yabancidil_isim = $_POST["yabancidil_isim"];
    $yabancidil_yuzde = $_POST["yabancidil_yuzde"];

    #eğer bu kısımlar boş bırakıldıysa
    if(!$yabancidil_isim || !$yabancidil_yuzde)
    {
        //uyarı verdiriyoruz bunu aynı sayfada uyarı olarak yapacağız.
        //bunun için genelayarlar sayfasına bir get gönderiyorum.
        header("Location: yabancidiller.php?yabancidillerduzenle=bos");
    }
    else
    {
        $sorgu = $db->prepare("UPDATE yabancidil_yeteneklerim SET yabancidil_isim=?,yabancidil_yuzde=? WHERE yabancidil_id=? ");
        $update = $sorgu->execute(array($yabancidil_isim,$yabancidil_yuzde,$yabancidil_id));
              #güncellendiyse ekrana uyarı gelsin.
                if($update)
                {
                    header("Location: yabancidiller.php?yabancidillerduzenle=basarili");
                }else{
                    header("Location: yabancidiller.php?yabancidillerduzenle=basarisiz");
                }
    }
}

    #Yabancı Dil Sil

    $yabancidilsil_id = $_GET["yabancidilsil_id"];
    if(isset($yabancidilsil_id))
    {
        //eğer sosyal yabancı dil sil id varsa
        $sorgu = $db->prepare("DELETE FROM yabancidil_yeteneklerim WHERE yabancidil_id=?");
        $dilsil = $sorgu->execute(array($yabancidilsil_id));
        // eğer sil çalışıyorsa
        if($dilsil)
        {
            header("Location: yabancidiller.php?yabancıdillersil=basarili");
        }
        else
        {
            header("Location: yabancidiller.php?yabancıdillersil=basarisiz");
        }
    }





    #Yazılım Dili Dil Ekleme
    if(isset($_POST["yazilimdili-ekle"]))
    {                    
        
        //formun name'inden gelen değerleri değişkenlere aktarıyorum.
        $yazilimdiliyetenek_adi = $_POST["yazilimdiliyetenek_adi"];
        $yazilimdiliyetenek_yuzde = $_POST["yazilimdiliyetenek_yuzde"];


        if(!$yazilimdiliyetenek_adi || !$yazilimdiliyetenek_yuzde)
        {
            header("Location: yazilimdilleri.php?yazilimdiliekle=bos");
        }
        else
        {
            //veri ekleme yapmak için insert into yapıyoruz
            $sorgu = $db->prepare("INSERT INTO yazilimdili_yeteneklerim SET yazilimdiliyetenek_adi=?,yazilimdiliyetenek_yuzde=?");
            $insert = $sorgu->execute(array($yazilimdiliyetenek_adi,$yazilimdiliyetenek_yuzde));   
    
            //insert işlemi başarılı ise çalışır.
            if($insert)
            {
                header("Location: yazilimdilleri.php?yazilimdiliekle=basarili");
            }
            //insert işlemi başarısız ise çalışır.
            else
            {
                header("Location: yazilimdilleri.php?yazilimdiliekle=basarisiz");
            }
        }
  
    }
    
    #Yazılım Dili Düzenleme
if(isset($_POST["yazilimdili-duzenle"]))  
{

    #yazilimdiliyetenek_id olarak gönderdiğim get'i burada yakalıyorum.
    $yazilimdiliyetenek_id = $_GET["yazilimdiliyetenek_id"];


    $yazilimdiliyetenek_adi = $_POST["yazilimdiliyetenek_adi"];
    $yazilimdiliyetenek_yuzde = $_POST["yazilimdiliyetenek_yuzde"];

    #eğer bu kısımlar boş bırakıldıysa
    if(!$yazilimdiliyetenek_adi || !$yazilimdiliyetenek_yuzde)
    {
        //uyarı verdiriyoruz bunu aynı sayfada uyarı olarak yapacağız.
        //bunun için genelayarlar sayfasına bir get gönderiyorum.
        header("Location: yazilimdilleri.php?yazilimdiliduzenle=bos");
    }
    else
    {
        $sorgu = $db->prepare("UPDATE yazilimdili_yeteneklerim SET yazilimdiliyetenek_adi=?,yazilimdiliyetenek_yuzde=? WHERE yazilimdiliyetenek_id=? ");
        $update = $sorgu->execute(array($yazilimdiliyetenek_adi,$yazilimdiliyetenek_yuzde,$yazilimdiliyetenek_id));
              #güncellendiyse ekrana uyarı gelsin.
                if($update)
                {
                    header("Location: yazilimdilleri.php?yazilimdiliduzenle=basarili");
                }else{
                    header("Location: yazilimdilleri.php?yazilimdiliduzenle=basarisiz");
                }
    }
}

    #Yazılım Dili Sil

    $yazilimdilisil_id = $_GET["yazilimdilisil_id"];
    if(isset($yazilimdilisil_id))
    {
        //eğer sosyal beceri sil id varsa
        $sorgu = $db->prepare("DELETE FROM yazilimdili_yeteneklerim WHERE yazilimdiliyetenek_id=?");
        $yazilimsil = $sorgu->execute(array($yazilimdilisil_id));
        // eğer sil çalışıyorsa
        if($yazilimsil)
        {
            header("Location: yazilimdilleri.php?yazilimdilisil=basarili");
        }
        else
        {
            header("Location: yazilimdilleri.php?yazilimdilisil=basarisiz");
        }
    }




    #Paket Program Bilgisi Ekleme
    if(isset($_POST["paketprogram-ekle"]))
    {                    
        
        //formun name'inden gelen değerleri değişkenlere aktarıyorum.
        $paketprogrambilgisi_adi = $_POST["paketprogrambilgisi_adi"];
        $paketprogrambilgisi_yuzde = $_POST["paketprogrambilgisi_yuzde"];


        if(!$paketprogrambilgisi_adi || !$paketprogrambilgisi_yuzde)
        {
            header("Location: paketprogram.php?paketprogramekle=bos");
        }
        else
        {
            //veri ekleme yapmak için insert into yapıyoruz
            $sorgu = $db->prepare("INSERT INTO paketprogrambilgisi_yeteneklerim SET paketprogrambilgisi_adi=?,paketprogrambilgisi_yuzde=?");
            $insert = $sorgu->execute(array($paketprogrambilgisi_adi,$paketprogrambilgisi_yuzde));   
    
            //insert işlemi başarılı ise çalışır.
            if($insert)
            {
                header("Location: paketprogram.php?paketprogramekle=basarili");
            }
            //insert işlemi başarısız ise çalışır.
            else
            {
                header("Location: paketprogram.php?paketprogramekle=basarisiz");
            }
        }
  
    }
    
    #Paket Program Bilgisi Düzenleme
if(isset($_POST["paketprogram-duzenle"]))  
{

    #yazilimdiliyetenek_id olarak gönderdiğim get'i burada yakalıyorum.
    $paketprogrambilgisi_id = $_GET["paketprogrambilgisi_id"];


    $paketprogrambilgisi_adi = $_POST["paketprogrambilgisi_adi"];
    $paketprogrambilgisi_yuzde = $_POST["paketprogrambilgisi_yuzde"];

    #eğer bu kısımlar boş bırakıldıysa
    if(!$paketprogrambilgisi_adi || !$paketprogrambilgisi_yuzde)
    {
        //uyarı verdiriyoruz bunu aynı sayfada uyarı olarak yapacağız.
        //bunun için genelayarlar sayfasına bir get gönderiyorum.
        header("Location: paketprogram.php?paketprogramduzenle=bos");
    }
    else
    {
        $sorgu = $db->prepare("UPDATE paketprogrambilgisi_yeteneklerim SET paketprogrambilgisi_adi=?,paketprogrambilgisi_yuzde=? WHERE paketprogrambilgisi_id=? ");
        $update = $sorgu->execute(array($paketprogrambilgisi_adi,$paketprogrambilgisi_yuzde,$paketprogrambilgisi_id));
              #güncellendiyse ekrana uyarı gelsin.
                if($update)
                {
                    header("Location: paketprogram.php?paketprogramduzenle=basarili");
                }else{
                    header("Location: paketprogram.php?paketprogramduzenle=basarisiz");
                }
    }
}

    #Paket Program Bilgisi Sil

    $paketprogramsil_id = $_GET["paketprogramsil_id"];
    if(isset($paketprogramsil_id))
    {
        //eğer sosyal beceri sil id varsa
        $sorgu = $db->prepare("DELETE FROM paketprogrambilgisi_yeteneklerim WHERE paketprogrambilgisi_id=?");
        $programsil = $sorgu->execute(array($paketprogramsil_id));
        // eğer sil çalışıyorsa
        if($programsil)
        {
            header("Location: paketprogram.php?paketprogramsil=basarili");
        }
        else
        {
            header("Location: paketprogram.php?paketprogramsil=basarisiz");
        }
    }





    
 #İş Ekle
 if(isset($_POST["is-ekle"]))
 {                    
     

     $is_adi = $_POST["is_adi"];
     $is_link = $_POST["is_link"];
     $is_devam = $_POST["is_devam"];
     $is_aciklama = $_POST["is_aciklama"];


     if(!$is_adi || !$is_link || !$is_aciklama)
     {
         header("Location: islerim.php?isekle=bos");
     }
     else
     {
         //veri ekleme yapmak için insert into yapıyoruz
         $sorgu = $db->prepare("INSERT INTO islerim SET is_adi=?,is_link=?,is_aciklama=?,is_devam=?");
         $insert = $sorgu->execute(array($is_adi,$is_link,$is_aciklama,$is_devam));   
 
         //insert işlemi başarılı ise çalışır.
         if($insert)
         {
             header("Location: islerim.php?isekle=basarili");
         }
         //insert işlemi başarısız ise çalışır.
         else
         {
             header("Location: islerim.php?isekle=basarisiz");
         }
     }

 }




#İş Düzenleme
if(isset($_POST["is-duzenle"]))  
{

    $is_adi = $_POST["is_adi"];
    $is_link = $_POST["is_link"];
    $is_devam = $_POST["is_devam"];
    $is_aciklama = $_POST["is_aciklama"];


    #eğer bu kısımlar boş bırakıldıysa
    if(!$is_adi || !$is_link || !$is_aciklama)
    {
       
        header("Location: islerim.php?isduzenle=bos");
    }
    else
    {
        $sorgu = $db->prepare("UPDATE islerim SET is_adi=?,is_link=?,is_aciklama=?,is_devam=? WHERE is_id=? ");
        $update = $sorgu->execute(array($is_adi,$is_link,$is_aciklama,$is_devam,$is_id));
              #güncellendiyse ekrana uyarı gelsin.
                if($update)
                {
                    header("Location: islerim.php?isduzenle=basarili");
                }else{
                    header("Location: islerim.php?isduzenle=basarisiz");
                }
    }
}




   #İş Sil
   $issil_id = $_GET["issil_id"];
   if(isset($issil_id))
   {
       //eğer is sil id varsa
       $sorgu = $db->prepare("DELETE FROM islerim WHERE is_id=?");
       $issil = $sorgu->execute(array($sosyalbecerisil_id));
       // eğer sil çalışıyorsa
       if($issil)
       {
           header("Location: islerim.php?issil=basarili");
       }
       else
       {
           header("Location: islerim.php?issil=basarisiz");
       }
   }





#Sosyal Medya Güncelleme
if(isset($_POST["sosyalmedya"]))  
{

    #sosyal_id olarak gönderdiğim get'i burada yakalıyorum.
    $sosyal_id = $_GET["sosyal_id"];


    $sosyal_facebook = $_POST["sosyal_facebook"];
    $sosyal_instagram = $_POST["sosyal_instagram"];
    $sosyal_github = $_POST["sosyal_github"];        
    $sosyal_linkedin = $_POST["sosyal_linkedin"];
    $sosyal_reddit = $_POST["sosyal_reddit"];    
    $sosyal_twitter = $_POST["sosyal_twitter"];    
    $sosyal_pinterest = $_POST["sosyal_pinterest"];    
            

        $sorgu = $db->prepare("UPDATE sosyalmedya SET sosyal_facebook=?,sosyal_instagram=?,sosyal_github=?,sosyal_linkedin=?,sosyal_reddit=?,sosyal_twitter=?,sosyal_pinterest=? WHERE sosyal_id=? ");
        $update = $sorgu->execute(array($sosyal_facebook,$sosyal_instagram,$sosyal_github,$sosyal_linkedin,$sosyal_reddit,$sosyal_twitter,$sosyal_pinterest,$sosyal_id));

        #güncellendiyse ekrana uyarı gelsin.
    if($update)
    {
        header("Location: sosyalmedya.php?sosyalmedyaguncelle=basarili");
    }else{
        header("Location: sosyalmedya.php?sosyalmedyaguncelle=basarisiz");
    }
}



?>