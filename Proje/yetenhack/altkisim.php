<div class="container-fluid mt-3 text-center altkisim">
        <p><i class="fas fa-hat-wizard logo sapka"></i> YETENHACK. gururla sunar geliştirici <i class="fas fa-code mx-2"></i>Muhammed Melih Çelik & Ceyda Önemli</p>

        <!--Veritabanımdan site_adres verisini ve site_altkisim verisini çekiyorum.
gerekli yerlere yazdırıyorum.-->
        <a href="<?php echo $ayarlaricek["site_adres"]; ?>" class="link">
                <p><?php echo $ayarlaricek["site_altkisim"]; ?></p>
        </a>
        <script>
            $(window).load(function() 
        {
        $('#status').fadeOut();
        $('#preloader').delay(350).fadeOut(800);
        $('body').delay(350).fadeIn('very slow').css({'overflow':'visible'});
        })
        </script>
        </body>
        </html>