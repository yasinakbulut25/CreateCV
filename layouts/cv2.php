<?php !defined("index") ? header("location: ../hata") : null ?>
<div class="cv-area">
    <div class="cv-box cv2">
        <div class="cv-body">
            <div class="row">
                <div class="col-4">
                    <div class="cv-left">
                        <div class="cv-img">
                            <img src="<?= $profile; ?>" alt="profile"></img>
                        </div>

                        <div class="cv-section">
                            <h2 class="cv-title">Personal</h2>
                            <ul class="cv-list">
                            <?php
                                $address ? $addressList = '<li><p class="m-0 cv-text"><strong>Address</strong></p> <span class="m-0 cv-text-small">'.$address.'</span></li>' : $addressList = "";
                                $email ? $emailList = '<li><p class="m-0 cv-text"><strong>Email</strong></p> <span class="m-0 cv-text-small">'.$email.'</span></li>' : $emailList = "";
                                $phoneNumber ? $phoneNumberList = '<li><p class="m-0 cv-text"><strong>Telephone</strong></p> <span class="m-0 cv-text-small">'.$phoneNumber.'</span></li>' : $phoneNumberList = "";
                                $instagram ? $instagramList = '<li><p class="m-0 cv-text"><strong>Instagram</strong></p> <span class="m-0 cv-text-small">'.$instagram.'</span></li>' : $instagramList = "";
                                $twitter ? $twitterList = '<li><p class="m-0 cv-text"><strong>Twitter</strong></p> <span class="m-0 cv-text-small">'.$twitter.'</span></li>' : $twitterList = "";
                                $linkedin ? $linkedinList = '<li><p class="m-0 cv-text"><strong>Linkedin</strong></p> <span class="m-0 cv-text-small">'.$linkedin.'</span></li>' : $linkedinList = "";
                                $facebook ? $facebookList = '<li><p class="m-0 cv-text"><strong>Facebook</strong></p> <span class="m-0 cv-text-small">'.$facebook.'</span></li>' : $facebookList = "";
                                $github ? $githubList = '<li><p class="m-0 cv-text"><strong>Github</strong></p> <span class="m-0 cv-text-small">'.$github.'</span></li>' : $githubList = "";
                                $webSite ? $webSiteList = '<li><p class="m-0 cv-text"><strong>Web Site</strong></p> <span class="m-0 cv-text-small">'.$webSite.'</span></li>' : $webSiteList = "";

                                echo $addressList . $emailList . $phoneNumberList . $instagramList . $twitterList . $linkedinList . $facebookList . $githubList . $webSiteList;
                           ?>
                            </ul>
                        </div>

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
                                    <?php getCertificates($fetchCertData,"caret-right"); ?>
                                </ul>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                </div>
                <div class="col-8">
                    <div class="cv-right">
                        <div class="cv-person">
                            <h1 class="cv-name"><?= $name ?></h1>
                            <p class="cv-text"><?= $about; ?></p>
                        </div>

                        <div class="cv-section">
                            <h2 class="cv-title">Experience</h2>
                            <div class="cv-step">
                                <?php getExperiences($fetchExpData,""); ?>
                            </div>
                        </div>

                        <div class="cv-section">
                            <h2 class="cv-title">Education</h2>
                            <div class="cv-step">
                                <?php getEducations($fetchEduData,""); ?>
                            </div>
                        </div>

                        <?php
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