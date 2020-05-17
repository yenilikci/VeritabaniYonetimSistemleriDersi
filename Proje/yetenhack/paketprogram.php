<?php include 'yonetimpaneli_ustkisim.php'; ?>
<?php include 'yonetimpaneli_solmenu.php'; ?>
<?php error_reporting(0); ?>
<div class="col-lg-10">

        <!--Uyarı oluşturmak için.--> 
        <?php 
        #eğer islem.php 'deki kısımlar boş bırakıldıysa get ile bu sayfaya geri dönülür ve bosbirakti çalışır.
        if(($_GET["paketprogramekle"])=="bos")
        {
            ?> 
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
            <?php
        }
        elseif(($_GET["paketprogramekle"])=="basarili")
        {
          ?>
          <div class="col-lg-12 mt-4">
                 <div class="alert alert-success"><i class="fas fa-exclamation-circle mx-2"></i>İşleminiz başarıyla gerçekleştirildi.</div>
            </div>
          <?php
        }elseif(($_GET["paketprogramekle"])=="basarisiz")
        {
          ?>
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
          <?php
        }elseif($_GET["paketprogramduzenle"]=="bos")
        {
          ?>
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
          <?php
        }elseif($_GET["paketprogramduzenle"]=="basarili")
        {
          ?>
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-success"><i class="fas fa-exclamation-circle mx-2"></i>İşleminiz başarıyla gerçekleştirildi.</div>
            </div>
          <?php
        }elseif($_GET["paketprogramduzenle"]=="basarisiz")
        {
          ?>
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
          <?php
        }elseif($_GET["paketprogramsil"]=="basarili")
        {
          ?>
                 <div class="col-lg-12 mt-4">
                 <div class="alert alert-success"><i class="fas fa-exclamation-circle mx-2"></i>İşleminiz başarıyla gerçekleştirildi.</div>
            </div>
          <?php
        }elseif($_GET["paketprogramsil"]=="basarisiz")
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
                      <div class="card-header ustbilgi"><i class="fas fa-info-circle mx-2"></i>Paket Program Bilgilerim
                      <a href="paketprogramekle.php"><button class="btn btn-success float-right"><i class="fas fa-plus-circle mr-1"></i>Paket Program Bilgisi Ekle</button></a>
                    </div>
                      <div class="card-body">
                        <h5 class="card-title text-warning">Paket Program Bilgisi Bölümüne Hoşgeldiniz!
                          Buradan Paket Program Bilgisi Bölümüyle Alakalı Alanları Düzenleyebilirsiniz.
                        </h5>

                        <table class="table text-white">
			              <thead>
			                <tr>
			                  <th>#</th>
			                  <th>Program Adı</th>
			                  <th>Program Hakimiyet Yüzde</th>
			                  <th>İşlemler</th>
			                </tr>
			              </thead>
			              <tbody>

                    <!--Tabloları bir döngü ile yapacağım.-->
                        <?php
                              $sorgu = $db->prepare("SELECT *FROM paketprogrambilgisi_yeteneklerim ORDER BY paketprogrambilgisi_id DESC");
                              $sorgu->execute();
                              $paketprogramcek = $sorgu->fetchALL(PDO::FETCH_ASSOC);
                              $say = $sorgu->rowCount();

                              foreach($paketprogramcek as $satir)
                              {
                                ?>

                                  <tr>
                                    <td><?php echo $satir["paketprogrambilgisi_id"]; ?></td>
                                    <td><?php echo $satir["paketprogrambilgisi_adi"]; ?></td>
                                    <td><?php echo $satir["paketprogrambilgisi_yuzde"]; ?></td>
                                    <td>
                                      <a href="paketprogramduzenle.php?paketprogrambilgisi_id=<?php echo $satir["paketprogrambilgisi_id"];?>"><button class="btn btn-primary"><i class="fas fa-edit mr-1"></i>Düzenle</button></a>
                                      <!--Sileceğim becerilerin id'sini sil butonuna veriyorum.-->
                                      <a href="islem.php?paketprogramsil_id=<?php echo $satir["paketprogrambilgisi_id"];?>"><button class="btn btn-danger"><i class="fas fa-trash-alt mr-1"></i>Sil</button></a>

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