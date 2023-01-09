<?php !defined("index") ? header("location: demo") : null ?>
<div class="container-lg">
    <div class="home-area">
        <?php include "header.php"; ?>

        <div class="main">
            <div class="register-area">
                <h1 class="main-title">Kayıt Ol <b>CV</b> Oluştur!</h1>
                <form action="" method="post" id="register-form">
                    <?php
                    
                    use PHPMailer\PHPMailer\PHPMailer;

                    if($_POST){
                        $randomNumber1 = rand(10,99);
                        $randomNumber2 = rand(10,99);
                        $name = $_POST['name'];
                        $username = permalink($name) . "-" . $randomNumber1 . $randomNumber2;
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        $passwordCheck = $_POST['password-check'];
                        $passwordMd5 = md5($_POST['password']);
                        date_default_timezone_set('Europe/Istanbul');
                        $userDate = date("d-m-Y");

                        if($name == "" || $email == "" || $password == "" || $passwordCheck == ""){
                            ?>
                            <div class="alert alert-danger">
                                Lütfen tüm alanları doldurunuz!
                            </div>
                            <?php
                        }else{
                            if($password != $passwordCheck){
                                ?>
                                <div class="alert alert-danger">
                                    Girdiğiniz parolalar eşleşmiyor!
                                </div>
                                <?php
                            }else{
                                $emailControl = $data->prepare("SELECT * FROM members where email=?");
                                $emailControl->execute(array($email));
                                $emailControlFetch = $emailControl->fetch();
                                if($emailControl->rowCount()){
                                    errorPage($siteUrl,"Bu mail adresine kayıtlı bir hesap zaten var! Lütfen farklı bir mail adresi ile kayıt olunuz.","8071");                                    
                                }else{
                                    $addData = $data->prepare("insert into members set 
                                    username=?,
                                    name=?,
                                    email=?,
                                    password=?,
                                    passwordText=?,
                                    date=?
                                    ");

                                    $addProcess = $addData->execute(array($username,$name,$email,$passwordMd5,$passwordCheck,$userDate));

                                    if($addProcess){

                                        $checkUrl = $siteUrl . "check-user/" . $username;

                                        $mailSubject = "Create CV | Hesap Onayla";
                                        $mailBody = "
                                        Merhaba ".ucwords($name)." 
                                        <br><br>
                                        Create CV sistemimizde oluşturduğunuz hesabınızı onaylamak için aşağıdaki bağlantıyı kullanabilirsiniz.
                                        <br><br>
                                        <a href='$checkUrl'>Hesabımı Onayla</a>
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
                                        $mail->setFrom($smtpEmail, "Create CV");
                                        $mail->addAddress($email);
                                        $mail->Subject = $mailSubject;
                                        $mail->Body = $mailBody;   
        
                                        if($mail->send()){
                                            successPage($siteUrl,"Hesabınız oluşturuldu! Hesabınızı onaylamak ve giriş yapabilmek için lütfen email adresinize gelen postayı kontrol ediniz!");                                    
                                        }else{
                                            errorPage($siteUrl,"Hesabınızın onay maili gönderilirken bir hata oluştu lütfen tekrar deneyiniz veya bizimle iletişime geçiniz!","8072");                                    
                                        }
                                    
                                    }else{
                                        errorPage($siteUrl,"Hesabınız oluşturulurken bir hata oluştu lütfen tekrar deneyiniz veya bizimle iletişime geçiniz!","8073");                                    
                                    }
                                }
                            }
                        }
                    }

                    ?>
                    <div class="inputBox">
                        <label for="">Ad Soyad</label>
                        <input type="text" name="name" maxlength="40">
                    </div>
                    <div class="inputBox">
                        <label for="">E-mail</label>
                        <input type="email" name="email" >
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-12">
                            <div class="inputBox">
                                <label for="">Şifre</label>
                                <input type="password" name="password" maxlength="20" >
                            </div>
                        </div>
                        <div class="col-sm-6 col-12">
                            <div class="inputBox">
                                <label for="">Şifre Onayla</label>
                                <input type="password" name="password-check" maxlength="20" >
                            </div>
                        </div>
                    </div>
                    <button class="link-btn purple">Ücretsiz Kayıt Ol <i class="bi bi-plus-circle-dotted"></i></button>
                </form>
            </div>
            <div class="main-img">
                <div class="main-blur"></div>
                <img src="./assets/img/main.png" alt="cv">
            </div>
        </div>
    </div>
</div>