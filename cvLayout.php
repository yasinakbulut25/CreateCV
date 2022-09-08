<?php !defined("index") ? header("location: hata") : null ?>
<?php
    
    include "functions.php";

    if(@$_GET['page']){
            
        $submission_id = $_GET['page'];

        $findUser = $data->prepare("SELECT * FROM users where submission_id = ? limit 1");
        $findUser->execute(array($submission_id));
        $fetchUser = $findUser->fetch();

        if($findUser->rowCount()){
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
            ?>
            <div class="gridArea">
                <div class="errorBox">
                    <div class="errorIconBox">
                        <i class="bi bi-x"></i>   
                    </div>
                    <div class="errorMessage">
                        <p>User Not Found!</p>
                    </div>
                </div>
            </div>
            <?php
            header("refresh: 3; url=$siteUrl");
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
                <i class="bi bi-moon"></i>
                <i class='bi bi-sun'></i>
                <div class='ball'></div>
            </button>
        </div>

        <label onclick="openSidebar()" class="side-label"><i class="bi bi-arrow-left"></i></label>

        <div class="cv-side">
            <div class="color-picker">
                <!-- Generating color labels in js -->
                <button onclick="window.print()" class="print_btn"><i class="bi bi-printer"></i></button>
            </div>

            <div class="font-picker">
                <label onclick="openFontList()" class="font-select-label">Choose Font <i class="bi bi-arrow-down"></i></label>
                <div class="font-select-list">
                    <!-- Generating font labels in js -->
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
            if(!@$_GET['page']){
                ?>
                <div class="formLinkArea">
                    <div class="formLinkBox">
                        <h1>Create Your CV!</h1>
                        <p>Enter your information and easily create your resume for free!</p>
                        <a href="form" class="formLinkText">
                            <span>Try Now for Free!</span>
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
