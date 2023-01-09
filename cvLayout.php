<?php !defined("index") ? header("location: demo") : null ?>

<?php
    
    if(@$_GET['content']){
        $submission_id = $_GET['content'];

        $findUser = $data->prepare("SELECT * FROM users where submission_id = ? limit 1");
        $findUser->execute(array($submission_id));
        $fetchUser = $findUser->fetch();

        if(isset($_SESSION['user'])){
            $sessionUser = $_SESSION['user'];
        }else{
            $sessionUser = "";
        }

        if($findUser->rowCount()){

            if($fetchUser['username'] == $sessionUser){
                $profile = $fetchUser['profile'];
                $name = $fetchUser['name'];
                $jobRole = $fetchUser['jobRole'];
                $phoneNumber = $fetchUser['phoneNumber'];
                $address = $fetchUser['address'];
                $email = $fetchUser['email'];
                $webSite = $fetchUser['webSite'];
                $about = $fetchUser['about'];
                $instagram = $fetchUser['instagram'];
                $twitter = $fetchUser['twitter'];
                $linkedin = $fetchUser['linkedin'];
                $facebook = $fetchUser['facebook'];
                $github = $fetchUser['github'];
                $medium = $fetchUser['medium'];
    
                // experiences
                $getExpData = $data->prepare("SELECT * FROM experiences where submission_id=?");
                $getExpData->execute(array($submission_id));
                $fetchExpData = $getExpData->fetchAll(PDO::FETCH_ASSOC);
    
                // educations
                $getEduData = $data->prepare("SELECT * FROM educations where submission_id=?");
                $getEduData->execute(array($submission_id));
                $fetchEduData = $getEduData->fetchAll(PDO::FETCH_ASSOC);
    
                // skills
                $getSkillData = $data->prepare("SELECT * FROM skills where submission_id=?");
                $getSkillData->execute(array($submission_id));
                $fetchSkillData = $getSkillData->fetchAll(PDO::FETCH_ASSOC);
    
                // certificates
                $getCertData = $data->prepare("SELECT * FROM certificates where submission_id=?");
                $getCertData->execute(array($submission_id));
                $fetchCertData = $getCertData->fetchAll(PDO::FETCH_ASSOC);
    
                // reference
                $getRefData = $data->prepare("SELECT * FROM reference where submission_id=?");
                $getRefData->execute(array($submission_id));
                $fetchRefData = $getRefData->fetchAll(PDO::FETCH_ASSOC);
    
                // languages
                $getLangData = $data->prepare("SELECT * FROM languages where submission_id=?");
                $getLangData->execute(array($submission_id));
                $fetchLangData = $getLangData->fetchAll(PDO::FETCH_ASSOC);
            }else{
                errorPage($siteUrl,"Erişim hatası!","5501");
                header("refresh: 3; url=$siteUrl");
                return;
            }
            
        }else{
            errorPage($siteUrl,"Kullanıcı bulunamadı!","5502");
            return;
        }
    }else{
        include "dummy.php";
    }

    // If a cv theme option is added here, it must also be added to the colors array in the scripts.js file.
    $cvThemes = array("cv1","cv2","cv3","cv4","cv5","cv6");
?>


    <div class="cv-area">
        <div class="dark-mode-check">
            <button class="dark-mode-label" onclick="toggle_light_mode()">
                <i class='bi bi-sun'></i>
                <i class="bi bi-moon"></i>
                <div class='ball'></div>
            </button>
        </div>

        <label onclick="openSidebar()" class="side-label"><i class="bi bi-arrow-left"></i></label>

        <div class="cv-side">
            <div class="color-picker">
                <!-- Generating color labels in js -->
                <button onclick="window.print()" class="print_btn"><i class="bi bi-printer"></i></button>
            </div>

            <div translate="no" class="font-picker">
                <label onclick="openFontList()" class="font-select-label"><span>Choose Font</span> <i class="bi bi-triangle-fill"></i></label>
                <div class="font-select-list">
                    <!-- Generating font labels in js -->
                </div>
                
                <div class="lang-picker" id="google_element">
                    <i class="bi bi-triangle-fill" id="googleElementIcon"></i>
                </div> 
            </div> 

            
                
            <div class="layout-picker light">
                <?php
                    foreach($cvThemes as $itemCv){
                        ?>
                        <label onclick="viewCV('<?= $itemCv ?>')" class="layout-label <?= $itemCv ?>"><img src="./assets/img/cv/<?= $itemCv ?>.png" alt="<?= $itemCv ?> Template"/></label>
                        <?php
                    }
                ?>
            </div> 
            
            <div class="layout-picker dark">
                <?php
                    foreach($cvThemes as $itemCv){
                        ?>
                        <label onclick="viewCV('<?= $itemCv ?>')" class="layout-label <?= $itemCv ?>"><img src="./assets/img/cv/<?= $itemCv ?>_dark.png" alt="<?= $itemCv ?> Template"/></label>
                        <?php
                    }
                ?>
            </div>  
        </div>

        
        <?php
            if(!@$_GET['content']){
                isset($_SESSION['user']) ? $formUrl = $siteUrl . "form/" . $_SESSION['user'] : $formUrl = $siteUrl . "form";
                ?>
                <div translate="no" class="formLinkArea">
                    <div class="formLinkBox">
                        <h1>Ücretsiz CV Oluştur!</h1>
                        <p>Bilgilerini girerek özgeçmişini kolayca oluştur ve dilediğin gibi özelleştir!</p>
                        <a href="<?= $formUrl ?>" class="formLinkText">
                            <span>ÜCRETSİZ DENE!</span>
                        </a>
                    </div>
                </div>
                <?php
            }
            foreach($cvThemes as $itemCv){
                ?>
                <div class="view-cv <?= $itemCv; ?>">
                    <?php include "./layouts/".$itemCv.".php"; ?>
                </div>
                <?php
            }
        ?>

    </div>
    <script src="./assets/js/script.js"></script>

    <!-- Google Translate -->
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script>
        function googleTranslateElementInit(){
            new google.translate.TranslateElement({
                defaultLanguage: "tr",
                pageLanguage: "tr",
                // includedLanguages: "tr,ar,az,zh,es,ko,pt,ru,en,de,fr,it",
                layout: google.translate.TranslateElement.InlineLayout.VERTICAL,
                autoDisplay: false,
                multiLanguagePage: true
            },
            "google_element",
            );
        }
    </script>
