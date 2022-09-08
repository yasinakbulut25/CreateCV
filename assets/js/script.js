
const selectFirstCV = document.querySelectorAll(".view-cv")[0].classList.add("active");
const selectFirstCVLabel = document.getElementsByClassName("layout-label cv1");
selectFirstCVLabel[0].className = "layout-label cv1 active";
selectFirstCVLabel[1].className = "layout-label cv1 active";

function viewCV(cv){
    const selectAllCV = document.querySelectorAll(".view-cv");
    const selectCV = document.querySelector(".view-cv." + cv);
    const selectLabels = document.querySelectorAll(".layout-label");
    const selectLabel = document.querySelectorAll(".layout-label." + cv);

    for (var index = 0; index < selectAllCV.length; index++) {
        selectAllCV[index].classList.remove("active");
    }
    for (var index = 0; index < selectLabels.length; index++) {
        selectLabels[index].classList.remove("active");
    }
    for (var index = 0; index < selectLabel.length; index++) {
        selectLabel[index].classList.add("active");
    }
    selectCV.classList.add("active");
}

const colors = [
    ["brown","#d5885e","#e7c4af"],
    ["red","#ff4141","#f98383"],
    ["blue","#2C81F9","#80c3ff"],
    ["green","#16d899","#80ffcf"],
    ["purple","#9149f9","#b195f8"],
    ["pink","#f723ff","#ffb7f8"],
    ["orange","#f9a92c","#ffd491"],
];

const colorPickerArea = document.querySelector(".color-picker");
for(var index = (colors.length-1); index >= 0; index--){
    const colorLabel = document.createElement("label");
    colorLabel.className = "color-label " + colors[index][0];
    colorLabel.setAttribute("onclick","changeColor('" + colors[index][0] + "','" + colors[index][1] + "','" + colors[index][2] + "')");
    colorIcon = document.createElement("span");
    colorIcon.className= "bi bi-check-lg";
    colorLabel.appendChild(colorIcon);
    colorPickerArea.insertBefore(colorLabel,colorPickerArea.children[0]);
}

const fonts = [
    ["Nunito","'Nunito', sans-serif"],
    ["Comfortaa","'Comfortaa', cursive"],
    ["Poppins","'Poppins', sans-serif"],
    ["Montserrat","'Montserrat', sans-serif"],
    ["Raleway","'Raleway', sans-serif"],
    ["Source","'Source Code Pro', monospace"],
];

const fontPickerArea = document.querySelector(".font-select-list");
for(var index = 0; index < fonts.length; index++){
    const fontLabel = document.createElement("label");
    fontLabel.className = "font-label " + fonts[index][0];
    fontLabel.setAttribute("onclick",'changeFont("'+ fonts[index][0] + '", "' + fonts[index][1] + '")');
    fontLabel.textContent  = fonts[index][0];
    fontLabel.style.fontFamily = fonts[index][1];
    fontPickerArea.appendChild(fontLabel);
}

function changeFont(nameFont,familyFont){
    const cvBoxes = document.querySelectorAll(".cv-box");
    const selectAllFontLabels = document.querySelectorAll(".font-label");
    const selectFontLabel = document.querySelector("." + nameFont);

    for (var index = 0; index < selectAllFontLabels.length; index++) {
        selectAllFontLabels[index].classList.remove("active");
    }

    for (var index = 0; index < cvBoxes.length; index++) {
        cvBoxes[index].style.setProperty('--font', familyFont);
    }
    
    selectFontLabel.classList.add("active");

    const fontLabel = document.querySelector('.font-select-label');
    fontLabel.innerHTML = nameFont + "<i class='bi bi-arrow-down'></i>";
    fontLabel.style.fontFamily = familyFont;
}

function openFontList(){
    const fontLabelIcon = document.querySelector(".bi-arrow-down");
    const fontList = document.querySelector(".font-select-list");
    if(fontList.style.display == "block"){
        fontList.style.display = "none";
        fontLabelIcon.style.transform = "rotate(0)";
    }else{
        fontList.style.display = "block";
        fontLabelIcon.style.transform = "rotate(180deg)";
    }
}
 
function openSidebar(){
    const sideLabel = document.querySelector(".side-label");
    const sidebar = document.querySelector(".cv-side");
    const colorPicker = document.querySelector(".color-picker");
    const fontPicker = document.querySelector(".font-picker");
    const viewCV = document.querySelectorAll(".view-cv");
    const formLinkArea = document.querySelector(".formLinkArea");
    if(sidebar.style.left == "-220px"){
        sideLabel.style.transform = "rotate(0)";
        sideLabel.style.left = "250px";
        sidebar.style.left = "0";
        colorPicker.style.left = "0";
        fontPicker.style.left = "0";
        for(var index = 0; index < viewCV.length; index++){
            viewCV[index].style.padding = "0 0 0 240px";
        }
        formLinkArea.style.padding = "0 0 0 240px";
    }else{
        sideLabel.style.left = "25px";
        sideLabel.style.transform = "rotate(180deg)";
        sidebar.style.left = "-220px";
        colorPicker.style.left = "-220px";
        fontPicker.style.left = "-220px";
        for(var index = 0; index < viewCV.length; index++){
            viewCV[index].style.padding = "0 15px";
        }
        formLinkArea.style.padding = "0 15px";
    }
}

for(var index = 0; index < colors.length; index++){
    const selectColorOption = document.querySelector("." + colors[index][0]);
    selectColorOption.style.background = colors[index][1];
}

const selectLabels = document.querySelectorAll(".color-label");
selectLabels[0].style.color = "#fff";

function changeColor(nameColor,mainColor,secondColor){
    const cvBoxes = document.querySelectorAll(".cv-box");
    const selectLabels = document.querySelectorAll(".color-label");
    const selectCheckLabel = document.querySelector("." + nameColor);

    for (var index = 0; index < selectLabels.length; index++) {
        selectLabels[index].style.color = "transparent";

        var selectColorClass = document.querySelector("." + nameColor);
        selectColorClass.style.background = mainColor;
    }

    selectCheckLabel.style.color = "#fff";

    for (var index = 0; index < cvBoxes.length; index++) {
        cvBoxes[index].style.setProperty('--main-color', mainColor);
        cvBoxes[index].style.setProperty('--second-color', secondColor);
    }
   
}