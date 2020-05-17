<?php include 'yonetimpaneli_ustkisim.php'; ?>
<?php include 'yonetimpaneli_solmenu.php'; ?>
<?php error_reporting(0); ?>
<div class="col-lg-10">
    <?php
      $is_id = $_GET["is_id"]; 
      $sorgu = $db->prepare("SELECT *FROM islerim WHERE is_id=?");
      $sorgu->execute(array($is_id));
      $sorgucek = $sorgu->fetch(PDO::FETCH_ASSOC);
    ?>

                    <div class="card bg-dark text-white mb-3 mt-3 icerik">
                      <div class="card-header ustbilgi"><i class="fas fa-cog mx-2"></i>İş Düzenle</div>
                      <div class="card-body">
                        <h5 class="card-title text-warning">İş Düzenle Bölümüne Hoş Geldiniz!
                          Buradan İşlerinizi Düzenleyebilirsiniz.
                        </h5>

                        <form class="form-horizontal" role="form" action="islem.php?is_id=<?php echo $sorgucek["is_id"]; ?>" method="POST">

										  <div class="form-group">
										    <label for="inputEmail3" class="col-sm-2 control-label">İş Adı</label>
										    <div class="col-sm-12">
										      <input name="is_adi" type="text" class="form-control" value="<?php echo $sorgucek["is_adi"];?>">
										    </div>
                      </div>
                      
                      <div class="form-group">
										    <label for="inputEmail3" class="col-sm-2 control-label">İş Link</label>
										    <div class="col-sm-12">
										      <input name="is_link" type="text" class="form-control"value="<?php echo $sorgucek["is_link"];?>">
										    </div>
                      </div>


                      <div class="form-group">
										    <label for="inputEmail3" class="col-sm-2 control-label">İş Devam</label>
										    <div class="col-sm-12">
                          <select name="is_devam" class="form-control">
                            <!--İş devam 1'e eşitse seçili olsun değilse null olsun (if else ifadesi)-->
                            <option value="1" <?php echo $sorgucek["is_devam"]==1 ? "selected" :null;?>>Hala Devam Ediyor</option>
                         <!--İş devam 0'a eşitse seçili olsun değilse null olsun (if else ifadesi)-->
                            <option value="0"  <?php echo $sorgucek["is_devam"]==0 ? "selected" :null;?>>Devam Etmiyor</option>
                          </select>
                      </div>
                      </div>



                      <div class="form-group">
										    <label for="inputEmail3" class="col-sm-2 control-label">İş Açıklama</label>
										    <div class="col-sm-12">
                            <textarea class="form-control" name="is_aciklama"  cols="75" rows="5" ><?php echo $sorgucek["is_aciklama"];?> </textarea>
                      </div>
                      </div>


             
                      <div class="col-md-4">
                        <button name="is-duzenle" class="btn btn-success pull-right">Ekle</button>
                      </div>
                      
                    
                      </div>
                    </div>
                  </div>
                </div>
              </div>

<?php include 'yonetimpaneli_altkisim.php' ?>