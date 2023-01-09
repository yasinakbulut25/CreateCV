<?php !defined("index") ? header("location: demo") : null ?>

<?php

if(isset($_POST['editCV'])){
    function ChangeImagesName($changeName,$subId){
        $randomNumber = rand(1000,9999);
        $changeName = explode(".",$changeName);
        $newChangeName = $subId . "." . $changeName[1];
        return $newChangeName;
    }

    $submissionUserName = $_SESSION['user'];
    $userProfileUrl = $siteUrl . "profile/" . $submissionUserName;

    if($_FILES["profile"]["name"]){
        $fileName = $_FILES["profile"]["name"];
        $fileName =  ChangeImagesName($fileName,$fetchCV['submission_id']);
        $newFileName = "assets/img/profiles/" . $fileName;
    
        if ($_FILES["profile"]["type"] == "image/jpeg" || $_FILES["profile"]["type"] == "image/png" || $_FILES["profile"]["type"] == "image/svg+xml" || $_FILES["profile"]["type"] == "image/webp") {
            if (move_uploaded_file($_FILES["profile"]["tmp_name"], "./" . $newFileName)) {
                $newFileName = "assets/img/profiles/" . $fileName;
            }else{
                errorPage($userProfileUrl,"File düzenleme işlemi sırasında bir hata oluştu!","2508");
            }
        }else{
            errorPage($userProfileUrl,"File düzenleme işlemi sırasında bir hata oluştu!","2509");
        }
    }else{
        $newFileName = $fetchCV['profile'];
    }

    $name = $_POST['name'];
    $jobRole = $_POST['jobRole'];
    $phoneNumber = $_POST['phoneNumber'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    isset($_POST['webSite']) ? $webSite = $_POST['webSite'] : $webSite = "";
    $about = $_POST['about'];

    if(isset($_POST['socialMedia'])){
        $instagram = $_POST['socialMedia'][0];
        $twitter = $_POST['socialMedia'][1];
        $linkedin = $_POST['socialMedia'][2];
        $facebook = $_POST['socialMedia'][3];
        $github = $_POST['socialMedia'][4];
        $medium = $_POST['socialMedia'][5];
    }

    $addUsers = $data->prepare("update users set
            username=?,
            profile=?,
            name=?,
            jobRole=?,
            phoneNumber=?,
            address=?,
            email=?,
            webSite=?,
            about=?,
            instagram=?,
            twitter=?,
            linkedin=?,
            facebook=?,
            github=?,
            medium=?
            where submission_id=?
    ");

    $editUsersProcess = $addUsers->execute(array($submissionUserName,$newFileName,$name,$jobRole,$phoneNumber,$address,$email,$webSite,$about,$instagram,$twitter,$linkedin,$facebook,$github,$medium,$fetchCV['submission_id']));
    
    // control process
    if(!$editUsersProcess){ errorPage($userProfileUrl,"Düzenleme işlemi sırasında bir hata oluştu!","2501"); }
    
    foreach($fetchAllExp as $i => $writeExp){
        if(isset($_POST['expJobRole'][$i])){
            $expJobRole = $_POST['expJobRole'][$i];
            $expCompanyName = $_POST['expCompanyName'][$i];
            $expStartingYear = $_POST['expStartingYear'][$i];
            $expEndingYear = $_POST['expEndingYear'][$i];
            $expJobDescription = $_POST['expJobDescription'][$i];
    
            $editExp = $data->prepare("update experiences set
                expJobRole=?,
                expCompanyName=?,
                expStartingYear=?,
                expEndingYear=?,
                expJobDescription=?
                where id=?
            ");
    
            $editExpProcess = $editExp->execute(array($expJobRole,$expCompanyName,$expStartingYear,$expEndingYear,$expJobDescription,$writeExp['id']));
            
            // control process $i = error index
            if(!$editExpProcess){ errorPage($userProfileUrl,"Experience düzenleme sırasında bir hata oluştu!","2502.01-".$i); }
        }else{
            $deleteExp = $data->prepare("delete from experiences where id=?");
            $deleteExpProcess = $deleteExp->execute(array($writeExp['id']));
        }

    }

    if($_POST['expJobRole'] > count($fetchAllExp)){
        for($i=count($fetchAllExp); $i < count($_POST['expJobRole']); $i++){
            $expJobRole = $_POST['expJobRole'][$i];
            $expCompanyName = $_POST['expCompanyName'][$i];
            $expStartingYear = $_POST['expStartingYear'][$i];
            $expEndingYear = $_POST['expEndingYear'][$i];
            $expJobDescription = $_POST['expJobDescription'][$i];
    
            $addExp = $data->prepare("insert into experiences set
                submission_id=?,
                expJobRole=?,
                expCompanyName=?,
                expStartingYear=?,
                expEndingYear=?,
                expJobDescription=?
            ");
    
            $addExpProcess = $addExp->execute(array($fetchCV['submission_id'],$expJobRole,$expCompanyName,$expStartingYear,$expEndingYear,$expJobDescription));
            
            // control process $i = error index
            if(!$addExpProcess){ errorPage($userProfileUrl,"Experience düzenleme sırasında bir hata oluştu!","2502.02-".$i); }
        }
    }else{
        $addExpProcess = true;
    }

    foreach($fetchAllEdu as $i => $writeEdu){
        if(isset($_POST['eduSchool'][$i])){
            $eduSchool = $_POST['eduSchool'][$i];
            $eduStartingYear = $_POST['eduStartingYear'][$i];
            $eduEndingYear = $_POST['eduEndingYear'][$i];
    
            $editEdu = $data->prepare("update educations set
                eduSchool=?,
                eduStartingYear=?,
                eduEndingYear=?
                where id=?
            ");
    
            $editEduProcess = $editEdu->execute(array($eduSchool,$eduStartingYear,$eduEndingYear,$writeEdu['id']));
    
            // control process $i = error index
            if(!$editEduProcess){ errorPage($userProfileUrl,"Education düzenleme işlemi sırasında bir hata oluştu","2503.01-".$i); }
        }else{
            $deleteEdu = $data->prepare("delete from educations where id=?");
            $deleteEduProcess = $deleteEdu->execute(array($writeEdu['id']));
        }
    }

    if($_POST['eduSchool'] > count($fetchAllEdu)){
        for($i=count($fetchAllEdu); $i < count($_POST['eduSchool']); $i++){
            $eduSchool = $_POST['eduSchool'][$i];
            $eduStartingYear = $_POST['eduStartingYear'][$i];
            $eduEndingYear = $_POST['eduEndingYear'][$i];
    
            $addEdu = $data->prepare("insert into educations set
                submission_id=?,
                eduSchool=?,
                eduStartingYear=?,
                eduEndingYear=?
            ");
    
            $addEduProcess = $addEdu->execute(array($fetchCV['submission_id'],$eduSchool,$eduStartingYear,$eduEndingYear));
    
            // control process $i = error index
            if(!$addEduProcess){ errorPage($userProfileUrl,"Education düzenleme sırasında bir hata oluştu!","2503.02-".$i); }
        }
    }else{
        $addEduProcess = true;
    }
    
    foreach($fetchAllSkill as $i => $writeSkill){
        if(isset($_POST['skillName'][$i])){
            $skillName = $_POST['skillName'][$i];
            $skillLevel = $_POST['skillLevel'][$i];
    
            $editSkill = $data->prepare("update skills set
                skillName=?,
                skillLevel=?
                where id=?
            ");
    
            $editSkillProcess = $editSkill->execute(array($skillName,$skillLevel,$writeSkill['id']));
            
            // control process $i = error index
            if(!$editSkillProcess){ errorPage($userProfileUrl,"Skill düzenleme işlemi sırasında bir hata oluştu!","2504.01-".$i); }
        }else{
            $deleteSkill = $data->prepare("delete from skills where id=?");
            $deleteSkillProcess = $deleteSkill->execute(array($writeSkill['id']));
        }
    }

    if($_POST['skillName'] > count($fetchAllSkill)){
        for($i=count($fetchAllSkill); $i < count($_POST['skillName']); $i++){
            $skillName = $_POST['skillName'][$i];
            $skillLevel = $_POST['skillLevel'][$i];
    
            $addSkill = $data->prepare("insert into skills set
                submission_id=?,
                skillName=?,
                skillLevel=?
            ");
    
            $addSkillProcess = $addSkill->execute(array($fetchCV['submission_id'],$skillName,$skillLevel));
            
            // control process $i = error index
            if(!$addSkillProcess){ errorPage($userProfileUrl,"Skill düzenleme işlemi sırasında bir hata oluştu!","2504.02-".$i); }
        }
    }else{
        $addSkillProcess = true;
    }


    foreach($fetchAllLang as $i => $writeLang){
        if(isset($_POST['langName'][$i])){
            $langName = $_POST['langName'][$i];
            $langLevel = $_POST['langLevel'][$i];
    
            $editLang = $data->prepare("update languages set
                langName=?,
                langLevel=?
                where id=?
            ");
    
            $editLangProcess = $editLang->execute(array($langName,$langLevel,$writeLang['id']));
    
            // control process $i = error index
            if(!$editLangProcess){ errorPage($userProfileUrl,"Language düzenleme işlemi sırasında bir hata oluştu!","2505.01-".$i); }
        }else{
            $deleteLang = $data->prepare("delete from languages where id=?");
            $deleteLangProcess = $deleteLang->execute(array($writeLang['id']));
        }
    }

    if($_POST['langName'] > count($fetchAllLang)){
        for($i=count($fetchAllSkill); $i < count($_POST['langName']); $i++){
            $langName = $_POST['langName'][$i];
            $langLevel = $_POST['langLevel'][$i];
    
            $addLang = $data->prepare("insert into languages set
                submission_id=?,
                langName=?,
                langLevel=?
            ");
    
            $addLangProcess = $addLang->execute(array($fetchCV['submission_id'],$langName,$langLevel));
    
            // control process $i = error index
            if(!$addLangProcess){ errorPage($userProfileUrl,"Language düzenleme işlemi sırasında bir hata oluştu!","2505-".$i); }
        }
    }else{
        $addLangProcess = true;
    }

    if(count($fetchAllCertifica) > 0){
        foreach($fetchAllCertifica as $i => $writeCert){
            if(isset($_POST['certificaName'][$i])){
                if($_POST['certificaName'][$i] != ""){
                    $certificaName = $_POST['certificaName'][$i];
    
                    $editCertifica = $data->prepare("update certificates set
                        certificaName=?
                        where id=?
                    ");
    
                    $editCertificaProcess = $editCertifica->execute(array($certificaName,$writeCert['id']));
                
                    // control process $i = error index
                    if(!$editCertificaProcess){ errorPage($userProfileUrl,"Certifica düzenleme işlemi sırasında bir hata oluştu!","2506.01-".$i); }
                }else{
                    $editCertificaProcess = true;
                }
            }else{
                $deleteCert = $data->prepare("delete from certificates where id=?");
                $deleteCertProcess = $deleteCert->execute(array($writeCert['id']));
                $editCertificaProcess = true;
            }
        }
    }else{
        $editCertificaProcess = true;
    }
    
    if(isset($_POST['certificaName'])){
        if($_POST['certificaName'] > count($fetchAllCertifica)){
            for($i=count($fetchAllCertifica); $i < count($_POST['certificaName']); $i++){
                if($_POST['certificaName'][$i] != ""){
                    $certificaName = $_POST['certificaName'][$i];
    
                    $addCertifica = $data->prepare("insert into certificates set
                        submission_id=?,
                        certificaName=?
                    ");
    
                    $addCertificaProcess = $addCertifica->execute(array($fetchCV['submission_id'],$certificaName));
                
                    // control process $i = error index
                    if(!$addCertificaProcess){ errorPage($userProfileUrl,"Certifica düzenleme işlemi sırasında bir hata oluştu!","2506.02-".$i); }
                }else{
                    $addCertificaProcess = true;
                }
            }
        }else{
            $addCertificaProcess = true;
        }
    }
    

    if(count($fetchAllReferences) > 0){
        foreach($fetchAllReferences as $i => $writeRef){
            if(isset($_POST['refName'][$i])){
                if($_POST['refName'][$i] != ""){
                    $refName = $_POST['refName'][$i];
                    $refJobTitle = $_POST['refJobTitle'][$i];
            
                    $editReference = $data->prepare("update reference set
                        refName=?,
                        refJobTitle=?
                        where id=?
                    ");
    
                    $editReferenceProcess = $editReference->execute(array($refName,$refJobTitle,$writeRef['id']));
        
                    // control process $i = error index
                    if(!$editReferenceProcess){ errorPage($userProfileUrl,"Reference düzenleme işlemi sırasında bir hata oluştu!","2507.01-".$i); }
                }else{
                    $editReferenceProcess = true;
                }
            }else{
                $deleteRef = $data->prepare("delete from reference where id=?");
                $deleteRefProcess = $deleteRef->execute(array($writeRef['id']));
                $editReferenceProcess = true;
            }
        }
    }else{
        $editReferenceProcess = true;
    }
    
    if(isset($_POST['refName'])){
        if($_POST['refName'] > count($fetchAllReferences)){
            for($i=count($fetchAllReferences); $i < count($_POST['refName']); $i++){
                if($_POST['refName'][$i] != ""){
                    $refName = $_POST['refName'][$i];
                    $refJobTitle = $_POST['refJobTitle'][$i];
            
                    $addReference = $data->prepare("insert into reference set
                        submission_id=?,
                        refName=?,
                        refJobTitle=?
                    ");
    
                    $addReferenceProcess = $addReference->execute(array($fetchCV['submission_id'],$refName,$refJobTitle));
        
                    // control process $i = error index
                    if(!$addReferenceProcess){ errorPage($userProfileUrl,"Reference düzenleme işlemi sırasında bir hata oluştu!","2507.02-".$i); }
                }else{
                    $addReferenceProcess = true;
                }
            }
        }else{
            $addReferenceProcess = true;
        }
    }
    

    if($editUsersProcess && $editExpProcess && $editEduProcess && $editLangProcess && $editCertificaProcess && $editReferenceProcess && 
    $editSkillProcess){
        allAddSuccess($siteUrl . "cv/" . $fetchCV['submission_id']);
    }
}


function allAddSuccess($locationPage){
    ?>
    <style>
        .cvCreateForm{
            display:none !important;
        }
    </style>
    <div class="gridArea">
        <div class="successBox">
        <div class="skeleton-card">
            <div class="header">
                <div class="img"></div>
                <div class="details">
                    <span class="name"></span>
                    <span class="about"></span>
                </div>
            </div>
            <div class="grid">
                <div class="description">
                    <div class="line line-1"></div>
                    <div class="line line-2"></div>
                    <div class="line line-3"></div>
                </div>
                <div class="description">
                    <div class="line line-1"></div>
                    <div class="line line-2"></div>
                    <div class="line line-3"></div>
                </div>
            </div>
            <div class="grid">
                <div class="description">
                    <div class="line line-1"></div>
                    <div class="line line-2"></div>
                    <div class="line line-3"></div>
                </div>
                <div class="description">
                    <div class="line line-1"></div>
                    <div class="line line-2"></div>
                    <div class="line line-3"></div>
                </div>
            </div>
            <div class="description">
                <div class="line line-1"></div>
                <div class="line line-2"></div>
                <div class="line line-3"></div>
            </div>
            <div class="grid no_mobile">
                <div class="description">
                    <div class="line line-1"></div>
                    <div class="line line-2"></div>
                    <div class="line line-3"></div>
                </div>
                <div class="description">
                    <div class="line line-1"></div>
                    <div class="line line-2"></div>
                    <div class="line line-3"></div>
                </div>
            </div>
        </div>
        <div class="loadingLine"></div>
        </div>
    </div>
    <?php
    header("refresh: 3; url=$locationPage");
    exit;
}

?>