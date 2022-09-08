<?php !defined("index") ? header("location: hata") : null ?>
<?php

    $profile = "assets/img/profiles/profile.png";
    $name = "Name Surname";
    $jobRole = "Frontend Developer";
    $phoneNumber = "+90 5984153278";
    $address = "City/Town";
    $email = "name@example.com";
    $webSite = "namesurname.com";
    $about = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially. Lorem Ipsum is simply dummy text of the printing and typesetting. It has survived not only five centuries, but also the leap into.";
    $instagram = "@name_surname";
    $twitter = "";
    $linkedin = "";
    $facebook = "";
    $github = "";

    $fetchExpData = array(
        array( "expJobRole" => "Your Job Title", "expCompanyName" => "Company Name", "expStartingYear" => "2032", "expEndingYear" => "2035", "expJobDescription" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy scrambled it to make a type specimen book."),
        array( "expJobRole" => "Your Job Title", "expCompanyName" => "Company Name", "expStartingYear" => "2032", "expEndingYear" => "2035", "expJobDescription" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy scrambled it to make a type specimen book."),
        array( "expJobRole" => "Your Job Title", "expCompanyName" => "Company Name", "expStartingYear" => "2032", "expEndingYear" => "2035", "expJobDescription" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy scrambled it to make a type specimen book."),
    );

    $fetchEduData = array(
        array( "eduSchool" => "Name of University", "eduStartingYear" => "2025", "eduEndingYear" => "2029"),
        array( "eduSchool" => "Name of High School", "eduStartingYear" => "2021", "eduEndingYear" => "2025"),
    );

    $fetchCertData = array(
        array( "certificaName" => "Certifica Title"),
        array( "certificaName" => "Certifica Title"),
        array( "certificaName" => "Certifica Title"),
    );

    $fetchLangData = array(
        array( "langName" => "English", "langLevel" => "80"),
        array( "langName" => "French", "langLevel" => "64"),
        array( "langName" => "Spanish", "langLevel" => "42"),
    );

    $fetchRefData = array(
        array( "refName" => "Jason Chapple", "refJobTitle" => "Frontend Developer"),
        array( "refName" => "Frank Maclean", "refJobTitle" => "Backend Developer"),
    );

    $fetchSkillData = array(
        array( "skillName" => "JavaScript", "skillLevel" => "85"),
        array( "skillName" => "HTML/CSS", "skillLevel" => "92"),
        array( "skillName" => "Photoshop", "skillLevel" => "70"),
        array( "skillName" => "Adobe XD", "skillLevel" => "57"),
        array( "skillName" => "Figma", "skillLevel" => "77"),
    );

        

?>