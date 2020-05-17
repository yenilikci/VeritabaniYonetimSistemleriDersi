
<body style="background-color: #131111;">
    <!--Yüklenme Efekti İçin-->
    <div id="preloader">
        <p class="mt-5">Profil Sayfası</p> 
		<div id="status">&nbsp;</div>
	</div>
    <!--Sitemizin üst kısmını tam ekran bir container div'ine yerleştirdik.-->
    <div class="container-fluid arkaplan">

        <p class="text-center baslik p-3 altcerceve">
            <i class="fas fa-hat-wizard logo fa-spin"></i>
            <span class="y fas fa-spin">y</span>
            <span class="e fas fa-spin">e</span>
            <span class="t fas fa-spin">t</span>
            <span class="e fas fa-spin">e</span>
            <span class="n fas fa-spin">n</span>
            <span class="h fas fa-spin">h</span>
            <span class="a fas fa-spin">a</span>
            <span class="c fas fa-spin">c</span>
            <span class="k fas fa-spin">k</span>
            <span class="dot fas fa-spin">.</span>
        </p>
    </div>

<!--Veritabanımdaki bilgilerim tablosundan veri çekme işlemi.-->
<?php
//bilgilerim değişkeni ile veritabanına bağlandım ve bilgilerim tablosunu seçtim.
$bilgilerim = $db->prepare("SELECT *FROM bilgilerim");
//veri çekiceğimi belirttim.
$bilgilerim->execute();
 //veriyi tek tek seçeceğimi fetch yazarak belirtiyorum.
$bilgicek = $bilgilerim->fetch(PDO::FETCH_ASSOC);
?>


    <!--Sitenin ana içerik kısmı-->
    <div class="container-fluid">
        <div class="row">
            <!--Site ana içeriğinin sol kısmı.-->
            <div class="col-lg-3 mt-4">
                <!--Profil için card tanımı.-->
                <div class="card golge" style="border: none;">
                    <!--Profil Resmi İçin veritabanımdan fotoğraf verisini alıyorum.-->
                    <img src="<?php echo $bilgicek["bilgi_fotograf"]; ?>" alt="..." class="img-thumbnail">
                    <!--İsim bilgisi için veritabanımdan isim verisini alıyorum-->
                    <h3 class="text-center mt-2"><i class="fas fa-user-graduate"></i>
                        <?php echo $bilgicek["bilgi_isim"]; ?></h3>
                 <!--Hakkında bilgisi için veritabanımdan hakkında verisini alıyorum-->
                    <p class="text-center p-2 kisibilgisi">
                        <?php echo $bilgicek["bilgi_hakkinda"];?>
                    </p>

                <!--Telefon bilgisi için veritabanımdan telefon verisini alıyorum-->
                    <div class="card-body telefon">
                        <i class="fas fa-phone-alt float-left mt-2 text-white"></i>
                <?php echo $bilgicek["bilgi_telefon"]; ?>
                    </div>
            <!--İkametgah bilgisi için veritabanımdan ikametgah verisini alıyorum-->
                    <div class="card-body ikametgah">
                        <i class="fas fa-home float-left mt-2 text-white"></i>
                        <?php echo $bilgicek["bilgi_ikamet"] ?>
                    </div>
                <!--Mail bilgisi için veritabanımdan mail verisini alıyorum-->
                    <div class="card-body mail">
                        <i class="fas fa-envelope float-left mt-2 text-white"></i>
                <?php echo $bilgicek["bilgi_mail"] ?>
                    </div>
                </div>

                <div class="card mt-3 p-2 yabancidil">
                    <h3 class="text-center"><i class="fas fa-language"></i> Yabancı Diller</h3>
            <!--Yabancı Diller Yeteneklerim için sorgularımı çekiyorum.-->
            <?php
                $yabancidilleryetenek = $db->prepare("SELECT *FROM yabancidil_yeteneklerim");
                $yabancidilleryetenek->execute();
                $yabancidilleryetenekcek = $yabancidilleryetenek->fetchALL(PDO::FETCH_ASSOC);
                //Sosyal Beceriler Yetenek Verilerini Foreach ile döngüye alıp veritabanında kaç tane veri varsa hepsini buraya çekecek.
                foreach($yabancidilleryetenekcek as $satir)
                {
                ?>
                    <p class="card-text text-center"><?php echo $satir["yabancidil_isim"]; ?></p>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated yabancidilcubuk" role="progressbar"
                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $satir["yabancidil_yuzde"]; ?>%"><?php echo $satir["yabancidil_yuzde"];?></div>
                    </div>
                <?php
                }
                ?>
                </div>

                <div class="card mt-3 sosyal">
                    <div class="card-body">
                        <h3 class="text-center mb-3">Sosyal Medya</h3>
                        <!--Sosyal Medya Hesap Linklerini Veritabanımdan Buraya Çekiyorum.-->
                        <?php 
                        $sosyalmedya = $db->prepare("SELECT *FROM sosyalmedya");
                        //sosyalmedya değişkeni ile veritabanına bağlandım ve sosyalmedya tablosunu seçtim.
                        $sosyalmedya->execute(); //veri çekiceğimi belirttim.
                        $sosyalmedyacek = $sosyalmedya->fetch(PDO::FETCH_ASSOC); //veriyi tek tek seçeceğimi fetch yazarak belirtiyorum.
                        ?>

                        <!--Kullanıcın eğer sosyal medya hesabı yoksa gözükmez varsa gözükür-->
                        <?php
                            if($sosyalmedyacek["sosyal_facebook"]=="")
                            {
                                null;
                            }
                            else{
                                ?>
                        <p class="card-text "><a href="<?php echo $sosyalmedyacek["sosyal_facebook"]; ?>" class="facebook"><i class="fab fa-facebook"></i> Facebook</a>
                        </p>
                                <?php
                            }
                        ?>


                        <?php
                            if($sosyalmedyacek["sosyal_instagram"]=="")
                            {
                                null;
                            }
                            else{
                                ?>
                   <p class="card-text"><a href="<?php echo $sosyalmedyacek["sosyal_instagram"]; ?>" class="instagram"><i class="fab fa-instagram"></i> Instagram</a>
                        </p>
                                <?php
                            }
                        ?>

                        
                        <?php
                            if($sosyalmedyacek["sosyal_github"]=="")
                            {
                                null;
                            }
                            else{
                                ?>
                     <p class="card-text"><a href="<?php echo $sosyalmedyacek["sosyal_github"]; ?>" class="github"><i class="fab fa-github"></i> Github</a></p>

                                <?php
                            }
                        ?>


                        <?php
                            if($sosyalmedyacek["sosyal_linkedin"]=="")
                            {
                                null;
                            }
                            else{
                                ?>
                        <p class="card-text"><a href="<?php echo $sosyalmedyacek["sosyal_linkedin"]; ?>" class="linkedin"><i class="fab fa-linkedin"></i> LinkedIn</a>
                        </p>
                                <?php
                            }
                        ?>

                      
                        <?php
                            if($sosyalmedyacek["sosyal_reddit"]=="")
                            {
                                null;
                            }
                            else{
                                ?>
                        <p class="card-text"><a href="<?php echo $sosyalmedyacek["sosyal_reddit"]; ?>" class="reddit"><i class="fab fa-reddit"></i> Reddit</a>
                        </p>
                                <?php
                            }
                        ?>


       
                        <?php
                            if($sosyalmedyacek["sosyal_twitter"]=="")
                            {
                                null;
                            }
                            else{
                                ?>
                        <p class="card-text"><a href="<?php echo $sosyalmedyacek["sosyal_twitter"]; ?>" class="twitter"><i class="fab fa-twitter"></i> Twitter</a>
                        </p>
                                <?php
                            }
                        ?>



                        <?php
                            if($sosyalmedyacek["sosyal_pinterest"]=="")
                            {
                                null;
                            }
                            else{
                                ?>
                        <p class="card-text"><a href="<?php echo $sosyalmedyacek["sosyal_pinterest"]; ?>" class="pinterest"><i class="fab fa-pinterest"></i> Pinterest</a>
                        </p>
                                <?php
                            }
                        ?>


                    </div>
                </div>


                <div class="card mt-2">
                <p class="text-center p-3 rozetler"><i class="fas fa-certificate mx-2"></i>Rozetler</p>
                <?php 
                        $rozetler = $db->prepare("SELECT *FROM rozetler");
                        //rozetler değişkeni ile veritabanına bağlandım ve rozetler tablosunu seçtim.
                        $rozetler->execute(); //veri çekiceğimi belirttim.
                        $rozetcek = $rozetler->fetch(PDO::FETCH_ASSOC); //veriyi tek tek seçeceğimi fetch yazarak belirtiyorum.
                
                        $sosyalsorgu = $db->prepare("SELECT *FROM sosyalmedya");
                        $sosyalsorgu->execute();
                        $sosyalsorgu->fetch(PDO::FETCH_ASSOC);
                        $sosyalsorgusay = $sosyalsorgu->columnCount();


                        
                        $yazilimsorgu = $db->prepare("SELECT *FROM yazilimdili_yeteneklerim");
                        $yazilimsorgu->execute();
                        $yazilimsorgu->fetch(PDO::FETCH_ASSOC);
                        $yazilimsorgucek = $yazilimsorgu->rowCount();
                ?>
                  <!--Kullanıcın eğer sosyal medya hesabı 5 üstü ise sosyal rozeti çıkar.-->
                  <?php
                            if($sosyalsorgusay>5)
                            {
                                ?>
                                <span class="text-center rozettipi"><i class="fas fa-star"></i></span>
                                <p class="p-4"><?php echo $rozetcek["rozet_aciklama"];?></p>
                                <?php
                            }
                            else{
                                ?>
                   
                                <?php
                            }
                        ?>

                </div>

            </div>