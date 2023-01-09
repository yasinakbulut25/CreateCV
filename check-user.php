<?php !defined("index") ? header("location: demo") : null ?>
<?php

    $getUserName = @$_GET['content'];

    if (!$getUserName){
        errorPage($siteUrl,"Bilgilere ait kullanıcı bulunamadı!","9021");
    }else{

        $findUser = $data->prepare("SELECT * FROM members where username=? limit 1");
        $findUser->execute(array($getUserName));
        $fetchUser = $findUser->fetch();

        if ($findUser->rowCount() && $fetchUser['publish'] == 0){

            $updateUser = $data->prepare("update members set publish=? where username=? and publish=?");
            $checkUserProcess = $updateUser->execute(array(1,$getUserName,0));

            if ($checkUserProcess){
                successPage($siteUrl,"Hesabınız başarılı bir şekilde onaylandı.");
            }else{
                errorPage($siteUrl,"Üyeliğiniz onaylanırken bir hata oluştu! Lütfen bizimle iletişime geçiniz.","9022");
            }

        }else{
            errorPage($siteUrl,"Üye onay işlemi gerçekleştirilemiyor! Üye onay linki yanlış veya üye daha önce onaylanmış.","9023");
        }
    }

?>