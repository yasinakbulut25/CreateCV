<?php !defined("index") ? header("location: hata") : null ?>
<?php

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

?>