<?php !defined("index") ? header("location: demo") : null ?>
<?php
if(isset($_SESSION['user'])){
    $sessionUser = $_SESSION['user'];

    $findUser = $data->prepare("SELECT * FROM members where username=? limit 1");
    $findUser->execute(array($sessionUser));
    $fetchUser = $findUser->fetch();

    if($findUser->rowCount()){
        ?>
        <div class="container-lg">
            <div class="home-area">
                <?php include "header.php" ?>        
                <div class="profile-area">
                    <div class="user">
                        <div class="user-text">
                            <h1 class="user-name"><?= $fetchUser['name']; ?></h1>
                            <p class="user-email"><?= $fetchUser['email']; ?></p>
                        </div>
                    </div>  
                    <div class="alert alert-success">
                        Oluşturduğunuz özgeçmişlerinizin üzerine tıklayarak düzenleyebilir ve <b>CV Ekle</b> kısmından yeni özgeçmiş oluşturabilirsiniz.
                    </div>
                    <div class="cv-boxes">
                        <?php
                            $findUserCV = $data->prepare("SELECT * FROM users where username=? order by id desc");
                            $findUserCV->execute(array($sessionUser));
                            $fetchUserCV = $findUserCV->fetchAll(PDO::FETCH_ASSOC);

                            if($findUserCV->rowCount()){
                                foreach ($fetchUserCV as $writeCV) {
                                    ?>
                                    <div class="cv-preview">
                                        <div class="cv-preview-img">
                                            <a href="edit-cv/<?= $writeCV['submission_id']; ?>" class="cv-edit-icon">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <img src="<?= $siteUrl . $writeCV['profile']; ?>" alt="">
                                        </div>
                                        <div class="cv-preview-buttons">
                                            <a target="_blank" href="cv/<?= $writeCV['submission_id']; ?>" title="CV Göster"><i class="bi bi-eye"></i></a>
                                            <a href="" data-bs-toggle="modal" data-bs-target="#cvSil<?= $writeCV['id']; ?>" title="CV Sil"><i class="bi bi-trash"></i></a>
                                        </div>

                                        <!-- Modal Sil -->
                                        <div class="modal fade" id="cvSil<?= $writeCV['id']; ?>" tabindex="-1" aria-labelledby="cvSilLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="cvSilLabel">CV Silinecektir!</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Kayıtlı olan özgeçmişiniz silinecektir! Bu işlem geri alınamaz, Onaylıyor musunuz?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="link-btn blue" data-bs-dismiss="modal">Kapat <i class="bi bi-x"></i></button>
                                                    <a href="delete-cv/<?= $writeCV['submission_id']; ?>" class="link-btn red">CV Sil <i class="bi bi-trash"></i></a>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        ?>
                        <div class="cv-preview">
                            <div class="cv-preview-img">
                                <a href="form/<?= $sessionUser ?>" class="cv-edit-icon">
                                    <i class="bi bi-plus-circle-dotted"></i>
                                </a>
                                <img src="./assets/img/add-cv-img.png" alt="">
                            </div>
                            <div class="cv-preview-name">CV Ekle</div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>
        <?php
    }else{
        ?>
        <div class="gridArea">
            <div class="errorBox">
                <div class="errorIconBox">
                    <i class="bi bi-x"></i>   
                </div>
                <div class="errorMessage">
                    <p>Kullanıcı bulunamadı!</p>
                </div>
            </div>
        </div>
        <?php
        header("refresh: 2; url=$siteUrl");
        return;
    }

}else{
    header("refresh: 1; url=$siteUrl");
    return;
}
?>

