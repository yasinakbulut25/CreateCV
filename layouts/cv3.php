<?php !defined("index") ? header("location: ../hata") : null ?>
<div class="cv-area">
    <div class="cv-box cv3">
        <div class="cv-header">
            <div class="cv-img">
                <img src="<?= $profile; ?>" alt="profile"></img>
            </div>
            <div class="cv-person">
                <h1 class="cv-name"><?= $name; ?></h1>
                <p class="cv-job"><?= $jobRole; ?></p>
                <ul class="cv-list">
                <?php
                    $address ? $addressList = '<li><a href=""><i class="bi bi-geo-alt"></i> '.$address.'</a></li>' : $addressList = "";
                    $email ? $emailList = '<li><a href=""><i class="bi bi-envelope"></i> '.$email.'</a></li>' : $emailList = "";
                    $phoneNumber ? $phoneNumberList = '<li><a href=""><i class="bi bi-phone"></i> '.$phoneNumber.'</a></li>' : $phoneNumberList = "";
                    $instagram ? $instagramList = '<li><a href=""><i class="bi bi-instagram"></i> '.$instagram.'</a></li>' : $instagramList = "";
                    $twitter ? $twitterList = '<li><a href=""><i class="bi bi-twitter"></i> '.$twitter.'</a></li>' : $twitterList = "";
                    $linkedin ? $linkedinList = '<li><a href=""><i class="bi bi-linkedin"></i> '.$linkedin.'</a></li>' : $linkedinList = "";
                    $facebook ? $facebookList = '<li><a href=""><i class="bi bi-facebook"></i> '.$facebook.'</a></li>' : $facebookList = "";
                    $github ? $githubList = '<li><a href=""><i class="bi bi-github"></i> '.$github.'</a></li>' : $githubList = "";
                    $webSite ? $webSiteList = '<li><a href=""><i class="bi bi-link"></i> '.$webSite.'</a></li>' : $webSiteList = "";

                    echo $addressList . $emailList . $phoneNumberList . $instagramList . $twitterList . $linkedinList . $facebookList . $githubList . $webSiteList;
                ?>
                </ul>
            </div>
        </div>

        <div class="cv-body">
            <div class="row">

            <div class="col-8">
                    <div class="cv-left">

                        <div class="cv-section">
                            <h2 class="cv-title">About</h2>
                            <p class="cv-text"><?= $about; ?></p>
                        </div>
                        
                        <div class="cv-section">
                            <h2 class="cv-title">Experience</h2>
                            <div class="cv-step">
                                <?php getExperiences($fetchExpData,"grid"); ?>
                            </div>
                        </div>

                        <div class="cv-section">
                            <h2 class="cv-title">Education</h2>
                            <div class="cv-step">
                                <?php getEducations($fetchEduData,"grid"); ?>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-4">
                    <div class="cv-right">
                    
                        <div class="cv-section">
                            <h2 class="cv-title">Skills</h2>
                            <ul class="cv-list level-list">
                                <?php getSkills($fetchSkillData,'strong'); ?>
                            </ul>
                        </div>

                        <div class="cv-section">
                            <h2 class="cv-title">Languages</h2>
                            <ul class="cv-list level-list">
                                <?php getLanguages($fetchLangData,'strong'); ?>
                            </ul>
                        </div>

                        <?php
                        if(count( $fetchCertData) > 0){
                            ?>
                             <div class="cv-section">
                                <h2 class="cv-title">Certificates</h2>
                                <ul class="cv-list">
                                    <?php getCertificates($fetchCertData,"caret-right-fill"); ?>
                                </ul>
                            </div>
                            <?php
                        }

                        if(count( $fetchRefData) > 0){
                            ?>
                            <div class="cv-section">
                                <h2 class="cv-title">References</h2>
                                <div class="cv-step">
                                    <?php getReferences($fetchRefData,""); ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                </div>
                
            </div>
        </div>

    </div>
</div>