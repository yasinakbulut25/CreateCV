<?php !defined("index") ? header("location: demo") : null ?>
<div class="container-lg">
    <div class="home-area">
        <?php include "header.php"; ?>

        <div class="main">
            <div class="password-area">
                <h1 class="main-title">Şifremi Unuttum</h1>
                <form action="" method="post" id="register-form">
                    <?php
                    
                    use PHPMailer\PHPMailer\PHPMailer;
                    
                    if($_POST){
                        $email = $_POST['email'];

                        if($email == ""){
                            ?>
                            <div class="alert alert-danger">
                                Lütfen tüm alanları doldurunuz!
                            </div>
                            <?php
                        }else{
                            $controlData = $data->prepare("SELECT * FROM members where email=? limit 1");
                            $controlData->execute(array($email));
                            $controlFetch = $controlData->fetch();
                            if($controlData->rowCount()){

                                $loginUrl = $siteUrl . "login";
                                $mailSubject = "Create CV | Şifre Bilgileri";
                                $mailBody = "
                                Merhaba ".ucwords($controlFetch['name']).", 
                                <br><br>
                                Create CV sistemimize kayıtlı hesabınızın şifre bilgileri aşağıda verilmektedir;
                                <br><br>
                                <b>Email:</b> $email
                                <br>
                                <b>Şifre:</b> ".$controlFetch['passwordText']."
                                <br><br>
                                <a href='$loginUrl'>Giriş Yap</a>
                                <br><br>
                                <i>Bizi tercih ettiğiniz için teşekkür ederiz </i>😊
                                <br><br>
                                ";
     
                                require_once "PHPMailer/PHPMailer.php";
                                require_once "PHPMailer/SMTP.php";
                                require_once "PHPMailer/Exception.php";
                            
                                $mail = new PHPMailer();
                            
                                $mail->isSMTP();
                                $mail->Host = $smtpHost;
                                $mail->SMTPAuth = true;
                                $mail->Username = $smtpEmail;
                                $mail->Password = $smtpPassword;
                                $mail->Port = 465;
                                $mail->CharSet = "UTF-8";
                                $mail->SMTPSecure = "ssl";
                            
                                $mail->isHTML(true);
                                $mail->setFrom($email, "Create CV");
                                $mail->addAddress($smtpEmail);
                                $mail->Subject = $mailSubject;
                                $mail->Body = $mailBody;                         
                         

                                if($mail->send()){
                                    successPage($siteUrl,"Şifre sıfırlama bilgileri mail adresinize gönderilmiştir!");                                    
                                }else{
                                    errorPage($siteUrl,"Şifre sıfırlama bilgileri gönderilirken bir hata oluştu!","0147");                                    
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
                    <span class="forgot-password">Hesabınıza kayıtlı olan mail adresini giriniz. Şifre sıfırlama bilgileri belirttiğiniz mail adresine gönderilecektir.</span>

                    <div class="inputBox">
                        <label for="">E-mail</label>
                        <input type="email" name="email" >
                    </div>

                    <button class="link-btn purple">Şifre Sıfırla <i class="bi bi-lock"></i></button>
                </form>
            </div>

        </div>
    </div>
</div>