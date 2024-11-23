<?php 
    if(isset($_GET["error"]) && $_GET["error"] !== "none") {
?>

        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Hiba</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
            <?php 

            $errorCode = $_GET["error"];

            if ($errorCode === "emptyinput") {echo 'Minden mezőt tölts ki!';}
            if ($errorCode === "invalidemail") {echo 'Hibás emailt adtál meg!';}
            if ($errorCode === "invalidname") {echo 'Hibás nevet adtál meg!';}
            if ($errorCode === "passwordsdiffer") {echo 'A jelszavak különböznek!';}
            if ($errorCode === "emailtaken") {echo 'Ez az email már foglalt!';}
            if ($errorCode === "invalidpassword") {echo 'Hibás jelszavat adtál meg!';}
            if ($errorCode === "stmtfailed") {echo 'Váratlan hiba történt, próbáld meg újra!';}
            if ($errorCode === "wrongcredentials") {echo 'Rossz felhasználónév vagy jelszó!';}
            if ($errorCode === "rolenotfound") {echo 'Nincs ilyen szerepkör!';}
// TODO: invalidcurrentpassword
// TODO: wrongemailinput
            ?>
            </div>
        </div>
        
<?php
    }
?>


<footer class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-3">
                <h5 class="text-uppercase">Space Coo.</h5>
                <p>Blast off to better learning!</p>
            </div>

            <div class="col-md-4 mb-3 links">
                <h5 class="text-uppercase">Gyors Linkek</h5>
                <ul class="list-unstyled">
                    <li><a href="index.php">Főoldal</a></li>
                    <li><a href="#">Rólunk</a></li>
                    <li><a href="#">Általános szerződési feltételek</a></li>
                    <li><a href="#">Felhasználói feltételek</a></li>
                </ul>
            </div>

            <div class="col-md-4 mb-3">
                <h5 class="text-uppercase">Elérhetőség</h5>
                <p><i class="bx bxs-map"></i> Szeged Tisza Lajos krt. 103. </p>
                <p><i class='bx bxs-phone'></i> +36 30 420 6911</p>
                <p><i class='bx bx-envelope' ></i> info@spacecoo.hu</p>
            </div>
        </div>

        <hr class="border-light">

        <div class="row">
            <div class="col text-center">
                <p class="mb-0">&copy; 2024 Space Coo. All rights reserved.</p>
                <a href="#" class="me-3"><i class='bx bxl-facebook-circle'></i></a>
                <a href="#" class="me-3"><i class='bx bxl-twitter'></i></a>
                <a href="#" ><i class='bx bxl-instagram' ></i></a>
            </div>
        </div>
    </div>
</footer>
    
    <script src="js/sidebar.js"></script>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.js"></script>
    <script src="js/toast.js"></script>
    <script src="js/tooltip.js"></script>
</body>
</html>