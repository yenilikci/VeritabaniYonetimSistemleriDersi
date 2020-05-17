<?php include 'yonetimpaneli_ustkisim.php'; ?>
<?php include 'yonetimpaneli_solmenu.php'; ?>
<?php error_reporting(0); ?>
<div class="col-lg-10">


        <!--Uyarı oluşturmak için.--> 
        <?php 
        #eğer islem.php 'deki kısımlar boş bırakıldıysa get ile bu sayfaya geri dönülür ve bosbirakti çalışır.
        if(($_GET["sosyalmedyaguncelle"])=="bos")
        {
            ?> 
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
            <?php
        }
        elseif(($_GET["sosyalmedyaguncelle"])=="basarili")
        {
          ?>
          <div class="col-lg-12 mt-4">
                 <div class="alert alert-success"><i class="fas fa-exclamation-circle mx-2"></i>İşleminiz başarıyla gerçekleştirildi.</div>
            </div>
          <?php
        }elseif(($_GET["sosyalmedyaguncelle"])=="basarisiz")
        {
          ?>
            <div class="col-lg-12 mt-4">
                 <div class="alert alert-danger"><i class="fas fa-exclamation-circle mx-2"></i>Lütfen ilgili alanları boş bırakmayınız!</div>
            </div>
          <?php
        }
        ?>
        <!--Uyarı son.--> 

          <!--Sosyal Medya Tablosunun Çekimi-->
          <?php 

              $id = 1;
              $sorgu = $db->prepare("SELECT *FROM sosyalmedya");
              $sorgu->execute();
              $sosyalmedyacek = $sorgu->fetch(PDO::FETCH_ASSOC);

          ?>

                    <div class="card bg-dark text-white mb-3 mt-3 icerik">
                      <div class="card-header ustbilgi"><i class="fas fa-cog mx-2"></i>Sosyal Medya Hesaplarım</div>
                      <div class="card-body">
                        <h5 class="card-title text-warning">Sosyal Medya Hesaplarım Bölümüne Hoşgeldiniz!
                          Buradan Sosyal Medya Hesaplarınızı Düzenleyebilirsiniz.
                        </h5>

                        <form class="form-horizontal" role="form" action="islem.php?sosyal_id=<?php echo $id; ?>" method="POST">

										  <div class="form-group">
										    <label for="inputEmail3" class="col-sm-2 control-label">Facebook</label>
										    <div class="col-sm-12">
										      <input name="sosyal_facebook" type="text" class="form-control" value="<?php echo $sosyalmedyacek["sosyal_facebook"] ;?>">
										    </div>
                      </div>
                      
										  <div class="form-group">
										    <label for="inputPassword3" class="col-sm-2 control-label">Instagram</label>
										    <div class="col-sm-12">
										      <input name="sosyal_instagram" type="text" class="form-control" value="<?php echo $sosyalmedyacek["sosyal_instagram"] ;?>">
										    </div>
                      </div>
                      
                      <div class="form-group">
										    <label for="inputPassword3" class="col-sm-2 control-label">Github</label>
										    <div class="col-sm-12">
										      <input name="sosyal_github" type="text" class="form-control" value="<?php echo $sosyalmedyacek["sosyal_github"] ;?>">
										    </div>
                      </div>

                      <div class="form-group">
										    <label for="inputPassword3" class="col-sm-2 control-label">Linkedin</label>
										    <div class="col-sm-12">
										      <input name="sosyal_linkedin" type="text" class="form-control" value="<?php echo $sosyalmedyacek["sosyal_linkedin"] ;?>">
										    </div>
                      </div>

                      <div class="form-group">
										    <label for="inputPassword3" class="col-sm-2 control-label">Reddit</label>
										    <div class="col-sm-12">
										      <input name="sosyal_reddit" type="text" class="form-control" value="<?php echo $sosyalmedyacek["sosyal_reddit"] ;?>">
										    </div>
                      </div>
                      
                      <div class="form-group">
										    <label for="inputPassword3" class="col-sm-2 control-label">Twitter</label>
										    <div class="col-sm-12">
										      <input name="sosyal_twitter" type="text" class="form-control" value="<?php echo $sosyalmedyacek["sosyal_twitter"] ;?>">
										    </div>
										  </div>


                      <div class="form-group">
										    <label for="inputPassword3" class="col-sm-2 control-label">Pinterest</label>
										    <div class="col-sm-12">
										      <input name="sosyal_pinterest" type="text" class="form-control" value="<?php echo $sosyalmedyacek["sosyal_pinterest"] ;?>">
										    </div>
										  </div>



                      <div class="col-md-4">
                        <button name="sosyalmedya" class="btn btn-success pull-right">Güncelle</button>
                      </div>
										
										</form>
                    
                      </div>
                    </div>
                  </div>
                </div>
              </div>

<?php include 'yonetimpaneli_altkisim.php' ?>