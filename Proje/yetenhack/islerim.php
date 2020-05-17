<?php include 'yonetimpaneli_ustkisim.php'; ?>
<?php include 'yonetimpaneli_solmenu.php'; ?>
<?php error_reporting(0); ?>
<div class="col-lg-10">

        <!--Uyarı oluşturmak için.--> 
        <?php 
        #eğer islem.php 'deki kısımlar boş bırakıldıysa get ile bu sayfaya geri dönülür ve bosbirakti çalışır.
        if(($_GET["isekle"])=="bos")
        {
            ?> 
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
            <?php
        }
        elseif(($_GET["isekle"])=="basarili")
        {
          ?>
          <div class="col-lg-12 mt-4">
                 <div class="alert alert-success"><i class="fas fa-exclamation-circle mx-2"></i>İşleminiz başarıyla gerçekleştirildi.</div>
            </div>
          <?php
        }elseif(($_GET["isekle"])=="basarisiz")
        {
          ?>
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
          <?php
        }elseif($_GET["isduzenle"]=="bos")
        {
          ?>
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
          <?php
        }elseif($_GET["isduzenle"]=="basarili")
        {
          ?>
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-success"><i class="fas fa-exclamation-circle mx-2"></i>İşleminiz başarıyla gerçekleştirildi.</div>
            </div>
          <?php
        }elseif($_GET["isduzenle"]=="basarisiz")
        {
          ?>
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
          <?php
        }elseif($_GET["issil"]=="basarili")
        {
          ?>
                 <div class="col-lg-12 mt-4">
                 <div class="alert alert-success"><i class="fas fa-exclamation-circle mx-2"></i>İşleminiz başarıyla gerçekleştirildi.</div>
            </div>
          <?php
        }elseif($_GET["issil"]=="basarisiz")
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
                      <div class="card-header ustbilgi"><i class="fas fa-info-circle mx-2"></i>İşlerim
                      <a href="isekle.php"><button class="btn btn-success float-right"><i class="fas fa-plus-circle mr-1"></i>İş Ekle</button></a>
                    </div>
                      <div class="card-body">
                        <h5 class="card-title text-warning">İşlerim Bölümüne Hoşgeldiniz!
                          Buradan İşlerim Bölümüyle Alakalı Alanları Düzenleyebilirsiniz.
                        </h5>

                        <table class="table text-white">
			              <thead>
			                <tr>
			                  <th>#</th>
			                  <th>İş Adı</th>
                        <th>İş Link</th>
                        <th>İş Devam</th>
			                  <th>İşlemler</th>
			                </tr>
			              </thead>
			              <tbody>

                    <!--Tabloları bir döngü ile yapacağım.-->
                        <?php
                              $sorgu = $db->prepare("SELECT *FROM islerim ORDER BY is_id DESC");
                              $sorgu->execute();
                              $islerimcek = $sorgu->fetchALL(PDO::FETCH_ASSOC);
                              $say = $sorgu->rowCount();

                              foreach($islerimcek as $satir)
                              {
                                ?>

                                  <tr>
                                    <td><?php echo $satir["is_id"]; ?></td>
                                    <td><?php echo $satir["is_adi"]; ?></td>
                                    <td><?php echo $satir["is_link"]; ?></td>
                                    <td>
                                      <?php 
                                      //eğer kişi hala çalışıyorsa
                                          if($satir["is_devam"]==1)
                                            {
                                              ?>
                                                  <span><i class="fas fa-thumbs-up"></i></span>
                                              <?php
                                            }else    //çalışmıyorsa
                                            {
                                              ?>
                                              <span><i class="fas fa-thumbs-down"></i></span>
                                              <?php
                                            }
                                      ?>
                                    </td>
                                    <td>
                                      <a href="isduzenle.php?is_id=<?php echo $satir["is_id"];?>"><button class="btn btn-primary"><i class="fas fa-edit mr-1"></i>Düzenle</button></a>
                                      <!--Sileceğim becerilerin id'sini sil butonuna veriyorum.-->
                                      <a href="islem.php?issil_id=<?php echo $satir["is_id"];?>"><button class="btn btn-danger"><i class="fas fa-trash-alt mr-1"></i>Sil</button></a>

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