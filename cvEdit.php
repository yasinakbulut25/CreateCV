<?php !defined("index") ? header("location: demo") : null ?>

<?php

    if(@$_GET['content']){
        $findCV = $data->prepare("SELECT * FROM users where submission_id=?");
        $findCV->execute(array($_GET['content']));
        $fetchCV = $findCV->fetch();

        if($findCV->rowCount()){
            if($fetchCV['username'] == $_SESSION['user']){

                $findUser = $data->prepare("SELECT * FROM members where username=? limit 1");
                $findUser->execute(array($fetchCV['username']));
                $fetchUser = $findUser->fetch();

                ?>
                <div class="container-lg">
                    <form class="cvCreateForm" action="" method="post" enctype="multipart/form-data">
                        <h1 class="form-title">Edit Your CV</h1>
                        <p class="form-exp">Edit and save the registered CV information as you wish!</p>
                        
                        <div class="grid">
                            <div class="inputBox">
                                <div class="fileUplaodContainer" onclick="defaultBtnActive()">
                                    <div class="fileUplaodWrapper">
                                        <div class="fileImage">
                                            <img src="<?= $siteUrl . $fetchCV['profile'] ?>" alt="">
                                        </div>
                                        <div class="fileUploadContent">
                                            <div class="uploadIcon">
                                                <i class="bi bi-cloud-upload"></i>
                                            </div>
                                            <div class="uploadText">
                                                Choose your new profile from device
                                            </div>
                                        </div>
                                        <div id="canselBtn">
                                            <i class="bi bi-x"></i>
                                        </div>
                                        <div class="fileName">
                                            
                                        </div>
                                    </div>
                                    <input id="default-btn" name="profile" type="file" accept="image/png, image/jpeg" hidden>
                                </div>
                            </div>
                            <div class="inputBox">
                                <div class="fileUplaodWrapper">
                                    <div class="fileImage">
                                        <img style="display: block" src="<?= $siteUrl . $fetchCV['profile'] ?>" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid">

                            <div class="inputBox">
                                <label for="">Name and Surname <span title="required">*</span></label>
                                <input type="text" name="name" placeholder="Name and Surname" required maxlength="100" value="<?= $fetchCV['name']; ?>">
                            </div>

                            <div class="inputBox">
                                <label for="">Job Role <span title="required">*</span></label>
                                <input type="text" name="jobRole" placeholder="Job Role" required maxlength="100" value="<?= $fetchCV['jobRole']; ?>">
                            </div>

                            <div class="inputBox">
                                <label for="">Phone Number <span title="required">*</span></label>
                                <input type="phone" name="phoneNumber" placeholder="05396.." maxlength="11" required value="<?= $fetchCV['phoneNumber']; ?>">
                            </div>

                            <div class="inputBox">
                                <label for="">Address <span title="required">*</span></label>
                                <input type="text" name="address" placeholder="City/Town" required maxlength="100" value="<?= $fetchCV['address']; ?>">
                            </div>

                            <div class="inputBox">
                                <label for="">Email <span title="required">*</span></label>
                                <input type="email" name="email" placeholder="name@example.com" required maxlength="100" value="<?= $fetchCV['email']; ?>">
                            </div>

                            <div class="inputBox">
                                <label for="">Web Site </label>
                                <input type="text" name="webSite" placeholder="namesurname.com" maxlength="100" value="<?= $fetchCV['webSite']; ?>">
                            </div>

                        </div>

                        <div class="grid">
                            <?php
                                foreach ($socialMedia as $key => $value) {
                                    ?>
                                    <div class="inputBox">
                                        <label for=""><?= $value ?></label>
                                        <input type="text" name="socialMedia[]" id="<?= $value ?>-input" placeholder="<?= $value ?> username" maxlength="50" value="<?= $fetchCV[$value]; ?>">
                                    </div>
                                    <?php
                                }
                            ?>
                        </div>    


                        <div class="inputBox">
                            <label for="">About <span title="required">*</span></label>
                            <textarea name="about" cols="30" rows="5" placeholder="About yourself.." required><?= $fetchCV['about']; ?></textarea>
                        </div>

                        <div class="inputBox" id="experiencesArea">
                        <label for="">Experiences <span title="required">*</span></label>
                            <?php
                                $allExperiences = $data->prepare("SELECT * FROM experiences where submission_id=?");
                                $allExperiences->execute(array($fetchCV['submission_id']));
                                $fetchAllExp = $allExperiences->fetchAll(PDO::FETCH_ASSOC);
                                if($allExperiences->rowCount()){
                                    foreach($fetchAllExp as $key => $writeDatas){
                                        $key != 0 ? $firstText = '<div class="deleteBoxIcon"><i class="bi bi-trash"></i></div>' : $firstText = "";
                                        ?>  
                                        <div class="expBox ">
                                            <?= $firstText ?>
                                            <div class="grid_four">
                                                <div class="inputBox">
                                                    <span class="small-label">Job Role</span>
                                                    <input type="text" name="expJobRole[]" placeholder="Job Role" required value="<?= $writeDatas['expJobRole'] ?>">
                                                </div>
                                                <div class="inputBox">
                                                    <span class="small-label">Company Name</span>
                                                    <input type="text" name="expCompanyName[]" placeholder="Company Name" required value="<?= $writeDatas['expCompanyName'] ?>">
                                                </div>

                                                <div class="inputBox">
                                                    <span class="small-label">Start Year</span>
                                                    <input type="text" name="expStartingYear[]" maxlength="4" placeholder="2014" required value="<?= $writeDatas['expStartingYear'] ?>">
                                                </div>
                                                <div class="inputBox">
                                                    <span class="small-label">End Year</span>
                                                    <input type="text" name="expEndingYear[]" maxlength="10" placeholder="2018" required value="<?= $writeDatas['expEndingYear'] ?>">
                                                </div>
                                            </div>
                                            <div class="inputBox">
                                                <span class="small-label">Job Description</span>
                                                <textarea name="expJobDescription[]" cols="30" rows="1" placeholder="Describe your job.." required><?= $writeDatas['expJobDescription'] ?></textarea>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                        
                        <div class="inputBox">
                            <div onclick="createNewExp()" class="CreateElemetBtn"><i class="bi bi-plus-circle"></i> Add New Experience</div>
                        </div>

                        <div class="inputBox" id="educationsArea">
                            <label for="">Educations <span title="required">*</span></label>
                            <?php
                                $allEducations = $data->prepare("SELECT * FROM educations where submission_id=?");
                                $allEducations->execute(array($fetchCV['submission_id']));
                                $fetchAllEdu = $allEducations->fetchAll(PDO::FETCH_ASSOC);
                                if($allEducations->rowCount()){
                                    foreach($fetchAllEdu as $key => $writeDatas){
                                        $key != 0 ? $firstText = '<div class="deleteBoxIcon"><i class="bi bi-trash"></i></div>' : $firstText = "";
                                        ?>  
                                        <div class="expBox ">
                                            <?= $firstText ?>
                                            <div class="grid_three">
                                                <div class="inputBox">
                                                    <span class="small-label">School</span>
                                                    <input type="text" name="eduSchool[]" placeholder="School Name" required value="<?= $writeDatas['eduSchool'] ?>">
                                                </div>
                                                <div class="inputBox">
                                                    <span class="small-label">Start Year</span>
                                                    <input type="text" name="eduStartingYear[]" maxlength="4" placeholder="2014" required value="<?= $writeDatas['eduStartingYear'] ?>">
                                                </div>
                                                <div class="inputBox">
                                                    <span class="small-label">End Year</span>
                                                    <input type="text" name="eduEndingYear[]" maxlength="10" placeholder="2018" required value="<?= $writeDatas['eduEndingYear'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                        <div class="inputBox">
                            <div onclick="createNewEdu()" class="CreateElemetBtn"><i class="bi bi-plus-circle"></i> Add New Education</div>
                        </div>

                        <div class="grid">
                            <div>
                                <div class="inputBox" id="skillsArea">
                                    <label for="">Skills <span title="required">*</span></label>
                                    <?php
                                        $allSkills = $data->prepare("SELECT * FROM skills where submission_id=?");
                                        $allSkills->execute(array($fetchCV['submission_id']));
                                        $fetchAllSkill = $allSkills->fetchAll(PDO::FETCH_ASSOC);
                                        if($allSkills->rowCount()){
                                            foreach($fetchAllSkill as $key => $writeDatas){
                                                $key != 0 ? $firstText = '<div class="deleteBoxIcon"><i class="bi bi-trash"></i></div>' : $firstText = "";
                                                ?>  
                                                <div class="expBox ">
                                                    <?= $firstText ?>
                                                    <div class="gridBox">
                                                        <div class="inputBox">
                                                            <span class="small-label">Skill</span>
                                                            <input type="text" name="skillName[]" maxlength="75" placeholder="Your Skill" required value="<?= $writeDatas['skillName'] ?>">
                                                        </div>
                                                        <div class="inputBox">
                                                            <span class="small-label">Level</span>
                                                            <input type="number" name="skillLevel[]" min="0" max="100" placeholder="82" required value="<?= $writeDatas['skillLevel'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                    ?>
                                </div>
                                <div class="inputBox">
                                    <div onclick="createNewLevelList('skillsArea','Skill','skill','Your Skill')" class="CreateElemetBtn"><i class="bi bi-plus-circle"></i> Add New Skill</div>
                                </div>
                            </div>
                            <div>
                                <div class="inputBox" id="languagesArea">
                                    <label for="">Languages <span title="required">*</span></label>
                                    <?php
                                        $allLangs = $data->prepare("SELECT * FROM languages where submission_id=?");
                                        $allLangs->execute(array($fetchCV['submission_id']));
                                        $fetchAllLang = $allLangs->fetchAll(PDO::FETCH_ASSOC);
                                        if($allLangs->rowCount()){
                                            foreach($fetchAllLang as $key => $writeDatas){
                                                $key != 0 ? $firstText = '<div class="deleteBoxIcon"><i class="bi bi-trash"></i></div>' : $firstText = "";
                                                ?>  
                                                <div class="expBox ">
                                                    <?= $firstText ?>
                                                    <div class="gridBox">
                                                        <div class="inputBox">
                                                            <span class="small-label">Language</span>
                                                            <input type="text" name="langName[]" placeholder="Language" required value="<?= $writeDatas['langName'] ?>">
                                                        </div>
                                                        <div class="inputBox">
                                                            <span class="small-label">Level</span>
                                                            <input type="number" name="langLevel[]" min="0" max="100" placeholder="82" required value="<?= $writeDatas['langLevel'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                    ?>

                                </div>
                                <div class="inputBox">
                                    <div onclick="createNewLevelList('languagesArea','Language','lang','Language')" class="CreateElemetBtn"><i class="bi bi-plus-circle"></i> Add New Language</div>
                                </div>
                            </div>
                        </div>

                        <div class="grid">
                            <div>
                                <div class="inputBox" id="certificationsArea">
                                    <label for="">Certificates (optional)</label>
                                    <?php
                                        $allCertificates = $data->prepare("SELECT * FROM certificates where submission_id=?");
                                        $allCertificates->execute(array($fetchCV['submission_id']));
                                        $fetchAllCertifica = $allCertificates->fetchAll(PDO::FETCH_ASSOC);
                                        if($allCertificates->rowCount()){
                                            foreach($fetchAllCertifica as $key => $writeDatas){
                                                 
                                                ?>  
                                                <div class="expBox ">
                                                    <div class="deleteBoxIcon"><i class="bi bi-trash"></i></div>
                                                    <div class="grid_none">
                                                        <div class="inputBox">
                                                            <span class="small-label">Certifica</span>
                                                            <input type="text" name="certificaName[]" maxlength="100" placeholder="Certifica Title" value="<?= $writeDatas['certificaName'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                    ?>
                                </div>
                                <div class="inputBox">
                                    <div onclick="createNewCertifica()" class="CreateElemetBtn"><i class="bi bi-plus-circle"></i> Add New Certifica</div>
                                </div>
                            </div>
                            <div>
                                <div class="inputBox" id="referencesArea">
                                    <label for="">References (optional)</label>
                                    <?php
                                        $allRerefences = $data->prepare("SELECT * FROM reference where submission_id=?");
                                        $allRerefences->execute(array($fetchCV['submission_id']));
                                        $fetchAllReferences = $allRerefences->fetchAll(PDO::FETCH_ASSOC);
                                        if($allRerefences->rowCount()){
                                            foreach($fetchAllReferences as $key => $writeDatas){
                                                 
                                                ?>  
                                                <div class="expBox ">
                                                    <div class="deleteBoxIcon"><i class="bi bi-trash"></i></div>
                                                    <div class="grid">
                                                        <div class="inputBox">
                                                            <span class="small-label">Name Surname</span>
                                                            <input type="text" name="refName[]" placeholder="Tonny Miller" maxlength="100" value="<?= $writeDatas['refName'] ?>">
                                                        </div>
                                                        <div class="inputBox">
                                                            <span class="small-label">Job Title</span>
                                                            <input type="text" name="refJobTitle[]" placeholder="FrontEnd Developer" maxlength="100" value="<?= $writeDatas['refJobTitle'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                    ?>

                                </div>
                                <div class="inputBox">
                                    <div onclick="createNewReference()" class="CreateElemetBtn"><i class="bi bi-plus-circle"></i> Add New Reference</div>
                                </div>
                            </div>
                        </div>
                        

                        <div class="inputBox">
                            <button class="submit-btn invalid-btn mt-3" type="submit">
                                <i class="bi bi-exclamation-circle"></i> Lütfen Tüm Alanları Doldurunuz!
                            </button>
                            <button class="submit-btn load-btn mt-3" onclick="this.classList.toggle('loading-button')" name="editCV" type="submit">
                                <span class="load_text"><i class="bi bi-plus-circle"></i> Düzenlemeyi Kaydet</span>
                            </button>
                        </div>
                    </form>
                </div>
                <?php
                include "cvEditPost.php";
            }else{
                errorPage($siteUrl,"Kullanıcıya ait CV eşleşmiyor!","5503");
            }
        }else{
            errorPage($siteUrl,"Kayıtlı CV bulunamadı!","5504");
        }
        
    }else{
        errorPage($siteUrl,"Hatalı sayfa erişimi!","5505");
    }
    
?>
