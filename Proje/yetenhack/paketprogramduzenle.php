<?php include 'yonetimpaneli_ustkisim.php'; ?>
<?php include 'yonetimpaneli_solmenu.php'; ?>
<?php error_reporting(0); ?>
<div class="col-lg-10">


       <!--Uyarı oluşturmak için.--> 
       <?php 
        #eğer islem.php 'deki kısımlar boş bırakıldıysa get ile bu sayfaya geri dönülür ve bosbirakti çalışır.
        if(($_GET["paketprogramduzenle"])=="bos")
        {
            ?> 
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
            <?php
        }
        elseif(($_GET["paketprogramduzenle"])=="basarili")
        {
          ?>
          <div class="col-lg-12 mt-4">
                 <div class="alert alert-success"><i class="fas fa-exclamation-circle mx-2"></i>İşleminiz başarıyla gerçekleştirildi.</div>
            </div>
          <?php
        }elseif(($_GET["paketprogramduzenle"])=="basarisiz")
        {
          ?>
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
          <?php
        }
        ?>
        <!--Uyarı son.--> 

          <!--Paket Program tablosunun çekimi-->
          <?php
              $paketprogrambilgisi_id = $_GET["paketprogrambilgisi_id"];
              #tablodan verileri çekme
              $sorgu = $db->prepare("SELECT *FROM paketprogrambilgisi_yeteneklerim WHERE paketprogrambilgisi_id=?");
              #WHERE $beceri_id=? yazıyorum ki bu sayfada bu veriyi güncelleyeceğimi işleme söyleyeyim.
              $sorgu->execute(array($paketprogrambilgisi_id));
              $paketprogram = $sorgu->fetch(PDO::FETCH_ASSOC);
        ?>




                    <div class="card bg-dark text-white mb-3 mt-3 icerik">
                      <div class="card-header ustbilgi"><i class="fas fa-cog mx-2"></i>Paket Program Bilgisi Düzenle</div>
                      <div class="card-body">
                        <h5 class="card-title text-warning">Paket Program Bilgisi Düzenle Bölümüne Hoş Geldiniz!
                          Buradan Paket Program Bilgilerinizi Düzenleyebilirsiniz.
                        </h5>

                        <form class="form-horizontal" role="form" action="islem.php?paketprogrambilgisi_id=<?php echo $paketprogram["paketprogrambilgisi_id"];?>" method="POST">

										  <div class="form-group">
										    <label for="inputEmail3" class="col-sm-2 control-label">Beceri Adı</label>
										    <div class="col-sm-12">
										      <input name="paketprogrambilgisi_adi" type="text" class="form-control" value="<?php echo $paketprogram["paketprogrambilgisi_adi"]; ?>">
										    </div>
                      </div>
                      
                      <div class="form-group">
										    <label for="inputEmail3" class="col-sm-2 control-label">Beceri Yüzde (%)</label>
										    <div class="col-sm-12">
										      <input name="paketprogrambilgisi_yuzde" type="text" class="form-control" value="<?php echo $paketprogram["paketprogrambilgisi_yuzde"]; ?>">
										    </div>
                      </div>


             
                      <div class="col-md-4">
                        <button name="paketprogram-duzenle" class="btn btn-success pull-right">Güncelle</button>
                      </div>
										
										</form>
                    
                      </div>
                    </div>
                  </div>
                </div>
              </div>

<?php include 'yonetimpaneli_altkisim.php' ?>