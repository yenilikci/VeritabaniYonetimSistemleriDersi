<?php include 'yonetimpaneli_ustkisim.php'; ?>
<?php include 'yonetimpaneli_solmenu.php'; ?>
<?php error_reporting(0); ?>
<div class="col-lg-10">


        <!--Uyarı oluşturmak için.--> 
        <?php 
        #eğer islem.php 'deki kısımlar boş bırakıldıysa get ile bu sayfaya geri dönülür ve bosbirakti çalışır.
        if(($_GET["ayarguncelle"])=="bos")
        {
            ?> 
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
            <?php
        }
        elseif(($_GET["ayarguncelle"])=="basarili")
        {
          ?>
          <div class="col-lg-12 mt-4">
                 <div class="alert alert-success"><i class="fas fa-exclamation-circle mx-2"></i>İşleminiz başarıyla gerçekleştirildi.</div>
            </div>
          <?php
        }elseif(($_GET["ayarguncelle"])=="basarisiz")
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
                      <div class="card-header ustbilgi"><i class="fas fa-cog mx-2"></i>Genel Ayarlar</div>
                      <div class="card-body">
                        <h5 class="card-title text-warning">Genel Ayarlar Bölümüne Hoşgeldiniz!
                          Buradan Site İle İlgili Genel Ayarları Düzenleyebilirsiniz.
                        </h5>

            <!--islem.php ye gir site id 1 olan ayarları güncelle.-->
                        <form class="form-horizontal" role="form" action="islem.php?site_id=<?php echo $id; ?>" method="POST">

              <!--Üst kısım dosyasına zaten genelayarlar sorgusunu çekmiştik tekrar çekmeye gerek yok.-->
										  <div class="form-group">
										    <label for="inputEmail3" class="col-sm-2 control-label">Site Yazı</label>
										    <div class="col-sm-12">
              <!--Site Yazı değerini değer içine çekelim.-->
										      <input name="site_yazi" type="text" class="form-control" value="<?php echo $vericek["site_yazi"] ;?>">
										    </div>
                      </div>
                      
              <!--Site Adres değerini değer içine çekelim.-->
										  <div class="form-group">
										    <label for="inputPassword3" class="col-sm-2 control-label">Site Adres</label>
										    <div class="col-sm-12">
										      <input name="site_adres" type="text" class="form-control" value="<?php echo $vericek["site_adres"] ;?>">
										    </div>
										  </div>
             <!--Site Açıklama değerini değer içine çekelim.-->
                      <div class="form-group">
										    <label for="inputPassword3" class="col-sm-2 control-label">Site Bilgi</label>
										    <div class="col-sm-12">
										      <input name="site_bilgi" type="text" class="form-control" value="<?php echo $vericek["site_bilgi"] ;?>">
										    </div>
                      </div>
                <!--Site Anahtar değerini değer içine çekelim.-->
                      <div class="form-group">
										    <label for="inputPassword3" class="col-sm-2 control-label">Site Anahtar</label>
										    <div class="col-sm-12">
										      <input name="site_anahtar" type="text" class="form-control" value="<?php echo $vericek["site_anahtar"] ;?>">
										    </div>
                      </div>
                <!--Site Alt Kısım değerini değer içine çekelim.-->          
                      <div class="form-group">
										    <label for="inputPassword3" class="col-sm-2 control-label">Site Alt Kısım</label>
										    <div class="col-sm-12">
										      <input name="site_altkisim" type="text" class="form-control" value="<?php echo $vericek["site_altkisim"] ;?>">
										    </div>
										  </div>

                      <div class="col-md-4">
                        <button name="genelayarlar" class="btn btn-success pull-right">Güncelle</button>
                      </div>
										
										</form>
                    
                      </div>
                    </div>
                  </div>
                </div>
              </div>

<?php include 'yonetimpaneli_altkisim.php' ?>