<?php !defined("index") ? header("location: demo") : null ?>
<div class="container-lg">
    <div class="home-area">
        <?php include "header.php"; ?>

        <div class="main">
            <div class="main-text">
                <h1 class="main-title">Kolayca <b>CV</b> Oluşturun!</h1>
                <p class="main-exp">
                    Bilgilerini kolayca gir, özel hazırlanmış şablonlardan istediğini seç, şablonda kullanmak istediğin rengi ve 
                    yazı fontunu seç, şablonun için istediğin dili seç ve tek tıkla CV'ni yazdır. CV oluşturmak artık işte bu kadar kolay!
                </p>
                <ul class="main-list">
                    <li><i class="bi bi-star"></i> 7 Farklı <b>renk</b> seçenği!</li>
                    <li><i class="bi bi-star"></i> 6 Farklı <b>CV</b> şablonu!</li>
                    <li><i class="bi bi-star"></i> 6 Farklı <b>font</b> seçeneği!</li>
                    <li><i class="bi bi-star"></i> Dilediğin kadar <b>dil</b> seçeneği!</li>
                    <li><i class="bi bi-star"></i> CV'nizi <b>ücretsiz</b> indirme!</li>
                    <li><i class="bi bi-star"></i> CV'nizi sornadan <b>düzenleme</b> imkanı!</li>
                    <li><i class="bi bi-star"></i> CV içeriklerini <b>sürükle-bırak</b> imkanı!</li>
                    <li><i class="bi bi-star"></i> Hem <b>karanlık</b> hem de <b>aydınlık</b> tema seçeneği!</li>
                </ul>
                <div class="main-buttons">
                    <a href="demo" target="_blank" class="link-btn green">Ücretsiz Demo <i class="bi bi-file-earmark-text"></i></a>
                    <?php
                    if(isset($_SESSION['user'])){
                        ?>
                        <a href="form/<?= $_SESSION['user']; ?>" target="_blank" class="link-btn purple">CV Oluştur <i class="bi bi-gem"></i></a>
                        <?php
                    }else{
                        ?>
                        <a href="form" target="_blank" class="link-btn purple">CV Oluştur <i class="bi bi-gem"></i></a>
                        <?php
                    }
                    ?>
                </div>
            </div>

            <div class="main-img">
                <div class="main-blur"></div>
                <img src="./assets/img/main.png" alt="cv">
            </div>
        </div>
    </div>
</div>
