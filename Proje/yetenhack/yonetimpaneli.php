<?php include 'yonetimpaneli_ustkisim.php'; ?>
<?php include 'yonetimpaneli_solmenu.php'; ?>

<div class="col-lg-10">
                    <div class="card bg-dark text-white mb-3 mt-3 icerik">
                      <div class="card-header ustbilgi">Yetenhack. Yönetim Paneline Hoşgeldiniz!</div>
                      <div class="card-body">
                        <h5 class="card-title">Kolayca verilerinizi yönetin ve profilinizi diğer insanlar ile paylaşın!</h5>
                      </div>
                      <div class="row">



                      <div class="col-lg-3 p-3 ml-5">
                    <div class="card bg-dark text-white mb-3 icerik sayicerceve">
                      <div class="card-header ustbilgi"><i class="fas fa-info-circle mx-2"></i>Bilgilerim</div>
                      <div class="card-body">
                        <h5 class="card-title">
                        <?php
                            $sorgu = $db->prepare("SELECT *FROM sosyalmedya");
                            $sorgu->execute();
                            $sorgu->fetch(PDO::FETCH_ASSOC);
                            $sorgusay = $sorgu->columnCount();
                            ?>
                            <center>
                              <span><?php echo $sorgusay-1; ?></span>
                              <br>
                              <p>adet</p>
                            </center>
                        </h5>
                      </div>
                    </div>
                  </div>


                      <div class="col-lg-3 p-3 ml-5">
                    <div class="card bg-dark text-white mb-3 icerik sayicerceve">
                      <div class="card-header ustbilgi"><i class="fas fa-language mx-2"></i>Yabancı Diller</div>
                      <div class="card-body">
                        <h5 class="card-title">
                            <?php
                            $sorgu = $db->prepare("SELECT *FROM yabancidil_yeteneklerim");
                            $sorgu->execute();
                            $sorgu->fetch(PDO::FETCH_ASSOC);
                            $sorgusay = $sorgu->rowCount();
                            ?>
                            <center>
                              <span><?php echo $sorgusay; ?></span>
                              <br>
                              <p>adet</p>
                            </center>
                        </h5>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-3 p-3 ml-5">
                    <div class="card bg-dark text-white mb-3 icerik sayicerceve">
                      <div class="card-header ustbilgi"><i class="fas fa-desktop mx-2"></i>Yazılım Dili Yetenek</div>
                      <div class="card-body">
                        <h5 class="card-title">
                        <?php
                            $sorgu = $db->prepare("SELECT *FROM yazilimdili_yeteneklerim");
                            $sorgu->execute();
                            $sorgu->fetch(PDO::FETCH_ASSOC);
                            $sorgusay = $sorgu->rowCount();
                            ?>
                            <center>
                              <span><?php echo $sorgusay; ?></span>
                              <br>
                              <p>adet</p>
                            </center>
                        </h5>
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-3 p-3 ml-5">
                    <div class="card bg-dark text-white mb-3 icerik sayicerceve">
                      <div class="card-header ustbilgi"><i class="far fa-file-word mx-2"></i>Paket Program Bilgisi</div>
                      <div class="card-body">
                        <h5 class="card-title"> 
                        <?php
                            $sorgu = $db->prepare("SELECT *FROM paketprogrambilgisi_yeteneklerim");
                            $sorgu->execute();
                            $sorgu->fetch(PDO::FETCH_ASSOC);
                            $sorgusay = $sorgu->rowCount();
                            ?>
                            <center>
                              <span><?php echo $sorgusay; ?></span>
                              <br>
                              <p>adet</p>
                            </center>
                        </h5>
                      </div>
                    </div>
                  </div>
 

                  <div class="col-lg-3 p-3 ml-5">
                    <div class="card bg-dark text-white mb-3 icerik sayicerceve">
                      <div class="card-header ustbilgi"><i class="fas fa-users mx-2"></i>Sosyal Beceriler</div>
                      <div class="card-body">
                        <h5 class="card-title">
                        <?php
                            $sorgu = $db->prepare("SELECT *FROM sosyalbeceri_yeteneklerim");
                            $sorgu->execute();
                            $sorgu->fetch(PDO::FETCH_ASSOC);
                            $sorgusay = $sorgu->rowCount();
                            ?>
                            <center>
                              <span><?php echo $sorgusay; ?></span>
                              <br>
                              <p>adet</p>
                            </center>
                        </h5>
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-3 p-3 ml-5">
                    <div class="card bg-dark text-white mb-3 icerik sayicerceve">
                      <div class="card-header ustbilgi"><i class="fas fa-university mx-2"></i>Okullarım</div>
                      <div class="card-body">
                        <h5 class="card-title">
                        <?php
                            $sorgu = $db->prepare("SELECT *FROM okullarim");
                            $sorgu->execute();
                            $sorgu->fetch(PDO::FETCH_ASSOC);
                            $sorgusay = $sorgu->rowCount();
                            ?>
                            <center>
                              <span><?php echo $sorgusay; ?></span>
                              <br>
                              <p>adet</p>
                            </center>
                        </h5>
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-3 p-3 ml-5">
                    <div class="card bg-dark text-white mb-3 icerik sayicerceve">
                      <div class="card-header ustbilgi"><i class="fas fa-briefcase mx-2"></i>İşlerim</div>
                      <div class="card-body">
                        <h5 class="card-title">
                        <?php
                            $sorgu = $db->prepare("SELECT *FROM islerim");
                            $sorgu->execute();
                            $sorgu->fetch(PDO::FETCH_ASSOC);
                            $sorgusay = $sorgu->rowCount();
                            ?>
                            <center>
                              <span><?php echo $sorgusay; ?></span>
                              <br>
                              <p>adet</p>
                            </center>
                        </h5>
                      </div>
                    </div>
                  </div>


                  <div class="col-lg-3 p-3 ml-5">
                    <div class="card bg-dark text-white mb-3 icerik sayicerceve">
                      <div class="card-header ustbilgi"><i class="fas fa-project-diagram mx-2"></i>Projelerim</div>
                      <div class="card-body">
                        <h5 class="card-title">
                        <?php
                            $sorgu = $db->prepare("SELECT *FROM projelerim");
                            $sorgu->execute();
                            $sorgu->fetch(PDO::FETCH_ASSOC);
                            $sorgusay = $sorgu->rowCount();
                            ?>
                            <center>
                              <span><?php echo $sorgusay; ?></span>
                              <br>
                              <p>adet</p>
                            </center>
                        </h5>
                      </div>
                    </div>
                  </div>



                  <div class="col-lg-3 p-3 ml-5">
                    <div class="card bg-dark text-white mb-3 icerik sayicerceve">
                      <div class="card-header ustbilgi"><i class="fas fa-hashtag mx-2"></i>Sosyal Medya</div>
                      <div class="card-body">
                        <h5 class="card-title">
                        <?php
                            $sorgu = $db->prepare("SELECT *FROM sosyalmedya");
                            $sorgu->execute();
                            $sorgu->fetch(PDO::FETCH_ASSOC);
                            $sorgusay = $sorgu->columnCount();
                            ?>
                            <center>
                              <span><?php echo $sorgusay-2; ?></span>
                              <br>
                              <p>adet</p>
                            </center>
                        </h5>
                      </div>
                    </div>
                  </div>




                      </div>
                    </div>
                  </div>
                </div>
              </div>

<?php include 'yonetimpaneli_altkisim.php' ?>