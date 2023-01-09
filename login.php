<?php !defined("index") ? header("location: demo") : null ?>
<div class="container-lg">
    <div class="home-area">
        <?php include "header.php"; ?>

        <div class="main">
            <div class="login-area">
                <h1 class="main-title">Giriş Yap <b>CV</b> Oluştur!</h1>
                <form action="" method="post" id="register-form">
                    <?php

                    if($_POST){
                        $email = $_POST['email'];
                        $password = md5($_POST['password']);

                        if($email == "" || $password == ""){
                            ?>
                            <div class="alert alert-danger">
                                Lütfen tüm alanları doldurunuz!
                            </div>
                            <?php
                        }else{
                            $controlData = $data->prepare("SELECT * FROM members where email=? and password=? limit 1");
                            $controlData->execute(array($email,$password));
                            $controlFetch = $controlData->fetch();
                            if($controlData->rowCount()){
                                if($controlFetch['publish'] == 0){
                                    ?>
                                    <div class="alert alert-danger">
                                        Hesabınız aktif değil! Mail adresinizi kontrol ediniz.
                                    </div>
                                    <?php
                                }else{
                                    $_SESSION['user'] = $controlFetch['username'];
                                    $locationurl = $siteUrl . "profile/" . $controlFetch['username'];
                                    header("refresh: 0; url=$locationurl");
                                }
                            }else{
                                ?>
                                <div class="alert alert-danger">
                                    Bilgilelere ait kayıt bulunamadı!
                                </div>
                                <?php
                            }
                        }
                        
                    }

                    ?>
                    <div class="inputBox">
                        <label for="">E-mail</label>
                        <input type="email" name="email" >
                    </div>
                    <div class="inputBox">
                        <label for="">Şifre</label>
                        <input type="password" name="password" maxlength="20" >
                    </div>

                    <a href="forgot-password" class="forgot-password">Şifremi Unuttum</a>
                    
                    <button class="link-btn purple">Giriş Yap <i class="bi bi-plus-circle-dotted"></i></button>
                </form>
            </div>

            <div class="main-img">
                <div class="main-blur"></div>
                <img src="./assets/img/main.png" alt="cv">
            </div>
        </div>
    </div>
</div>