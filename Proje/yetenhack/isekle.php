<?php include 'yonetimpaneli_ustkisim.php'; ?>
<?php include 'yonetimpaneli_solmenu.php'; ?>
<?php error_reporting(0); ?>
<div class="col-lg-10">


                    <div class="card bg-dark text-white mb-3 mt-3 icerik">
                      <div class="card-header ustbilgi"><i class="fas fa-cog mx-2"></i>İş Ekle</div>
                      <div class="card-body">
                        <h5 class="card-title text-warning">İş Ekle Bölümüne Hoş Geldiniz!
                          Buradan İş Geçmişinizi Veya Güncel İşinizi Ekleyebilirsiniz.
                        </h5>

                        <form class="form-horizontal" role="form" action="islem.php" method="POST">

										  <div class="form-group">
										    <label for="inputEmail3" class="col-sm-2 control-label">İş Adı</label>
										    <div class="col-sm-12">
										      <input name="is_adi" type="text" class="form-control" placeholder="İşinizin Adını Giriniz">
										    </div>
                      </div>
                      
                      <div class="form-group">
										    <label for="inputEmail3" class="col-sm-2 control-label">İş Link</label>
										    <div class="col-sm-12">
										      <input name="is_link" type="text" class="form-control" placeholder="İşinizin Linkini Giriniz">
										    </div>
                      </div>


                      <div class="form-group">
										    <label for="inputEmail3" class="col-sm-2 control-label">İş Devam</label>
										    <div class="col-sm-12">
                          <select name="is_devam" class="form-control">
                            <option value="1">Hala Devam Ediyor</option>
                            <option value="0">Devam Etmiyor</option>
                          </select>
                      </div>
                      </div>



                      <div class="form-group">
										    <label for="inputEmail3" class="col-sm-2 control-label">İş Açıklama</label>
										    <div class="col-sm-12">
                            <textarea class="form-control" name="is_aciklama"  cols="75" rows="5" placeholder="İşinizin Açıklamasını Giriniz"></textarea>
                      </div>
                      </div>


             
                      <div class="col-md-4">
                        <button name="is-ekle" class="btn btn-success pull-right">Ekle</button>
                      </div>
                    
                      </div>
                    </div>
                  </div>
                </div>
              </div>

<?php include 'yonetimpaneli_altkisim.php' ?>