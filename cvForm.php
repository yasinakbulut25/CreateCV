<?php
    $socialMedia = array("instagram","twitter","linkedin","facebook","github");
    include "cvPost.php";
?>

<div class="container-lg">
    <form class="cvCreateForm" action="create" method="post" enctype="multipart/form-data">
        <h1 class="form-title">Create Your CV</h1>
        <p class="form-exp">Enter your information, choose your template and color, print your CV!</p>
        
        <div class="inputBox">
            <div class="fileUplaodContainer" onclick="defaultBtnActive()">
                <div class="fileUplaodWrapper">
                    <div class="fileImage">
                        <img src="" alt="">
                    </div>
                    <div class="fileUploadContent">
                        <div class="uploadIcon">
                            <i class="bi bi-cloud-upload"></i>
                        </div>
                        <div class="uploadText">
                            Choose your profile from device
                        </div>
                    </div>
                    <div id="canselBtn">
                        <i class="bi bi-x"></i>
                    </div>
                    <div class="fileName">
                        
                    </div>
                </div>
                <input id="default-btn" name="profile" type="file" hidden>
            </div>
        </div>

        <div class="grid">

            <div class="inputBox">
                <label for="">Name and Surname <span title="required">*</span></label>
                <input type="text" name="name" placeholder="Name and Surname" required maxlength="100">
            </div>

            <div class="inputBox">
                <label for="">Job Role <span title="required">*</span></label>
                <input type="text" name="jobRole" placeholder="Job Role" required maxlength="100">
            </div>

            <div class="inputBox">
                <label for="">Phone Number <span title="required">*</span></label>
                <input type="phone" name="phoneNumber" placeholder="05396.." maxlength="11" required>
            </div>

            <div class="inputBox">
                <label for="">Address <span title="required">*</span></label>
                <input type="text" name="address" placeholder="City/Town" required maxlength="100">
            </div>

            <div class="inputBox">
                <label for="">Email <span title="required">*</span></label>
                <input type="email" name="email" placeholder="name@example.com" required maxlength="100">
            </div>

            <div class="inputBox">
                <label for="">Web Site </label>
                <input type="text" name="webSite" placeholder="namesurname.com" maxlength="100">
            </div>

        </div>

        <div class="social-buttons">
                <?php
                    foreach ($socialMedia as $key => $value) {
                        if($key == 0){
                            ?>
                            <span onclick="inputSocialCheck('<?= $value; ?>')" class="social-btn active" id="<?= $value; ?>-span"> <?= $value ?></span>
                            <?php    
                        }else{
                            ?>
                            <span onclick="inputSocialCheck('<?= $value; ?>')" class="social-btn" id="<?= $value; ?>-span"><?= $value ?></span>
                            <?php    
                        }
                    }
                ?>    
        </div>

        <div class="grid">
            <?php
                foreach ($socialMedia as $key => $value) {
                    if($key == 0){
                        ?>
                        <div class="inputBox social" id="<?= $value; ?>">
                            <label for=""><?= ucwords($value); ?></label>
                            <input type="text" name="socialMedia[]" id="<?= $value; ?>-input" placeholder="<?= $value; ?> Username" maxlength="30" required>
                        </div>
                        <?php   
                    }else{
                        ?>
                        <div class="inputBox social" id="<?= $value; ?>">
                            <label for=""><?= ucwords($value); ?></label>
                            <input type="text" name="socialMedia[]" id="<?= $value; ?>-input" placeholder="<?= $value; ?> Username" maxlength="30">
                        </div>
                        <?php   
                    }
                }
            ?>
        </div>

        <div class="inputBox">
            <label for="">About <span title="required">*</span></label>
            <textarea name="about" cols="30" rows="5" placeholder="About yourself.." required></textarea>
        </div>

        <div class="inputBox" id="experiencesArea">
            <label for="">Experiences <span title="required">*</span></label>
            <div class="expBox first">
                <div onclick="deleteElement('expBox_1')" class="deleteBoxIcon"><i class="bi bi-trash"></i></div>
                <div class="grid_four">
                    <div class="inputBox">
                        <span class="small-label">Job Role</span>
                        <input type="text" name="expJobRole[]" placeholder="Job Role" required>
                    </div>
                    <div class="inputBox">
                        <span class="small-label">Company Name</span>
                        <input type="text" name="expCompanyName[]" placeholder="Company Name" required>
                    </div>

                    <div class="inputBox">
                        <span class="small-label">Start Year</span>
                        <input type="text" name="expStartingYear[]" maxlength="4" placeholder="2014" required>
                    </div>
                    <div class="inputBox">
                        <span class="small-label">End Year</span>
                        <input type="text" name="expEndingYear[]" maxlength="4" placeholder="2018" required>
                    </div>
                </div>
                <div class="inputBox">
                    <span class="small-label">Job Description</span>
                    <textarea name="expJobDescription[]" cols="30" rows="1" placeholder="Describe your job.." required></textarea>
                </div>
            </div>
        </div>
        <div class="inputBox">
            <div onclick="createNewExp()" class="CreateElemetBtn"><i class="bi bi-plus-circle"></i> Add New Experience</div>
        </div>

        <div class="inputBox" id="educationsArea">
            <label for="">Educations <span title="required">*</span></label>
            <div class="expBox first">
                <div class="grid_three">
                    <div class="inputBox">
                        <span class="small-label">School</span>
                        <input type="text" name="eduSchool[]" placeholder="School Name" required>
                    </div>
                    <div class="inputBox">
                        <span class="small-label">Start Year</span>
                        <input type="text" name="eduStartingYear[]" maxlength="4" placeholder="2014" required>
                    </div>
                    <div class="inputBox">
                        <span class="small-label">End Year</span>
                        <input type="text" name="eduEndingYear[]" maxlength="4" placeholder="2018" required>
                    </div>
                </div>
            </div>
        </div>
        <div class="inputBox">
            <div onclick="createNewEdu()" class="CreateElemetBtn"><i class="bi bi-plus-circle"></i> Add New Education</div>
        </div>

        <div class="grid">
            <div>
                <div class="inputBox" id="skillsArea">
                    <label for="">Skills <span title="required">*</span></label>
                    <div class="expBox first">
                        <div class="gridBox">
                            <div class="inputBox">
                                <span class="small-label">Skill</span>
                                <input type="text" name="skillName[]" maxlength="75" placeholder="Your Skill" required>
                            </div>
                            <div class="inputBox">
                                <span class="small-label">Level</span>
                                <input type="number" name="skillLevel[]" min="0" max="100" placeholder="82" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inputBox">
                    <div onclick="createNewLevelList('skillsArea','Skill','skill','Your Skill')" class="CreateElemetBtn"><i class="bi bi-plus-circle"></i> Add New Skill</div>
                </div>
            </div>
            <div>
                <div class="inputBox" id="languagesArea">
                    <label for="">Languages <span title="required">*</span></label>
                    <div class="expBox first">
                        <div class="gridBox">
                            <div class="inputBox">
                                <span class="small-label">Language</span>
                                <input type="text" name="langName[]" placeholder="Language" required>
                            </div>
                            <div class="inputBox">
                                <span class="small-label">Level</span>
                                <input type="number" name="langLevel[]" min="0" max="100" placeholder="82" required>
                            </div>
                        </div>
                    </div>
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
                    <div class="expBox first">
                        <div class="grid_none">
                            <div class="inputBox">
                                <span class="small-label">Certifica</span>
                                <input type="text" name="certificaName[]" maxlength="100" placeholder="Certifica Title">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="inputBox">
                    <div onclick="createNewCertifica()" class="CreateElemetBtn"><i class="bi bi-plus-circle"></i> Add New Certifica</div>
                </div>
            </div>
            <div>
                <div class="inputBox" id="referencesArea">
                    <label for="">References (optional)</label>
                    <div class="expBox first">
                        <div class="grid">
                            <div class="inputBox">
                                <span class="small-label">Name Surname</span>
                                <input type="text" name="refName[]" placeholder="Tonny Miller" maxlength="100">
                            </div>
                            <div class="inputBox">
                                <span class="small-label">Job Title</span>
                                <input type="text" name="refJobTitle[]" placeholder="FrontEnd Developer" maxlength="100">
                            </div>
                        </div>
                    </div>
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
            <button class="submit-btn load-btn mt-3" onclick="this.classList.toggle('loading-button')" name="createCV" type="submit">
                <span class="load_text"><i class="bi bi-plus-circle"></i> Create Your CV</span>
            </button>
        </div>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="./assets/js/createElement.js"></script>
<script src="./assets/js/fileUpload.js"></script>
</body>
</html>