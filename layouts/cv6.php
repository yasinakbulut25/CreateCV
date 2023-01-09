<?php !defined("index") ? header("location: ../hata") : null ?>
<div class="cv-area">
    <div class="cv-box cv6">
        <div class="cv-body">
            <div class="row">
                <div class="col-5">
                    <div class="cv-left">
                        
                        <div class="cv-section">
                            <div class="drag-handle dark right"><i class="bi bi-arrows-move"></i></div>
                            <div class="cv-img">
                                <img src="<?= $profile; ?>" alt="profile">
                            </div>
                            <div class="cv-person">
                                <h1 class="cv-name" translate="no"><?= $name; ?></h1>
                                <p class="cv-job m-0"><?= $jobRole; ?></p>
                            </div>
                        </div>

                        <div class="cv-section">
                            <div class="drag-handle dark right"><i class="bi bi-arrows-move"></i></div>
                            <h2 class="cv-title" contenteditable="true">Contact</h2>
                            <ul class="cv-list" translate="no">
                            <?php getSocialMedia($fetchUser,'icon'); ?>
                            </ul>
                        </div>

                        <div class="cv-section">
                            <div class="drag-handle dark right"><i class="bi bi-arrows-move"></i></div>
                            <h2 class="cv-title" contenteditable="true">Languages</h2>
                            <ul class="cv-list level-list">
                                <?php getLanguages($fetchLangData,'span'); ?>
                            </ul>
                        </div>

                        <div class="cv-section">
                            <div class="drag-handle dark right"><i class="bi bi-arrows-move"></i></div>
                            <h2 class="cv-title" contenteditable="true">Education</h2>
                            <div class="cv-step">
                                <?php getEducations($fetchEduData,""); ?>
                            </div>
                        </div>
                        
                        <?php
                        if(count( $fetchCertData) > 0){
                            ?>
                             <div class="cv-section">
                                <div class="drag-handle dark right"><i class="bi bi-arrows-move"></i></div>
                                <h2 class="cv-title" contenteditable="true">Certificates</h2>
                                <ul class="cv-list">
                                    <?php getCertificates($fetchCertData,"caret-right"); ?>
                                </ul>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                </div>
                <div class="col-7">
                    <div class="cv-right">
                        <div class="cv-section">
                            <div class="drag-handle dark right"><i class="bi bi-arrows-move"></i></div>
                            <h1 class="cv-title" contenteditable="true">About</h1>
                            <p class="cv-text"><?= $about; ?></p> 
                        </div>

                        <div class="cv-section">
                            <div class="drag-handle dark right"><i class="bi bi-arrows-move"></i></div>
                            <h2 class="cv-title" contenteditable="true">Experience</h2>
                            <div class="cv-step">
                                <?php getExperiences($fetchExpData,""); ?>
                            </div>
                        </div>

                        <div class="cv-section">
                            <div class="drag-handle dark right"><i class="bi bi-arrows-move"></i></div>
                            <h2 class="cv-title" contenteditable="true">Skills</h2>
                            <ul class="cv-list level-list">
                                <?php getSkills($fetchSkillData,'span'); ?>
                            </ul>
                        </div>

                        <?php
                        if(count( $fetchRefData) > 0){
                            ?>
                            <div class="cv-section">
                                <div class="drag-handle dark right"><i class="bi bi-arrows-move"></i></div>
                                <h2 class="cv-title" contenteditable="true">References</h2>
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