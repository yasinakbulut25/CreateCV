<?php !defined("index") ? header("location: demo") : null ?>
<header>
    <div class="logo">
        <a href="<?= $siteUrl; ?>">Create CV</a>
    </div>
    <div class="links">
        <ul>
            <?php
            if(isset($_SESSION['user'])){
                echo '
                <li>
                    <a href="profile/'.$_SESSION['user'].'" class="link-btn purple">Profil Göster<i class="bi bi-person"></i></a>
                    <a href="logout" class="link-btn red">Çıkış Yap <i class="bi bi-box-arrow-left"></i></a>
                </li>
                ';
            }else{
                echo '
                <li>
                    <a href="login" class="link-btn green">Giriş Yap <i class="bi bi-box-arrow-in-right"></i></a>
                    <a href="register" class="link-btn purple register-link">Kayıt Ol <i class="bi bi-plus-circle-dotted"></i></a>
                </li>
                ';
            }
            ?>
        </ul>
    </div>
</header>