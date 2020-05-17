<?php include 'yonetimpaneli_ustkisim.php'; ?>
<?php include 'yonetimpaneli_solmenu.php'; ?>
<?php error_reporting(0); ?>
<div class="col-lg-10">


        <!--Uyarı oluşturmak için.--> 
        <?php 
        #eğer islem.php 'deki kısımlar boş bırakıldıysa get ile bu sayfaya geri dönülür ve bosbirakti çalışır.
        if(($_GET["bilgiguncelle"])=="bos")
        {
            ?> 
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
            <?php
        }
        elseif(($_GET["bilgiguncelle"])=="basarili")
        {
          ?>
          <div class="col-lg-12 mt-4">
                 <div class="alert alert-success"><i class="fas fa-exclamation-circle mx-2"></i>İşleminiz başarıyla gerçekleştirildi.</div>
            </div>
          <?php
        }elseif(($_GET["bilgiguncelle"])=="basarisiz")
        {
          ?>
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
          <?php
        }
        ?>
        <!--Uyarı son.--> 
        
        <!--Bilgilerim verilerini çekebilmek için -->
        <?php
            $id=1;
            $sorgu = $db->prepare("SELECT *FROM bilgilerim");
            $sorgu->execute();
            $bilgilerimicek = $sorgu->fetch(PDO::FETCH_ASSOC);
        ?>



                    <div class="card bg-dark text-white mb-3 mt-3 icerik">
                      <div class="card-header ustbilgi"><i class="fas fa-info-circle mx-2"></i>Bilgilerim</div>
                      <div class="card-body">
                        <h5 class="card-title text-warning">Bilgilerim Bölümüne Hoşgeldiniz!
                          Buradan Bilgilerim Bölümüyle Alakalı Alanları Düzenleyebilirsiniz.
                        </h5>

            <!--islem.php ye gir bilgi id 1 olan ayarları güncelle.-->
                        <form class="form-horizontal" role="form" action="islem.php?bilgi_id=<?php echo $id; ?>" method="POST">
                        <label for="inputEmail3" class="col-sm-2 control-label">Fotoğraf Önizleme</label>
                          <img width="200px" src="<?php echo $bilgilerimicek["bilgi_fotograf"];?>" alt="">
										  <div class="form-group">
										    <label for="inputEmail3" class="col-sm-2 control-label">Fotoğraf Linki</label>
										    <div class="col-sm-12">
              <!--Bilgi Fotoğraf değerini kutu içine çekelim.-->
										      <input name="bilgi_fotograf" type="text" class="form-control" value="<?php echo $bilgilerimicek["bilgi_fotograf"] ;?>">
										    </div>
                      </div>
                      
              <!--Bilgi İsim değerini kutu içine çekelim.-->
										  <div class="form-group">
										    <label for="inputPassword3" class="col-sm-2 control-label">İsim</label>
										    <div class="col-sm-12">
										      <input name="bilgi_isim" type="text" class="form-control" value="<?php echo $bilgilerimicek["bilgi_isim"] ;?>">
										    </div>
										  </div>
             <!--Bilgi Hakkında değerini kutu içine çekelim.-->
                      <div class="form-group">
										    <label for="inputPassword3" class="col-sm-2 control-label">Hakkında</label>
										    <div class="col-sm-12">
										      <input name="bilgi_hakkinda" type="text" class="form-control" value="<?php echo $bilgilerimicek["bilgi_hakkinda"] ;?>">
										    </div>
                      </div>
                <!--Bilgi İkamet değerini kutu içine çekelim.-->
                      <div class="form-group">
										    <label for="inputPassword3" class="col-sm-2 control-label">İkamet</label>
										    <div class="col-sm-12">
										      <input name="bilgi_ikamet" type="text" class="form-control" value="<?php echo $bilgilerimicek["bilgi_ikamet"] ;?>">
										    </div>
                      </div>
                <!--Bilgi Mail değerini kutu içine çekelim.-->          
                      <div class="form-group">
										    <label for="inputPassword3" class="col-sm-2 control-label">Mail</label>
										    <div class="col-sm-12">
                        <input name="bilgi_mail" type="text" class="form-control" value="<?php echo $bilgilerimicek["bilgi_mail"] ;?>">
										    </div>
                      </div>
                      
               <!--Bilgi Telefon değerini kutu içine çekelim.-->
                      <div class="form-group">
										    <label for="inputPassword3" class="col-sm-2 control-label">Telefon</label>
										    <div class="col-sm-12">
                        <input name="bilgi_telefon" type="text" class="form-control" value="<?php echo $bilgilerimicek["bilgi_telefon"] ;?>">
										    </div>
										  </div>


                      <div class="col-md-4">
                        <button name="bilgilerim" class="btn btn-success pull-right">Güncelle</button>
                      </div>
										
										</form>
                    
                      </div>
                    </div>
                  </div>
                </div>
              </div>

<?php include 'yonetimpaneli_altkisim.php' ?>