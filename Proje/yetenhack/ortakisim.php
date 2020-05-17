    <!--Site ana içeriği orta kısmı-->
    <div class="col-lg-6 mt-4">
        <div class="egitim p-3 text-center"><i class="fas fa-university mx-2"></i>EĞİTİM</div>
        <div class="card cardgolge">
        <?php 
        $okullarim = $db->prepare("SELECT *FROM okullarim ORDER BY okul_id DESC"); //sondan başa sıralama
        $okullarim->execute();
        $okullarimicek = $okullarim->fetchALL(PDO::FETCH_ASSOC);
        foreach($okullarimicek as $satir){
            if($satir["okul_devam"]==1) 
            {
                ?>
                <div class="container mt-2">
                <h4 class="text-center"><?php echo $satir["okul_adi"]; ?></h4>
                <h5 class="text-dark"><?php echo $satir["okul_tarihi"]; ?>                   
                 <span class="badge badge-secondary">Hala devam ediyor</span></h5>
                <p><?php echo $satir["okul_aciklama"]; ?></p>
                </div>
                <?php
            }else 
            {
                ?>
                <div class="container mt-2">
                <h4 class="text-center"><?php echo $satir["okul_adi"]; ?></h4>
                <h5 class="text-dark"><?php echo $satir["okul_tarihi"]; ?></h5>
                <p><?php echo $satir["okul_aciklama"]; ?></p>
                </div>
                <?php
            }
        }
        ?>
        
    

            <div>

                <div class="is p-3 text-center"><i class="fas fa-briefcase mx-2">
                    </i>İŞ TECRÜBELERİ</div>

            <!--Veritabanımdan işlerim verilerini toplu olarak çekiyorum.-->
            <?php 
            $islerim = $db->prepare("SELECT *FROM islerim ORDER BY is_id DESC"); //son id'ye sahip olan en başa gelecek bu sayede.
            $islerim->execute();
            $islerimcek = $islerim->fetchALL(PDO::FETCH_ASSOC);

            foreach($islerimcek as $satir){
                //Eğer is_devam değeri 1'e eşitse iş tarihinin yanında "Hala devam ediyor" yazması için.
                if($satir["is_devam"]== 1){
                    ?>
                    <div class="container mt-2">
                    <h4 class="text-center"><?php echo $satir["is_adi"];?></h4>
                    <p class="text-dark"><?php echo $satir["is_link"]; ?></p>
                    <h5 class="text-dark"><?php echo $satir["is_tarih"];?>
                    <span class="badge badge-secondary">Hala devam ediyor</span></h5>
                    <p><?php echo $satir["is_aciklama"];?></p>
                    </div>
                    <?php
                }
                else{
                ?>  
                    <div class="container mt-2">
                    <h4 class="text-center"><?php echo $satir["is_adi"];?></h4>
                    <p class="text-dark"><?php echo $satir["is_link"]; ?></p>
                    <h5 class="text-dark"><?php echo $satir["is_tarih"];?></h5>
                    <p><?php echo $satir["is_aciklama"];?></p>
                </div>
                <?php
                }
            }
            ?>

                <div class="projelerim p-3 text-center"><i class="fas fa-project-diagram mx-2"></i>PROJELERİM</div>
                <?php
                $projelerim = $db->prepare("SELECT *FROM projelerim ORDER BY proje_id DESC");
                $projelerim->execute();
                $projelerimicek = $projelerim->fetchALL(PDO::FETCH_ASSOC);
                foreach($projelerimicek as $satir){
                    ?>
                    <div class="container mt-2">
                    <h4 class="text-center"><?php echo $satir["proje_adi"]; ?></h4>
                    <p class="text-dark"><?php echo $satir["proje_link"]; ?></p>
                    <h5 class="text-dark"><?php echo $satir["proje_tarih"];?></h5>
                    <p><?php echo $satir["proje_aciklama"]; ?></p>
                </div>

                <?php
                }
               ?>
            </div>
        </div>
    </div>