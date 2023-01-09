/********************** CV Scripts *********************/
const cvBoxes = document.querySelectorAll(".cv-box"); // Tüm CV şablonlarını seç

// LocalStorage'de kayıtlı olan CV'yi seç, yoksa cv1 seç ve gönder
if(localStorage.getItem("viewCv")){
    viewCV(localStorage.getItem("viewCv"))
}else{
    viewCV("cv1")
}

function viewCV(cv){
    localStorage.setItem("viewCv",cv); // Gelen cv değerini al ve localStorage'e kaydet.
    let viewCvValue = localStorage.getItem("viewCv"); // localStorage'de ki cv değerini değişkene ata

    const selectAllCV = document.querySelectorAll(".view-cv"); // tüm cv gösterim alanlarını seç
    const selectCV = document.querySelector(".view-cv." + viewCvValue); // localStorage'de ki cv gösterim alanını seç
    const selectLabels = document.querySelectorAll(".layout-label"); // cv seçim labellerinin tümünü seç
    const selectLabel = document.querySelectorAll(".layout-label." + viewCvValue); // localStorage'de ki cv yi seçen labelleri seç (light-dark)
 
    // seçilen tüm cv gösterim alanlarının active class'ını sil(kaldır)
    for (let index = 0; index < selectAllCV.length; index++) {
        selectAllCV[index].classList.remove("active");
    }

    // seçilen tüm cv seçme labellerindeki active class'ını sil(kaldır)
    for (let index = 0; index < selectLabels.length; index++) {
        selectLabels[index].classList.remove("active");
    }

    // localStorage'de ki cv yi seçen labellere active class'ını ekle (light-dark)
    for (let index = 0; index < selectLabel.length; index++) {
        selectLabel[index].classList.add("active");
    }

    selectCV.classList.add("active"); // localStorage'de ki cv gösterim alanına active class'ını ekle
}

/********************** Colors Scripts *********************/

// Seçilebilecek renk değerlerini belirle (name,main,second)
const colors = [
    ["brown","#d5885e","#e7c4af"],
    ["red","#ff4141","#f98383"],
    ["blue","#2C81F9","#80c3ff"],
    ["green","#16d899","#80ffcf"],
    ["purple","#9149f9","#b195f8"],
    ["pink","#f723ff","#ffb7f8"],
    ["orange","#f9a92c","#ffd491"],
];

const colorPickerArea = document.querySelector(".color-picker"); // renk seçme alanını seç

// Belirlenen renk değerlerinin tümüne ait bir label oluştur ve renk seçme alanına ekle(appendChild)
for(let index = (colors.length-1); index >= 0; index--){ // tersten başla, başa doğru döndür
    const colorLabel = document.createElement("label"); // label oluştur
    colorLabel.className = "color-label " + colors[index][0]; // label'e colors dizisinde ki renk adını ata
    colorLabel.style.background = colors[index][1]; // label background'a colors dizisinde ki main renk kodunu ata
    // label'e onclick event'i ekle ve değer olarak changeColor(name,main,second) fonskiyonuna yönlendir
    colorLabel.setAttribute("onclick","changeColor('" + colors[index][0] + "','" + colors[index][1] + "','" + colors[index][2] + "')");
    colorIcon = document.createElement("span"); // span oluştur
    colorIcon.className= "bi bi-check-lg"; // span'e bootstrap iconu ekle
    colorLabel.appendChild(colorIcon); // span'i label'e ekle
    // renk seçme alanına bir önceki içeriğin öncesine(insertBefore), oluşturulan label'i ekle
    colorPickerArea.insertBefore(colorLabel,colorPickerArea.children[0]);
}

/** 
 * localStorage'de kayıtlı olan mainColor değerini al ve renk değiştirme fonksiyonuna gönder,
 * yoksa colors dizisindeki ilk satır değerlerini gönder
 * */ 
if(localStorage.getItem("mainColor")){
    changeColor(localStorage.getItem("nameColor"),localStorage.getItem("mainColor"),localStorage.getItem("secondColor"))
}else{
    changeColor(colors[0][0],colors[0][1],colors[0][2])
}

function changeColor(nameColor,mainColor,secondColor){

    // gelen değerleri localStorage içerisine kaydet ve değişkenlere ata
    localStorage.setItem("nameColor",nameColor); 
    localStorage.setItem("mainColor",mainColor);
    localStorage.setItem("secondColor",secondColor);
    localMainColor = localStorage.getItem("mainColor")
    localSecondColor = localStorage.getItem("secondColor")
   
    const selectLabels = document.querySelectorAll(".color-label"); // tüm renk seçme labellerini seç

    // seçilen tüm labellerin color değerini görünmez(transparent) yap
    for (let index = 0; index < selectLabels.length; index++) {
        selectLabels[index].style.color = "transparent";
    }

    const selectCheckLabel = document.querySelector("." + nameColor); // seçilen renk labelini seç
    selectCheckLabel.style.background = localMainColor; // seçilen labelin background değerini localStorage'den ata
    selectCheckLabel.style.color = "#fff"; // seçilen labelin color değerini ata

    // localStorage'de kayıtlı olan renk değerlerini tüm cv gösterimler için ayarla
    for (let index = 0; index < cvBoxes.length; index++) {
        cvBoxes[index].style.setProperty('--main-color', localMainColor);
        cvBoxes[index].style.setProperty('--second-color', localSecondColor);
    }
   
}


/********************** Font Scripts *********************/

// Seçilebilecek font değerlerini belirle (name,family)
const fonts = [
    ["Nunito","'Nunito', sans-serif"],
    ["Comfortaa","'Comfortaa', cursive"],
    ["Poppins","'Poppins', sans-serif"],
    ["Montserrat","'Montserrat', sans-serif"],
    ["Raleway","'Raleway', sans-serif"],
    ["Source","'Source Code Pro', monospace"],
];

const fontPickerArea = document.querySelector(".font-select-list"); // font seçme alanını seç

// Belirlenen font değerleri için label oluştur ve font seçme alanına ekle(appendChild)
for(let index = 0; index < fonts.length; index++){ // baştan başla sona doğru
    const fontLabel = document.createElement("label"); // label oluştur
    fontLabel.className = "font-label " + fonts[index][0]; // fonst dizisindeki name alanını class olarak ata
    // label için onclik event'i ekle ve changeFont(name,family) fonksiyonuna gönder
    fontLabel.setAttribute("onclick",'changeFont("'+ fonts[index][0] + '", "' + fonts[index][1] + '")');
    fontLabel.textContent  = fonts[index][0]; // label içerisine fonts dizisindeki name değerini ata
    fontLabel.style.fontFamily = fonts[index][1]; // label yazısına font dizisindeki family fontunu ekle
    fontPickerArea.appendChild(fontLabel); // label'i renk seçme alanına ekle
}

// localStorage'de kayıtlı olan FontName değeri varsa changeFont fonksiyonuna gönder
if(localStorage.getItem("FontName")){
    changeFont(localStorage.getItem("FontName"),localStorage.getItem("FontFamily"))
}

function changeFont(nameFont,familyFont){

    // gelen font değerlerini localStorage içerisine kaydet ve değişkene ata
    localStorage.setItem("FontName",nameFont);
    localStorage.setItem("FontFamily",familyFont);
    localFontName = localStorage.getItem("FontName")
    localFontFamily = localStorage.getItem("FontFamily")

    const selectAllFontLabels = document.querySelectorAll(".font-label"); // tüm font seçme labellerini seç

    // tüm font seçme labellerindeki active class'ını sil(kaldır)
    for (let index = 0; index < selectAllFontLabels.length; index++) {
        selectAllFontLabels[index].classList.remove("active");
    }

    // tüm cv gösterim alanlarının font özelliğini localStorage'de kayıtlı olan family değerini ata
    for (let index = 0; index < cvBoxes.length; index++) {
        cvBoxes[index].style.setProperty('--font', localFontFamily);
    }

    const selectFontLabel = document.querySelector("." + localFontName); // localStorage'de seçilen font labelini seç
    selectFontLabel.classList.add("active"); // seçilen label'e active class'ını ekle

    const fontLabel = document.querySelector('.font-select-label span'); // "Choose Font" yazısını seç (font seçme dropdown label)
    fontLabel.innerHTML = localFontName; // dropdown label'e icon ekle
    fontLabel.style.fontFamily = localFontFamily; // dropdown label'e localStorage'de kayıtlı olan family değerini ata
}

// font seçme dropdown alanını aç/kapa
function openFontList(){
    const fontLabelIcon = document.querySelector(".bi-triangle-fill"); // iconu seç
    const fontList = document.querySelector(".font-select-list"); // dropdown listeyi seç
    if(fontList.style.display == "block"){ 
        fontList.style.display = "none";
        fontLabelIcon.style.transform = "rotate(180deg)";
    }else{
        fontList.style.display = "block";
        fontLabelIcon.style.transform = "rotate(0)";
    }
}
 
/********************** Sidebar Scripts *********************/

// Sidebar aç/kapa
function openSidebar(){
    const sideLabel = document.querySelector(".side-label"); // aç/kapa labelini seç
    const sidebar = document.querySelector(".cv-side"); // sidebar alanını seç
    const colorPicker = document.querySelector(".color-picker"); // renk seçme alanını seç
    const fontPicker = document.querySelector(".font-picker"); // font seçme alanını seç

    // sidebar kapalı/açık ise tüm seçilenler üzerinde gerekli değişimleri yap
    if(sidebar.style.left == "-220px"){
        sideLabel.style.transform = "rotate(0)";
        sideLabel.style.left = "250px";
        sidebar.style.left = "0";
        colorPicker.style.left = "0";
        fontPicker.style.left = "0";
    }else{
        sideLabel.style.left = "25px";
        sideLabel.style.transform = "rotate(180deg)";
        sidebar.style.left = "-220px";
        colorPicker.style.left = "-220px";
        fontPicker.style.left = "-220px";
    }
}

