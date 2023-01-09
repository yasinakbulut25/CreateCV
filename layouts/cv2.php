<?php !defined("index") ? header("location: ../hata") : null ?>
<div class="cv-area">
    <div class="cv-box cv2">
        <div class="cv-body">
            <div class="row">
                <div class="col-4">
                    <div class="drag-handle light right handle-row"><i class="bi bi-arrows-angle-expand"></i></div>
                    <div class="cv-left">
                        <div class="cv-img">
                            <img src="<?= $profile; ?>" alt="profile"></img>
                        </div>

                        <div class="cv-section">
                            <div class="drag-handle light right"><i class="bi bi-arrows-move"></i></div>
                            <h2 class="cv-title" contenteditable="true">Personal</h2>
                            <ul class="cv-list" translate="no">
                            <?php getSocialMedia($fetchUser,'strong'); ?>
                            </ul>
                        </div>

                        <div class="cv-section">
                            <div class="drag-handle light right"><i class="bi bi-arrows-move"></i></div>
                            <h2 class="cv-title" contenteditable="true">Skills</h2>
                            <ul class="cv-list level-list">
                                <?php getSkills($fetchSkillData,'strong'); ?>
                            </ul>
                        </div>

                        <div class="cv-section">
                            <div class="drag-handle light right"><i class="bi bi-arrows-move"></i></div>
                            <h2 class="cv-title" contenteditable="true">Languages</h2>
                            <ul class="cv-list level-list">
                                <?php getLanguages($fetchLangData,'strong'); ?>
                            </ul>
                        </div>

                        <?php
                        if(count( $fetchCertData) > 0){
                            ?>
                             <div class="cv-section">
                                <div class="drag-handle light right"><i class="bi bi-arrows-move"></i></div>
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
                <div class="col-8">
                    <div class="drag-handle dark right handle-row"><i class="bi bi-arrows-angle-expand"></i></div>
                    <div class="cv-right">
                        <div class="cv-person">
                            <div class="drag-handle dark right"><i class="bi bi-arrows-move"></i></div>
                            <h1 class="cv-name" translate="no"><?= $name ?></h1>
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
                            <h2 class="cv-title" contenteditable="true">Education</h2>
                            <div class="cv-step">
                                <?php getEducations($fetchEduData,""); ?>
                            </div>
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

