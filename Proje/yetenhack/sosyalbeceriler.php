<?php include 'yonetimpaneli_ustkisim.php'; ?>
<?php include 'yonetimpaneli_solmenu.php'; ?>
<?php error_reporting(0); ?>
<div class="col-lg-10">

        <!--Uyarı oluşturmak için.--> 
        <?php 
        #eğer islem.php 'deki kısımlar boş bırakıldıysa get ile bu sayfaya geri dönülür ve bosbirakti çalışır.
        if(($_GET["sosyalbecerilerekle"])=="bos")
        {
            ?> 
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
            <?php
        }
        elseif(($_GET["sosyalbecerilerekle"])=="basarili")
        {
          ?>
          <div class="col-lg-12 mt-4">
                 <div class="alert alert-success"><i class="fas fa-exclamation-circle mx-2"></i>İşleminiz başarıyla gerçekleştirildi.</div>
            </div>
          <?php
        }elseif(($_GET["sosyalbecerilerekle"])=="basarisiz")
        {
          ?>
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
          <?php
        }elseif($_GET["sosyalbecerilerduzenle"]=="bos")
        {
          ?>
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
          <?php
        }elseif($_GET["sosyalbecerilerduzenle"]=="basarili")
        {
          ?>
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-success"><i class="fas fa-exclamation-circle mx-2"></i>İşleminiz başarıyla gerçekleştirildi.</div>
            </div>
          <?php
        }elseif($_GET["sosyalbecerilerduzenle"]=="basarisiz")
        {
          ?>
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
          <?php
        }elseif($_GET["sosyalbecerisil"]=="basarili")
        {
          ?>
                 <div class="col-lg-12 mt-4">
                 <div class="alert alert-success"><i class="fas fa-exclamation-circle mx-2"></i>İşleminiz başarıyla gerçekleştirildi.</div>
            </div>
          <?php
        }elseif($_GET["sosyalbecerisil"]=="basarisiz")
        {
          ?>
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div> 
          <?php
        }
        ?>
        <!--Uyarı son.--> 
        
 
                    <div class="card bg-dark text-white mb-3 mt-3 icerik">
                      <div class="card-header ustbilgi"><i class="fas fa-info-circle mx-2"></i>Sosyal Becerilerim
                      <a href="sosyalbeceriekle.php"><button class="btn btn-success float-right"><i class="fas fa-plus-circle mr-1"></i>Beceri Ekle</button></a>
                    </div>
                      <div class="card-body">
                        <h5 class="card-title text-warning">Sosyal Beceriler Bölümüne Hoşgeldiniz!
                          Buradan Sosyal Beceriler Bölümüyle Alakalı Alanları Düzenleyebilirsiniz.
                        </h5>

                        <table class="table text-white">
			              <thead>
			                <tr>
			                  <th>#</th>
			                  <th>Beceri Adı</th>
			                  <th>Beceri Yüzde</th>
			                  <th>İşlemler</th>
			                </tr>
			              </thead>
			              <tbody>

                    <!--Tabloları bir döngü ile yapacağım.-->
                        <?php
                              $sorgu = $db->prepare("SELECT *FROM sosyalbeceri_yeteneklerim ORDER BY sosyalbeceri_id DESC");
                              $sorgu->execute();
                              $sosyalyetenekcek = $sorgu->fetchALL(PDO::FETCH_ASSOC);
                              $say = $sorgu->rowCount();

                              foreach($sosyalyetenekcek as $satir)
                              {
                                ?>

                                  <tr>
                                    <td><?php echo $satir["sosyalbeceri_id"]; ?></td>
                                    <td><?php echo $satir["sosyalbeceri_adi"]; ?></td>
                                    <td><?php echo $satir["sosyalbeceri_yuzde"]; ?></td>
                                    <td>
                                      <a href="sosyalbeceriduzenle.php?sosyalbeceri_id=<?php echo $satir["sosyalbeceri_id"];?>"><button class="btn btn-primary"><i class="fas fa-edit mr-1"></i>Düzenle</button></a>
                                      <!--Sileceğim becerilerin id'sini sil butonuna veriyorum.-->
                                      <a href="islem.php?sosyalbecerisil_id=<?php echo $satir["sosyalbeceri_id"];?>"><button class="btn btn-danger"><i class="fas fa-trash-alt mr-1"></i>Sil</button></a>

                                    </td>
                                  </tr>
                      
                                <?php
                              }
                        ?>
			          

			              </tbody>
			            </table>
                        
                    
                      </div>
                    </div>
                  </div>
                </div>
              </div>

<?php include 'yonetimpaneli_altkisim.php' ?>