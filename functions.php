<?php !defined("index") ? header("location: demo") : null ?>

<?php

    function getSocialMedia($fetchUser,$writeType){
         if($writeType == "icon"){
             
            $fetchUser['address'] ? $addressList = '<li><span><i class="bi bi-geo-alt"></i> '.$fetchUser['address'].'</span></li>' : $addressList = "";
            $fetchUser['email'] ? $emailList = '<li><span><i class="bi bi-envelope"></i> '.$fetchUser['email'].'</span></li>' : $emailList = "";
            $fetchUser['phoneNumber'] ? $phoneNumberList = '<li><span><i class="bi bi-phone"></i> '.$fetchUser['phoneNumber'].'</span></li>' : $phoneNumberList = "";
            $fetchUser['instagram'] ? $instagramList = '<li><span><i class="bi bi-instagram"></i> '.$fetchUser['instagram'].'</span></li>' : $instagramList = "";
            $fetchUser['twitter'] ? $twitterList = '<li><span><i class="bi bi-twitter"></i> '.$fetchUser['twitter'].'</span></li>' : $twitterList = "";
            $fetchUser['linkedin'] ? $linkedinList = '<li><span><i class="bi bi-linkedin"></i> '.$fetchUser['linkedin'].'</span></li>' : $linkedinList = "";
            $fetchUser['facebook'] ? $facebookList = '<li><span><i class="bi bi-facebook"></i> '.$fetchUser['facebook'].'</span></li>' : $facebookList = "";
            $fetchUser['github'] ? $githubList = '<li><span><i class="bi bi-github"></i> '.$fetchUser['github'].'</span></li>' : $githubList = "";
            $fetchUser['webSite'] ? $webSiteList = '<li><span><i class="bi bi-link"></i> '.$fetchUser['webSite'].'</span></li>' : $webSiteList = "";
            $fetchUser['medium'] ? $mediumList = '<li><span><i class="bi bi-medium"></i> '.$fetchUser['medium'].'</span></li>' : $mediumList = "";
            
            echo $addressList . $emailList . $phoneNumberList . $instagramList . $twitterList . $linkedinList . $facebookList . $githubList . $mediumList . $webSiteList;
            
        }else if($writeType == "strong"){
            
            $fetchUser['address'] ? $addressList = '<li><p class="m-0 cv-text"><strong>Address</strong></p> <span class="m-0 cv-text-small">'.$fetchUser['address'].'</span></li>' : $addressList = "";
            $fetchUser['email'] ? $emailList = '<li><p class="m-0 cv-text"><strong>Email</strong></p> <span class="m-0 cv-text-small">'.$fetchUser['email'].'</span></li>' : $emailList = "";
            $fetchUser['phoneNumber'] ? $phoneNumberList = '<li><p class="m-0 cv-text"><strong>Telephone</strong></p> <span class="m-0 cv-text-small">'.$fetchUser['phoneNumber'].'</span></li>' : $phoneNumberList = "";
            $fetchUser['instagram'] ? $instagramList = '<li><p class="m-0 cv-text"><strong>Instagram</strong></p> <span class="m-0 cv-text-small">'.$fetchUser['instagram'].'</span></li>' : $instagramList = "";
            $fetchUser['twitter'] ? $twitterList = '<li><p class="m-0 cv-text"><strong>Twitter</strong></p> <span class="m-0 cv-text-small">'.$fetchUser['twitter'].'</span></li>' : $twitterList = "";
            $fetchUser['linkedin'] ? $linkedinList = '<li><p class="m-0 cv-text"><strong>Linkedin</strong></p> <span class="m-0 cv-text-small">'.$fetchUser['linkedin'].'</span></li>' : $linkedinList = "";
            $fetchUser['facebook'] ? $facebookList = '<li><p class="m-0 cv-text"><strong>Facebook</strong></p> <span class="m-0 cv-text-small">'.$fetchUser['facebook'].'</span></li>' : $facebookList = "";
            $fetchUser['github'] ? $githubList = '<li><p class="m-0 cv-text"><strong>Github</strong></p> <span class="m-0 cv-text-small">'.$fetchUser['github'].'</span></li>' : $githubList = "";
            $fetchUser['webSite'] ? $webSiteList = '<li><p class="m-0 cv-text"><strong>Web Site</strong></p> <span class="m-0 cv-text-small">'.$fetchUser['webSite'].'</span></li>' : $webSiteList = "";
            $fetchUser['medium'] ? $mediumList = '<li><p class="m-0 cv-text"><strong>Medium</strong></p> <span class="m-0 cv-text-small">'.$fetchUser['medium'].'</span></li>' : $mediumList = "";
           
           echo $addressList . $emailList . $phoneNumberList . $instagramList . $twitterList . $linkedinList . $facebookList . $githubList . $mediumList . $webSiteList;
        }
    }

    function getExperiences($fetchExpData,$writeType){
        if($writeType == "grid"){
            foreach($fetchExpData as $key => $item){
                echo '
                <div class="cv-step-row">
                    <div class="cv-step-text">
                        <div class="cv-step-grid">
                            <strong class="cv-step-title">'.$item['expJobRole'].'</strong>
                            <p class="cv-step-subtitle m-0">'.$item['expCompanyName'].' | '.$item['expStartingYear'].' - '.$item['expEndingYear'].'</p>
                        </div>
                        <p class="cv-text-small m-0">'.$item['expJobDescription'].'</p>
                    </div>
                </div>
                ';
            }
        }else{
            foreach($fetchExpData as $key => $item){
                echo '
                    <div class="cv-step-row">
                        <div class="cv-step-text">
                            <strong class="cv-step-title">'.$item['expJobRole'].'</strong>
                            <p class="cv-step-subtitle m-0">'.$item['expCompanyName'].' | '.$item['expStartingYear'].' - '.$item['expEndingYear'].'</p>
                            <p class="cv-text-small m-0">'.$item['expJobDescription'].'</p>
                        </div>
                    </div>
                ';
            }
        }
        
    }

    function getEducations($fetchEduData,$writeType){
        if($writeType == "grid"){
            foreach($fetchEduData as $key => $item){
                echo '
                    <div class="cv-step-row">
                        <div class="cv-step-text">
                            <div class="cv-step-grid">
                                <strong class="cv-step-title">'.$item['eduSchool'].'</strong>
                                <p class="cv-step-subtitle m-0">'.$item['eduStartingYear'].' - '.$item['eduEndingYear'].'</p>
                            </div>
                        </div>
                    </div>
                ';
            }
        }else{
            foreach($fetchEduData as $key => $item){
                echo '
                    <div class="cv-step-row">
                        <div class="cv-step-text">
                            <strong class="cv-step-title">'.$item['eduSchool'].'</strong>
                            <p class="cv-step-subtitle m-0">'.$item['eduStartingYear'].' - '.$item['eduEndingYear'].'</p>
                        </div>
                    </div>
                ';
            }
        }
        
    }

    function getSkills($fetchSkillData,$tagName){
        foreach($fetchSkillData as $key => $item){
            echo '
                <li>
                    <'.$tagName.'>'.$item['skillName'].'</'.$tagName.'>
                    <div class="level-bar">
                        <div class="level" style="width: '.$item['skillLevel'].'%;"></div>
                    </div>
                </li>
            ';
        }
    }

    function getCertificates($fetchCertData,$iconType){
        foreach($fetchCertData as $key => $item){
            echo '
                <li><i class="bi bi-'.$iconType.'"></i> '.$item['certificaName'].'</li>
            ';
        }
    }

    function getReferences($fetchRefData,$writeType){
        if($writeType == "grid"){
            foreach($fetchRefData as $key => $item){
                echo '
                    <div class="cv-step-row">
                        <div class="cv-step-text">
                            <strong class="cv-step-title">'.$item['refName'].'</strong>
                            <p class="cv-step-subtitle m-0">'.$item['refJobTitle'].'</p>
                        </div>
                    </div>
                ';
            }
        }else{
            foreach($fetchRefData as $key => $item){
                echo '
                    <div class="cv-step-row">
                        <div class="cv-step-text">
                            <strong class="cv-step-title">'.$item['refName'].'</strong>
                            <p class="cv-step-subtitle m-0">'.$item['refJobTitle'].'</p>
                        </div>
                    </div>
                ';
            }
        }
        
    }

    function getLanguages($fetchLangData,$tagName){
        foreach($fetchLangData as $key => $item){
            echo '
                <li>
                    <'.$tagName.'>'.$item['langName'].'</'.$tagName.'>
                    <div class="level-bar">
                        <div class="level" style="width: '.$item['langLevel'].'%;"></div>
                    </div>
                </li>
            ';
        }
    }

    function errorPage($locationUrl,$errorMessage,$errorCode){
        ?>
        <div class="gridArea">
            <div class="errorBox">
                <div class="errorIconBox">
                    <i class="bi bi-x"></i>   
                </div>
                <div class="errorMessage">
                    <p><?= $errorMessage ?></p>
                    <p>Hata Kodu: <span><?= $errorCode ?></span></p>
                    <a class="link-btn red" href="<?= $locationUrl ?>">Geri Dön <i class="bi bi-backspace"></i></a>
                </div>
            </div>
        </div>
        <?php
        exit;
    }

    function successPage($locationUrl,$successMessage){
        ?>
        <div class="gridArea">
            <div class="successBox">
                <div class="successIconBox">
                    <i class="bi bi-check"></i>   
                </div>
                <div class="successMessage">
                    <p><?= $successMessage ?></p>
                    <a class="link-btn red" href="<?= $locationUrl ?>">Geri Dön <i class="bi bi-backspace"></i></a>
                </div>
            </div>
        </div>
        <?php
        exit;
    }


?>