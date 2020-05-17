     <!--Sağ kısım-->
     <div class="col-lg-3 mt-3">
                <div class="card yazilimdili p-2">
                    <h3 class="text-center"><i class="fas fa-desktop"></i> Yazılım Dili Yetenek</h3>
                    <!--Yazılım Dili Yeteneklerim İçin Sorgularımı Çekiyorum -->
                    <?php
                        $yazilimdiliyeteneklerim = $db->prepare("SELECT *FROM yazilimdili_yeteneklerim");
                        $yazilimdiliyeteneklerim->execute();
                        //Verileri döngüye alıp tüm verileri çekeceğim için fetchALL yapısı kullanıyorum.
                        $yazilimdiliyetenekcek = $yazilimdiliyeteneklerim->fetchALL(PDO::FETCH_ASSOC);
                   
//Yazılım Dili Yetenek Verilerini Foreach ile döngüye alıp veritabanında kaç tane veri varsa hepsini buraya çekecek
                   foreach($yazilimdiliyetenekcek as $satir){
                    ?>
                    <p class="card-text text-center"><?php echo $satir["yazilimdiliyetenek_adi"];?></p>
                    <div class="progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated cubuk" role="progressbar"
                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $satir["yazilimdiliyetenek_yuzde"]; ?>%"><?php echo $satir["yazilimdiliyetenek_yuzde"]; ?></div>
                    </div>
                <?php
                   }
                   ?>

                </div>


                <div class="card paketprogram p-2 mt-5">
                <h3 class="text-center"><i class="far fa-file-word"></i> Paket Program Bilgisi</h3>
                   <!--Paket Program Bilgisi Yeteneklerim İçin Sorgularımı Çekiyorum-->
                   <?php
                        $paketprogrambilgisiyetenek = $db->prepare("SELECT *FROM paketprogrambilgisi_yeteneklerim");
                        $paketprogrambilgisiyetenek->execute();
                        $paketprogrambilgisiyetenekcek = $paketprogrambilgisiyetenek->fetchALL(PDO::FETCH_ASSOC);
                   //Paket Program Bilgisi Yetenek Verilerini Foreach ile döngüye alıp veritabanında kaç tane veri varsa hepsini buraya çekecek.
                foreach($paketprogrambilgisiyetenekcek as $satir){
                    ?>
                    <p class="card-text text-center"><?php echo $satir["paketprogrambilgisi_adi"];?></p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated cubuk2" role="progressbar"
                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $satir["paketprogrambilgisi_yuzde"]; ?>%"><?php echo $satir["paketprogrambilgisi_yuzde"]; ?></div>
                </div>
                <?php
                }
                  ?>
                </div>


 <div class="card sosyalbeceriler p-2 mt-5">
                <h3 class="text-center"><i class="fas fa-users"></i> Sosyal Beceriler</h3>
                <!-- Sosyal Beceriler Yeteneklerim İçin Sorgularımı Çekiyorum-->
                <?php
                $sosyalbeceriyetenek = $db->prepare("SELECT *FROM sosyalbeceri_yeteneklerim");
                $sosyalbeceriyetenek->execute();
                $sosyalbeceriyetenekcek = $sosyalbeceriyetenek->fetchALL(PDO::FETCH_ASSOC);
                //Sosyal Beceriler Yetenek Verilerini Foreach ile döngüye alıp veritabanında kaç tane veri varsa hepsini buraya çekecek.
                foreach($sosyalbeceriyetenekcek as $satir)
                {
                ?>
                <p class="card-text text-center"><?php echo $satir["sosyalbeceri_adi"];?></p>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated cubuk3" role="progressbar"
                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $satir["sosyalbeceri_yuzde"]; ?>%"><?php echo $satir["sosyalbeceri_yuzde"]; ?></div>
                </div>
                <?php
                }
                ?>
                </div>
            </div>
        </div>
    </div>