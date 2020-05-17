<?php include 'yonetimpaneli_ustkisim.php'; ?>
<?php include 'yonetimpaneli_solmenu.php'; ?>
<?php error_reporting(0); ?>
<div class="col-lg-10">


       <!--Uyarı oluşturmak için.--> 
       <?php 
        #eğer islem.php 'deki kısımlar boş bırakıldıysa get ile bu sayfaya geri dönülür ve bosbirakti çalışır.
        if(($_GET["yabancidillerduzenle"])=="bos")
        {
            ?> 
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
            <?php
        }
        elseif(($_GET["yabancidillerduzenle"])=="basarili")
        {
          ?>
          <div class="col-lg-12 mt-4">
                 <div class="alert alert-success"><i class="fas fa-exclamation-circle mx-2"></i>İşleminiz başarıyla gerçekleştirildi.</div>
            </div>
          <?php
        }elseif(($_GET["yabancidillerduzenle"])=="basarisiz")
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
                      <div class="card-header ustbilgi"><i class="fas fa-cog mx-2"></i>Yabancı Dil Ekle</div>
                      <div class="card-body">
                        <h5 class="card-title text-warning">Yabanci Dil Ekle Bölümüne Hoş Geldiniz!
                          Buradan Yabancı Dillerinizi Ekleyebilirsiniz.
                        </h5>

                        <form class="form-horizontal" role="form" action="islem.php" method="POST">

										  <div class="form-group">
										    <label for="inputEmail3" class="col-sm-2 control-label">Yabancı Dil Adı</label>
										    <div class="col-sm-12">
										      <input name="yabancidil_isim" type="text" class="form-control" placeholder="Yabancı Dilin Adını Giriniz">
										    </div>
                      </div>
                      
                      <div class="form-group">
										    <label for="inputEmail3" class="col-sm-2 control-label">Hakim Olma Yüzdesi (%)</label>
										    <div class="col-sm-12">
										      <input name="yabancidil_yuzde" type="text" class="form-control" placeholder="Yabancı Dile Hakim Olma Yüzdesini Giriniz">
										    </div>
                      </div>


             
                      <div class="col-md-4">
                        <button name="dil-ekle" class="btn btn-success pull-right">Ekle</button>
                      </div>
										
										</  >
                    
                      </div>
                    </div>
                  </div>
                </div>
              </div>

<?php include 'yonetimpaneli_altkisim.php' ?>