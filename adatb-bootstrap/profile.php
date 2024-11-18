<?php 

session_start();

if(!isset($_SESSION["userEmail"])) {
    header("location: index.php?error=none");
}
include('includes/header.php');


?>

<div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteAccountModalLabel">Fiók törlés</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Biztosan törölni szeretnéd a profilodat és minden hozzá tartozó adatot?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mégse</button>
        <form action="/includes/include.deleteAccount.php" method="post">
            <input name="deleteAccountSubmit" type="submit" value="Fiók végleges törlése" class="btn btn-danger">
        </form>
      </div>
    </div>
  </div>
</div>


<link rel="stylesheet" href="css/profile.css">

<h1>Profil</h1>

<div class="accordion accordion-flush" id="accordionFlushExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                Általános beállítások
            </button>
        </h2>
        <div id="flush-collapseOne" class="show accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <form class="altalanos-container container-fluid" action="/includes/include.profile.php" method="post">
                    
                    <div class="row">
                        <div class="name-col col-6">
                            <label for="updateFirstName">Vezetéknév</label>
                            <input required placeholder="Példa" class="form-control" type="text" name="updateFirstName" id="updateFirstName" value="<?php echo explode(" ", $_SESSION["userName"], 2)[0]; ?>">
                        </div>
                        <div class="name-col col-6">
                            <label for="updateLastName">Keresztnév</label>
                            <input required placeholder="János" class="form-control" type="text" name="updateLastName" id="updateLastName" value="<?php echo explode(" ", $_SESSION["userName"], 2)[1]; ?>">
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="email-col col-12">
                            <label for="updateEmail">Email cím</label>
                            <input required placeholder="pelda@email.cim" type="text" name="updateEmail" id="updateEmail" class="form-control" value="<?php echo $_SESSION["userEmail"] ?>">
                        </div>
                    </div>
                    <input class="col-lg-3 col-md-5 col-sm-12 update-submit btn btn-primary" type="submit" name="editUserGeneralSubmit" value="Adatok módosítása">
    
                </form>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                Jelszó módosítás
            </button>
        </h2>
        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body container-fluid">
                <form class="new-password-form" action="/includes/include.profile.php" method="post">
                    <div class="row">
                        <div class="col-12">
                            <label for="oldPassword">Régi jelszó</label>
                            <input placeholder="•••••••" required class="form-control" type="password" name="oldPassword" id="oldPassword">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <label for="newPassword">Új jelszó</label>
                            <input required onkeyup="passwordAuth()" placeholder="•••••••" class="form-control password-input" type="password" name="newPassword" id="password">
                            <div class="password-auth-container">
                                <p id="passwordLength">*Legalább 8 karakter hosszú</p>
                                <p id="containsNumber">*Tartalmaz számot</p>
                                <p id="containsUppercase">*Tartalmaz nagy betűt</p>
                                <p id="containsSpecialChar">*Tartalmaz speciális karaktert</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <label for="newPasswordAgain">Új jelszó újra</label>
                            <input onkeyup="passwordAuth()" required placeholder="•••••••" class="form-control password-input" type="password" name="newRePassword" id="repassword">
                        </div>
                        <div class="password-match-auth-container">
                            <p id="passwordsMatch">*Jelszavak megegyeznek</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <input disabled id="signupSubmit" name="editUserPasswordSubmit" class="btn btn-primary" type="submit" value="Jelszó módosítása">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                Fiók kezelése
            </button>
        </h2>
        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteAccountModal">
                    Fiók törlése
                </button>
            </div>
        </div>
    </div>
</div>

<script src="js/passwordAuth.js"></script>

<?php include('includes/footer.php') ?>