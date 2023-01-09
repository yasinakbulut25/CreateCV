<?php !defined("index") ? header("location: demo") : null ?>

<div class="container-lg my-3">
    <?php
    $getSubmisson = @$_GET['content'];

    if ($getSubmisson){

        $findCV = $data->prepare("SELECT * FROM users where submission_id=?");
        $findCV->execute(array($getSubmisson));
        $fetchCV = $findCV->fetch();
        
        if($findCV->rowCount()){
            if($fetchCV['username'] == $_SESSION['user']){
                $locationUrl = $siteUrl . "profile/" . $_SESSION['user'];

                $deleteUser = $data->prepare("delete from users where submission_id=?");
                $deleteUserProcess = $deleteUser->execute(array($getSubmisson));
        
                $deleteCert = $data->prepare("delete from certificates where submission_id=?");
                $deleteCertProcess = $deleteCert->execute(array($getSubmisson));
                
                $deleteExp = $data->prepare("delete from experiences where submission_id=?");
                $deleteExpProcess = $deleteExp->execute(array($getSubmisson));
        
                $deleteLang = $data->prepare("delete from languages where submission_id=?");
                $deleteLangProcess = $deleteLang->execute(array($getSubmisson));
        
                $deleteRef = $data->prepare("delete from reference where submission_id=?");
                $deleteRefProcess = $deleteRef->execute(array($getSubmisson));
        
                $deleteSkill = $data->prepare("delete from skills where submission_id=?");
                $deleteSkillProcess = $deleteSkill->execute(array($getSubmisson));
        
                $deleteEdu = $data->prepare("delete from educations where submission_id=?");
                $deleteEduProcess = $deleteEdu->execute(array($getSubmisson));
        
        
                if ($deleteUserProcess && $deleteCertProcess && $deleteExpProcess && $deleteLangProcess && $deleteRefProcess && $deleteSkillProcess && $deleteEduProcess){
                    successPage($locationUrl,"İçerik başarılı bir şekilde silindi.");
                }else{
                    errorPage($locationUrl,"CV Silinirken bir hata oluştu! Daha sonra tekrar deneyiniz..","5511");
                }
            }else{
                errorPage($locationUrl,"Kullanıcıya ait CV eşleşmiyor!","5506");
            }
        }else{
            errorPage($locationUrl,"Kayıtlı CV bulunamadı!","5507");
        }
    }else{
        header("refresh: 0; url=$locationUrl");
    }
    ?>
</div>

