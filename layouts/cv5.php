<?php !defined("index") ? header("location: ../hata") : null ?>
<div class="cv-area">
    <div class="cv-box cv5">
        <div class="ch-header">
            <div class="row">
                <div class="col-8">
                    <div class="drag-handle dark right handle-row"><i class="bi bi-arrows-move"></i></div>
                    <div class="cv-border-line">
                        <div class="cv-person">
                            <h1 class="cv-name" translate="no"><?= $name; ?></h1>
                            <p class="cv-job"><?= $jobRole; ?></p>
                        </div>
                        <div class="cv-about">
                            <p class="cv-text"><?= $about; ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="drag-handle dark right handle-row"><i class="bi bi-arrows-move"></i></div>
                    <div class="cv-info">
                        <div class="cv-img">
                            <img src="<?= $profile; ?>" alt="profile"></img>
                        </div>
                        <ul class="cv-list" translate="no">
                        <?php getSocialMedia($fetchUser,'icon'); ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="cv-body">
            <div class="row">
                <div class="col-8">
                    <div class="cv-left">
                        <div class="cv-section">
                            <div class="drag-handle dark right"><i class="bi bi-arrows-move"></i></div>
                            <h2 class="cv-title" contenteditable="true">Experience</h2>
                            <div class="cv-step">
                                <?php getExperiences($fetchExpData,"grid"); ?>
                            </div>
                        </div>

                        <?php
                        if(count( $fetchRefData) > 0){
                            ?>
                            <div class="cv-section">
                                <div class="drag-handle dark right"><i class="bi bi-arrows-move"></i></div>
                                <h2 class="cv-title" contenteditable="true">References</h2>
                                <div class="cv-step">
                                    <?php getReferences($fetchRefData,"grid"); ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                    </div>
                </div>

                <div class="col-4">
                    <div class="cv-right">
                    
                        <div class="cv-section">
                            <div class="drag-handle dark right"><i class="bi bi-arrows-move"></i></div>
                            <h2 class="cv-title" contenteditable="true">Skills</h2>
                            <ul class="cv-list level-list">
                                <?php getSkills($fetchSkillData,'span'); ?>
                            </ul>
                        </div>

                        <div class="cv-section">
                            <div class="drag-handle dark right"><i class="bi bi-arrows-move"></i></div>
                            <h2 class="cv-title" contenteditable="true">Languages</h2>
                            <ul class="cv-list level-list">
                                <?php getLanguages($fetchLangData,'span'); ?>
                            </ul>
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

                        <div class="cv-section">
                            <div class="drag-handle dark right"><i class="bi bi-arrows-move"></i></div>
                            <h2 class="cv-title" contenteditable="true">Education</h2>
                            <div class="cv-step">
                                <?php getEducations($fetchEduData,""); ?>
                            </div>
                        </div>

                    </div>
                </div>
                
            </div>
        </div>

    </div>
</div>