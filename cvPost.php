<?php !defined("index") ? header("location: demo") : null ?>

<?php

if(isset($_POST['createCV'])){
    function ChangeImagesName($changeName,$subId){
        $randomNumber = rand(1000,9999);
        $changeName = explode(".",$changeName);
        $newChangeName = $subId . "." . $changeName[1];
        return $newChangeName;
    }

    // ***** submission id kontrol et
    $randomNumber_1 = rand(1000,9999);
    $randomNumber_2 = rand(1000,9999);
    $randomNumber_3 = rand(1000,9999);
    $randomNumber_4 = rand(1000,9999);

    $submission_id = $randomNumber_1 . $randomNumber_2 . $randomNumber_3 . $randomNumber_4;

    function ControlSubmissionId($subId,$data){
        $subIdControl = $data->prepare("SELECT * FROM users where submission_id=?");
        $subIdControl->execute(array($subId));
        $fetch = $subIdControl->fetch();
        if($subIdControl->rowCount()){
            $randomNumber_1 = rand(1000,9999);
            $randomNumber_2 = rand(1000,9999);
            $randomNumber_3 = rand(1000,9999);
            $randomNumber_4 = rand(1000,9999);

            $subId = $randomNumber_1 . $randomNumber_2 . $randomNumber_3 . $randomNumber_4;
            ControlSubmissionId($subId,$data);
        }
        return $subId;
    }

    if(isset($_SESSION['user'])){
        $submissionUserName = $_SESSION['user'];
        $userLocationUrl = $siteUrl . "profile/" . $_SESSION['user'];
    }else{
        $submissionUserName = "";
        $userLocationUrl = $siteUrl;
    }

    $submission_id = ControlSubmissionId($submission_id,$data);

    $fileName = $_FILES["profile"]["name"];
    $fileName =  ChangeImagesName($fileName,$submission_id);
    $newFileName = "assets/img/profiles/" . $fileName;

    if ($_FILES["profile"]["type"] == "image/jpeg" || $_FILES["profile"]["type"] == "image/png" || $_FILES["profile"]["type"] == "image/svg+xml" || $_FILES["profile"]["type"] == "image/webp") {
        if (move_uploaded_file($_FILES["profile"]["tmp_name"], "./" . $newFileName)) {
            
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

            $addUsers = $data->prepare("insert into users set
                    username=?,
                    submission_id=?,
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
            ");

            $addUsersProcess = $addUsers->execute(array($submissionUserName,$submission_id,$newFileName,$name,$jobRole,$phoneNumber,$address,$email,$webSite,$about,$instagram,$twitter,$linkedin,$facebook,$github,$medium));
            
            // control process
            if(!$addUsersProcess){ errorPage($siteUrl,"User düzenleme işlemi sırasında bir hata oluştu!","2501"); }
            
            for($i=0; $i < count($_POST['expJobRole']); $i++){
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

                $addExpProcess = $addExp->execute(array($submission_id,$expJobRole,$expCompanyName,$expStartingYear,$expEndingYear,$expJobDescription));
                
                // control process $i = error index
                if(!$addExpProcess){ errorPage($siteUrl,"Experience düzenleme işlemi sırasında bir hata oluştu!","2502-".$i); }
            }
        
            for($i=0; $i < count($_POST['eduSchool']); $i++){
                $eduSchool = $_POST['eduSchool'][$i];
                $eduStartingYear = $_POST['eduStartingYear'][$i];
                $eduEndingYear = $_POST['eduEndingYear'][$i];
        
                $addEdu = $data->prepare("insert into educations set
                    submission_id=?,
                    eduSchool=?,
                    eduStartingYear=?,
                    eduEndingYear=?
                ");

                $addEduProcess = $addEdu->execute(array($submission_id,$eduSchool,$eduStartingYear,$eduEndingYear));
        
                // control process $i = error index
                if(!$addEduProcess){ errorPage($siteUrl,"Education düzenleme işlemi sırasında bir hata oluştu!","2503-".$i); }
            }
        
            for($i=0; $i < count($_POST['skillName']); $i++){
                $skillName = $_POST['skillName'][$i];
                $skillLevel = $_POST['skillLevel'][$i];
        
                $addSkill = $data->prepare("insert into skills set
                    submission_id=?,
                    skillName=?,
                    skillLevel=?
                ");

                $addSkillProcess = $addSkill->execute(array($submission_id,$skillName,$skillLevel));
               
                // control process $i = error index
                if(!$addSkillProcess){ errorPage($siteUrl,"Skill düzenleme işlemi sırasında bir hata oluştu!","2504-".$i); }
            }
        
            for($i=0; $i < count($_POST['langName']); $i++){
                $langName = $_POST['langName'][$i];
                $langLevel = $_POST['langLevel'][$i];
        
                $addLang = $data->prepare("insert into languages set
                    submission_id=?,
                    langName=?,
                    langLevel=?
                ");

                $addLangProcess = $addLang->execute(array($submission_id,$langName,$langLevel));
        
                // control process $i = error index
                if(!$addLangProcess){ errorPage($siteUrl,"Language düzenleme işlemi sırasında bir hata oluştu!","2505-".$i); }
            }
        
            if(isset($_POST['certificaName'])){
                for($i=0; $i < count($_POST['certificaName']); $i++){
                    if($_POST['certificaName'][$i] != ""){
                        $certificaName = $_POST['certificaName'][$i];
        
                        $addCertifica = $data->prepare("insert into certificates set
                            submission_id=?,
                            certificaName=?
                        ");
    
                        $addCertificaProcess = $addCertifica->execute(array($submission_id,$certificaName));
                    
                        // control process $i = error index
                        if(!$addCertificaProcess){ errorPage($siteUrl,"Certifica düzenleme işlemi sırasında bir hata oluştu!","2506-".$i); }
                    }else{
                        $addCertificaProcess = true;
                    }
                }
            }
        
            if(isset($_POST['refName'])){
                for($i=0; $i < count($_POST['refName']); $i++){
                    if($_POST['refName'][$i] != ""){
                        $refName = $_POST['refName'][$i];
                        $refJobTitle = $_POST['refJobTitle'][$i];
                
                        $addReference = $data->prepare("insert into reference set
                            submission_id=?,
                            refName=?,
                            refJobTitle=?
                        ");
    
                        $addReferenceProcess = $addReference->execute(array($submission_id,$refName,$refJobTitle));
            
                        // control process $i = error index
                        if(!$addReferenceProcess){ errorPage($siteUrl,"Reference düzenleme işlemi sırasında bir hata oluştu!","2507-".$i); }
                    }else{
                        $addReferenceProcess = true;
                    }
                }
            }

            if($addUsersProcess && $addExpProcess && $addEduProcess && $addLangProcess && $addCertificaProcess && $addReferenceProcess && $addSkillProcess){
                allAddSuccess($siteUrl . "cv/" . $submission_id);
            }

        }else{
            errorPage($siteUrl,"File düzenleme işlemi sırasında bir hata oluştu!","2508");
        }
    }else{
        errorPage($siteUrl,"File düzenleme işlemi sırasında bir hata oluştu!","2509");
    }

}

function allAddSuccess($locationPage){
    ?>
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
    <script>
        const resumes = ["cv1","cv2","cv3","cv4","cv5","cv6"];
        resumes.forEach(element => {
            localStorage.removeItem("orderRight-" + element);
            localStorage.removeItem("orderLeft-" + element);
            localStorage.removeItem("orderRow");
            localStorage.removeItem("viewCv");
        });
    </script>
    <?php
    header("refresh: 3; url=$locationPage");
    exit;
}

?>