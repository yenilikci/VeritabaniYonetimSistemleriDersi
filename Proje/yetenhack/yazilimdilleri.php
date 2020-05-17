<?php include 'yonetimpaneli_ustkisim.php'; ?>
<?php include 'yonetimpaneli_solmenu.php'; ?>
<?php error_reporting(0); ?>
<div class="col-lg-10">

        <!--Uyarı oluşturmak için.--> 
        <?php 
        #eğer islem.php 'deki kısımlar boş bırakıldıysa get ile bu sayfaya geri dönülür ve bosbirakti çalışır.
        if(($_GET["yazilimdiliekle"])=="bos")
        {
            ?> 
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
            <?php
        }
        elseif(($_GET["yazilimdiliekle"])=="basarili")
        {
          ?>
          <div class="col-lg-12 mt-4">
                 <div class="alert alert-success"><i class="fas fa-exclamation-circle mx-2"></i>İşleminiz başarıyla gerçekleştirildi.</div>
            </div>
          <?php
        }elseif(($_GET["yazilimdiliekle"])=="basarisiz")
        {
          ?>
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
          <?php
        }elseif($_GET["yazilimdiliduzenle"]=="bos")
        {
          ?>
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
          <?php
        }elseif($_GET["yazilimdiliduzenle"]=="basarili")
        {
          ?>
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-success"><i class="fas fa-exclamation-circle mx-2"></i>İşleminiz başarıyla gerçekleştirildi.</div>
            </div>
          <?php
        }elseif($_GET["yazilimdiliduzenle"]=="basarisiz")
        {
          ?>
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
          <?php
        }elseif($_GET["yazilimdilisil"]=="basarili")
        {
          ?>
                 <div class="col-lg-12 mt-4">
                 <div class="alert alert-success"><i class="fas fa-exclamation-circle mx-2"></i>İşleminiz başarıyla gerçekleştirildi.</div>
            </div>
          <?php
        }elseif($_GET["yazilimdilisil"]=="basarisiz")
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
                      <div class="card-header ustbilgi"><i class="fas fa-info-circle mx-2"></i>Yazılım Dilleri Yeteneklerim
                      <a href="yazilimdiliekle.php"><button class="btn btn-success float-right"><i class="fas fa-plus-circle mr-1"></i>Yazılım Dili Ekle</button></a>
                    </div>
                      <div class="card-body">
                        <h5 class="card-title text-warning">Yazılım Dilleri Yeteneklerim Bölümüne Hoşgeldiniz!
                          Buradan Yazılım Dili Yeteneklerim Bölümüyle Alakalı Alanları Düzenleyebilirsiniz.
                        </h5>

                        <table class="table text-white">
			              <thead>
			                <tr>
			                  <th>#</th>
			                  <th>Yazılım Dili Adı</th>
			                  <th>Dil Becerisi Yüzde</th>
			                  <th>İşlemler</th>
			                </tr>
			              </thead>
			              <tbody>

                    <!--Tabloları bir döngü ile yapacağım.-->
                        <?php
                              $sorgu = $db->prepare("SELECT *FROM yazilimdili_yeteneklerim ORDER BY yazilimdiliyetenek_id DESC");
                              $sorgu->execute();
                              $yazilimdilicek = $sorgu->fetchALL(PDO::FETCH_ASSOC);
                              $say = $sorgu->rowCount();

                              foreach($yazilimdilicek as $satir)
                              {
                                ?>

                                  <tr>
                                    <td><?php echo $satir["yazilimdiliyetenek_id"]; ?></td>
                                    <td><?php echo $satir["yazilimdiliyetenek_adi"]; ?></td>
                                    <td><?php echo $satir["yazilimdiliyetenek_yuzde"]; ?></td>
                                    <td>
                                      <a href="yazilimdiliduzenle.php?yazilimdiliyetenek_id=<?php echo $satir["yazilimdiliyetenek_id"];?>"><button class="btn btn-primary"><i class="fas fa-edit mr-1"></i>Düzenle</button></a>
                                      <!--Sileceğim becerilerin id'sini sil butonuna veriyorum.-->
                                      <a href="islem.php?yazilimdilisil_id=<?php echo $satir["yazilimdiliyetenek_id"];?>"><button class="btn btn-danger"><i class="fas fa-trash-alt mr-1"></i>Sil</button></a>

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