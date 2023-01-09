function inputSocialCheck(socialValue){

    const selectInputBox = document.getElementById(socialValue);
    const selectInput = document.getElementById(socialValue + "-input");
    const socialBtn = document.getElementById(socialValue + "-span");

    if(socialBtn.className == "social-btn"){
        socialBtn.classList.add("active");
        selectInputBox.style.display = "block"
        selectInput.required = true;
    }else{
        socialBtn.classList.remove("active")
        selectInputBox.style.display = "none";
        selectInput.required = false;
        selectInput.value = "";
    }
}

function createNewExp(){
    const experiencesArea = document.getElementById("experiencesArea");

    const experienceLabels = ["Job Role","Company Name","Start Year","End Year"];
    const experienceMaxLength = ["75","75","4","4"];
    const experiencePlaceholder = ["Job Role","Company Name","2014","2018"];
    const experienceNames = ["expJobRole[]","expCompanyName[]","expStartingYear[]","expEndingYear[]"];
    
    const expBox = document.createElement("div");
    expBox.classList.add("expBox");
    
    const gridFour = document.createElement ("div");
    gridFour.classList.add("grid_four");

    const deleteDiv = document.createElement("div");
    const deleteBoxIcon = document.createElement("i");
    deleteBoxIcon.className = "bi bi-trash";
    deleteDiv.classList.add("deleteBoxIcon");
    deleteDiv.appendChild(deleteBoxIcon);

    expBox.appendChild(deleteDiv);
    
    expBox.appendChild(gridFour);
    
    for(var i = 0; i < experienceLabels.length; i++){
    
        const inputBox = document.createElement("div");
        inputBox.classList.add("inputBox");
    
        const span = document.createElement("span");
        span.classList.add("small-label");
        span.innerText = experienceLabels[i];
    
        inputBox.appendChild(span);
    
        const input = document.createElement("input");
        input.type = "text";
        input.name = experienceNames[i];
        input.placeholder= experiencePlaceholder[i];
        input.required = true;
        input.maxLength = experienceMaxLength[i];
    
        inputBox.appendChild(input);
        gridFour.appendChild(inputBox);
    
    }
    
    expBox.appendChild(gridFour);
    
    const inputBox = document.createElement("div");
    inputBox.classList.add("inputBox");
    
    const span = document.createElement("span");
    span.classList.add("small-label");
    span.innerText = "Job Description";
    
    inputBox.appendChild(span);
    
    const textarea = document.createElement("textarea");
    textarea.name = "expJobDescription[]";
    textarea.placeholder= "Describe Your Job..";
    textarea.required = true;
    textarea.cols = "30";
    textarea.rows = "1";
    
    inputBox.appendChild(textarea);
    expBox.appendChild(inputBox);

    experiencesArea.appendChild(expBox);
    
}

function createNewEdu(){

    const educationsArea = document.getElementById("educationsArea");

    const educationsLabels = ["School","Start Year","End Year"];
    const educationsMaxLength = ["100","4","4"];
    const educationsPlaceholder = ["School Name","2014","2018"];
    const educationsNames = ["eduSchool[]","eduStartingYear[]","eduEndingYear[]"];
    
    const eduBox = document.createElement("div");
    eduBox.classList.add("expBox");
    
    const gridThree = document.createElement ("div");
    gridThree.classList.add("grid_three");

    const deleteDiv = document.createElement("div");
    const deleteBoxIcon = document.createElement("i");
    deleteBoxIcon.className = "bi bi-trash";
    deleteDiv.classList.add("deleteBoxIcon");
    deleteDiv.appendChild(deleteBoxIcon);

    eduBox.appendChild(deleteDiv);
    
    eduBox.appendChild(gridThree);
    
    for(var i = 0; i < educationsLabels.length; i++){
    
        const inputBox = document.createElement("div");
        inputBox.classList.add("inputBox");
    
        const span = document.createElement("span");
        span.classList.add("small-label");
        span.innerText = educationsLabels[i];
    
        inputBox.appendChild(span);
    
        const input = document.createElement("input");
        input.type = "text";
        input.name = educationsNames[i];
        input.placeholder= educationsPlaceholder[i];
        input.required = true;
        input.maxLength = educationsMaxLength[i];
    
        inputBox.appendChild(input);
        gridThree.appendChild(inputBox);
    
    }
    
    eduBox.appendChild(gridThree);
    educationsArea.appendChild(eduBox);
}

function createNewLevelList(id,label,name,placeholder){

    const skillsArea = document.getElementById(id);
    
    const levelBox = document.createElement("div");
    levelBox.classList.add("expBox");
    
    const grid = document.createElement ("div");
    grid.classList.add("gridBox");

    const deleteDiv = document.createElement("div");
    const deleteBoxIcon = document.createElement("i");
    deleteBoxIcon.className = "bi bi-trash";
    deleteDiv.classList.add("deleteBoxIcon");
    deleteDiv.appendChild(deleteBoxIcon);

    levelBox.appendChild(deleteDiv);
    levelBox.appendChild(grid);
    
    const inputBox = document.createElement("div");
    inputBox.classList.add("inputBox");
    const span = document.createElement("span");
    span.classList.add("small-label");
    span.innerText = label;
    inputBox.appendChild(span);
    const input = document.createElement("input");
    input.type = "text";
    input.name = name + "Name[]";
    input.placeholder= placeholder;
    input.required = true;
    input.maxLength = "75";

    const inputBoxNumber = document.createElement("div");
    inputBoxNumber.classList.add("inputBox");
    const spanNumber = document.createElement("span");
    spanNumber.classList.add("small-label");
    spanNumber.innerText = "Level";
    inputBoxNumber.appendChild(spanNumber);
    const input_number = document.createElement("input");
    input_number.type = "number";
    input_number.name = name + "Level[]";
    input_number.placeholder= "82";
    input_number.required = true;
    input_number.min = "0";
    input_number.max = "100";

    inputBox.appendChild(input);
    inputBoxNumber.appendChild(input_number);
    grid.appendChild(inputBox);
    grid.appendChild(inputBoxNumber);
    
    levelBox.appendChild(grid);
    skillsArea.appendChild(levelBox);
}

function createNewCertifica(){
    const certificationsArea = document.getElementById("certificationsArea");

    const certBox = document.createElement("div");
    certBox.classList.add("expBox");

    const gridNone = document.createElement ("div");
    gridNone.classList.add("grid_none");
    
    const deleteDiv = document.createElement("div");
    const deleteBoxIcon = document.createElement("i");
    deleteBoxIcon.className = "bi bi-trash";
    deleteDiv.classList.add("deleteBoxIcon");
    deleteDiv.appendChild(deleteBoxIcon);

    certBox.appendChild(deleteDiv);
    certBox.appendChild(gridNone);
    
    
    const inputBox = document.createElement("div");
    inputBox.classList.add("inputBox");

    const span = document.createElement("span");
    span.classList.add("small-label");
    span.innerText = "Certifica";

    inputBox.appendChild(span);

    const input = document.createElement("input");
    input.type = "text";
    input.name = "certificaName[]";
    input.placeholder= "Certifica Title";
    input.required = true;
    input.maxLength = "100";

    inputBox.appendChild(input);

    gridNone.appendChild(inputBox);

    certBox.appendChild(gridNone);
    
    certificationsArea.appendChild(certBox);
}

function createNewReference(){
    const referencesArea = document.getElementById("referencesArea");
    
    const refBox = document.createElement("div");
    refBox.classList.add("expBox");
    
    const grid = document.createElement ("div");
    grid.classList.add("grid");

    const deleteDiv = document.createElement("div");
    const deleteBoxIcon = document.createElement("i");
    deleteBoxIcon.className = "bi bi-trash";
    deleteDiv.classList.add("deleteBoxIcon");
    deleteDiv.appendChild(deleteBoxIcon);

    refBox.appendChild(deleteDiv);
    refBox.appendChild(grid);
    
    const inputBox = document.createElement("div");
    inputBox.classList.add("inputBox");
    const span = document.createElement("span");
    span.classList.add("small-label");
    span.innerText = "Name Surname";
    inputBox.appendChild(span);
    const input = document.createElement("input");
    input.type = "text";
    input.name = "refName[]";
    input.placeholder= "Tonny Miller";
    input.required = true;
    input.maxLength = "100";

    const inputBoxJob = document.createElement("div");
    inputBoxJob.classList.add("inputBox");
    const spanJob = document.createElement("span");
    spanJob.classList.add("small-label");
    spanJob.innerText = "Job Title";
    inputBoxJob.appendChild(spanJob);
    const inputJobTitle = document.createElement("input");
    inputJobTitle.type = "text";
    inputJobTitle.name = "refJobTitle[]";
    inputJobTitle.placeholder= "FrontEnd Developer";
    inputJobTitle.required = true;
    inputJobTitle.maxLength = "100";

    inputBox.appendChild(input);
    inputBoxJob.appendChild(inputJobTitle);
    grid.appendChild(inputBox);
    grid.appendChild(inputBoxJob);
    
    refBox.appendChild(grid);
    referencesArea.appendChild(refBox);
}

const deleteBoxIcon = document.querySelector(".cvCreateForm");
deleteBoxIcon.addEventListener("click",deleteEl)

function deleteEl(e){
    if(e.target.className == "bi bi-trash"){
        e.target.parentElement.parentElement.remove();
    }else if(e.target.className == "deleteBoxIcon"){
        e.target.parentElement.remove();
    }
}


