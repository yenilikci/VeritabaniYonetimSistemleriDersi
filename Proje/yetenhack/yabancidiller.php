<?php include 'yonetimpaneli_ustkisim.php'; ?>
<?php include 'yonetimpaneli_solmenu.php'; ?>
<?php error_reporting(0); ?>
<div class="col-lg-10">

        <!--Uyarı oluşturmak için.--> 
        <?php 
        #eğer islem.php 'deki kısımlar boş bırakıldıysa get ile bu sayfaya geri dönülür ve bosbirakti çalışır.
        if(($_GET["yabancidillerekle"])=="bos")
        {
            ?> 
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
            <?php
        }
        elseif(($_GET["yabancidillerekle"])=="basarili")
        {
          ?>
          <div class="col-lg-12 mt-4">
                 <div class="alert alert-success"><i class="fas fa-exclamation-circle mx-2"></i>İşleminiz başarıyla gerçekleştirildi.</div>
            </div>
          <?php
        }elseif(($_GET["yabancidillerekle"])=="basarisiz")
        {
          ?>
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
          <?php
        }elseif($_GET["yabancidillerduzenle"]=="bos")
        {
          ?>
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
          <?php
        }elseif($_GET["yabancidillerduzenle"]=="basarili")
        {
          ?>
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-success"><i class="fas fa-exclamation-circle mx-2"></i>İşleminiz başarıyla gerçekleştirildi.</div>
            </div>
          <?php
        }elseif($_GET["yabancidillerduzenle"]=="basarisiz")
        {
          ?>
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
          <?php
        }elseif($_GET["yabancidillersil"]=="basarili")
        {
          ?>
                 <div class="col-lg-12 mt-4">
                 <div class="alert alert-success"><i class="fas fa-exclamation-circle mx-2"></i>İşleminiz başarıyla gerçekleştirildi.</div>
            </div>
          <?php
        }elseif($_GET["yabancidillersil"]=="basarisiz")
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
                      <div class="card-header ustbilgi"><i class="fas fa-language mx-2"></i>Yabancı Diller
                      <a href="yabancidilekle.php"><button class="btn btn-success float-right"><i class="fas fa-plus-circle mr-1"></i>Yabancı Dil Ekle</button></a>
                    </div>
                      <div class="card-body">
                        <h5 class="card-title text-warning">Yabancı Diller Bölümüne Hoşgeldiniz!
                          Buradan Yabancı Diller Bölümüyle Alakalı Alanları Düzenleyebilirsiniz.
                        </h5>

                        <table class="table text-white">
			              <thead>
			                <tr>
			                  <th>#</th>
			                  <th>Yabancı Dil Adı</th>
			                  <th>Yabancı Dil Yüzde</th>
			                  <th>İşlemler</th>
			                </tr>
			              </thead>
			              <tbody>

                    <!--Tabloları bir döngü ile yapacağım.-->
                        <?php
                              $sorgu = $db->prepare("SELECT *FROM yabancidil_yeteneklerim ORDER BY yabancidil_id DESC");
                              $sorgu->execute();
                              $yabancidilcek = $sorgu->fetchALL(PDO::FETCH_ASSOC);
                              $say = $sorgu->rowCount();

                              foreach($yabancidilcek as $satir)
                              {
                                ?>

                                  <tr>
                                    <td><?php echo $satir["yabancidil_id"]; ?></td>
                                    <td><?php echo $satir["yabancidil_isim"]; ?></td>
                                    <td><?php echo $satir["yabancidil_yuzde"]; ?></td>
                                    <td>
                                      <a href="yabancidilduzenle.php?yabancidil_id=<?php echo $satir["yabancidil_id"];?>"><button class="btn btn-primary"><i class="fas fa-edit mr-1"></i>Düzenle</button></a>
                                      <!--Sileceğim becerilerin id'sini sil butonuna veriyorum.-->
                                      <a href="islem.php?yabancidilsil_id=<?php echo $satir["yabancidil_id"];?>"><button class="btn btn-danger"><i class="fas fa-trash-alt mr-1"></i>Sil</button></a>

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