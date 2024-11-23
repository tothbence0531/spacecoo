<?php 
if(isset($_SESSION["userEmail"]) !== true) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/loader.js"></script>
    

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Space Coo.</title>
</head>

    <div class="modal fade" id="addTestModal" tabindex="-1" aria-labelledby="addTestModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-m modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addTestModalLabel">Teszt hozzáadása</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="includes/include.test.php" method="post">
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <label for="test-name">Teszt neve:</label>
                                    <input name="test-name" id="test-name" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="test-min">Minimális pontszám: </label>
                                    <input name="test-min" id="test-min" type="number" class="form-control">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="userEmail" value="<?php echo $_SESSION["userEmail"] ?>">
                        <input name="add-test-submit" class="btn btn-primary" type="submit" value="Hozzáadás">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="loginModalLabel">Bejelentkezés</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="includes/include.login.php" method="post">
                    <div class="modal-body">
                        <div class="container-fluid p-0">
                            <div class="row">
                                <div class="col-sm-6 left-col">
                                    <label for="email" class="form-label">Email cím</label>
                                    <input type="text" name="loginEmail" id="loginEmail" class="form-control" placeholder="példa@email.cim">
                                    <label for="inputPassword5" class="form-label pt-3">Jelszó</label>
                                    <input type="password" name="loginPassword" class="form-control" placeholder="•••••••">
                                    <input type="submit" name="loginSubmit" class="btn btn-primary" value="Belépés">
                                    <p class="noaccount">Nincs fiókod? <a href="../signup.php">Regisztrálj!</a></p>
                                </div>
                                <div class="col-sm-6 text-center py-5 mt-5 mt-sm-0 right-col">
                                    <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 20010904//EN"
                                    "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
                                    <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                    width="200.000000pt" height="200.000000pt" viewBox="0 0 200.000000 200.000000"
                                    preserveAspectRatio="xMidYMid meet" id="modalIcon">

                                    <g transform="translate(0.000000,200.000000) scale(0.100000,-0.100000)"
                                    stroke="none">
                                    <path d="M1339 1727 c-91 -34 -154 -93 -196 -182 -23 -49 -28 -74 -28 -135 0
                                    -65 5 -85 33 -142 40 -81 102 -139 181 -169 74 -28 195 -23 259 10 66 34 128
                                    96 159 160 37 75 40 200 6 273 -29 63 -97 134 -158 166 -61 31 -196 41 -256
                                    19z m226 -52 c28 -13 61 -33 75 -44 l25 -21 -72 0 c-66 0 -73 -2 -73 -20 0
                                    -19 7 -20 89 -20 l89 0 19 -47 c10 -27 18 -74 18 -108 l0 -60 -143 -3 c-129
                                    -2 -143 -4 -140 -20 3 -15 20 -17 135 -20 111 -2 131 -5 127 -17 -5 -11 -24
                                    -15 -81 -15 -66 0 -74 -2 -71 -17 2 -14 16 -19 63 -23 l59 -5 -48 -42 c-116
                                    -102 -294 -97 -400 13 -38 39 -70 99 -81 152 l-7 32 116 0 c109 0 116 1 116
                                    20 0 19 -7 20 -116 20 -102 0 -115 2 -110 16 3 9 6 20 6 25 0 5 62 9 141 9
                                    128 0 140 2 137 18 -3 15 -20 18 -136 22 l-133 5 32 48 c38 58 100 102 171
                                    122 65 18 126 11 193 -20z"/>
                                    <path d="M1432 1263 c3 -15 13 -18 58 -18 42 0 55 3 55 15 0 11 -14 16 -58 18
                                    -52 3 -58 1 -55 -15z"/>
                                    <path d="M408 1665 c-98 -37 -158 -124 -158 -227 0 -140 101 -242 240 -242
                                    139 0 240 102 240 241 -1 96 -53 178 -139 219 -47 23 -136 27 -183 9z m160
                                    -40 c98 -42 149 -161 111 -262 -18 -49 -79 -103 -136 -119 -48 -14 -58 -14
                                    -106 0 -57 16 -118 70 -136 119 -27 72 -4 173 51 224 54 51 145 67 216 38z"/>
                                    <path d="M855 1173 c-250 -33 -433 -274 -395 -520 23 -151 120 -282 258 -350
                                    66 -33 85 -38 167 -41 151 -7 261 36 359 138 95 99 131 199 124 345 -3 82 -8
                                    101 -41 167 -67 137 -199 235 -347 258 -66 10 -71 10 -125 3z m227 -75 c56
                                    -26 128 -77 128 -90 0 -3 -25 2 -55 13 -70 24 -147 24 -227 -1 -77 -24 -178
                                    -26 -241 -4 l-47 16 22 18 c75 57 153 80 268 77 79 -2 105 -7 152 -29z m83
                                    -122 c22 -8 53 -15 68 -16 24 0 32 -8 57 -62 50 -106 41 -114 -85 -78 -40 11
                                    -100 20 -140 20 -40 0 -102 -9 -143 -20 -91 -25 -195 -25 -291 0 -41 11 -83
                                    20 -93 20 -24 0 -23 12 7 68 47 90 58 95 136 66 63 -23 179 -21 254 5 68 24
                                    160 23 230 -3z m-514 -201 c60 -22 190 -19 274 5 84 24 195 26 255 5 24 -8 67
                                    -18 97 -21 l53 -7 0 -56 c0 -31 -3 -67 -7 -80 -5 -21 -9 -23 -54 -17 -26 4
                                    -67 13 -90 21 -60 22 -190 19 -274 -5 -38 -11 -99 -20 -135 -20 -36 0 -97 9
                                    -135 20 -38 11 -85 20 -102 20 l-33 0 0 73 c0 41 3 77 8 81 9 10 90 -1 143
                                    -19z m4 -197 c89 -23 179 -20 256 8 76 27 164 29 254 6 44 -12 91 -23 105 -24
                                    19 -2 24 -8 22 -23 -5 -32 -73 -125 -91 -125 -9 0 -38 7 -65 15 -66 20 -121
                                    19 -197 -4 -121 -37 -149 -36 -293 3 -32 8 -65 24 -72 33 -18 23 -64 119 -64
                                    132 0 12 29 8 145 -21z m483 -184 c36 -10 26 -23 -42 -55 -125 -58 -252 -57
                                    -374 5 -66 34 -74 48 -15 30 63 -19 147 -17 213 6 54 18 172 26 218 14z"/>
                                    </g>
                                    </svg>
                                    <h1>Space Coo.</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



<body class="close">


    <div class="loader-container">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>


    <div class="sidebar close">
        <section>
        <div class="sidebarHeader">
            
            <a href="<?php 
                    if(isset($_SESSION["userEmail"])) echo "profile.php";
                    else echo "#"
                ?>">
                <p class="profpic"><?php 
                    if(isset($_SESSION["userEmail"])) echo explode(" ", $_SESSION["userName"])[0][0] . explode(" ", $_SESSION["userName"])[1][0];
                    else echo "SC"
                ?></p>
            </a>
            
            <div class="names">
                <p class="fullname text"><?php 
                    if(isset($_SESSION["userEmail"])) echo $_SESSION["userName"];
                    else echo "Space Coo."
                ?></p>
                <p class="role text"><?php 
                    if(isset($_SESSION["userEmail"])) echo $_SESSION["roleId"] == 2 ? 'Diák' : ($_SESSION["roleId"] == 1 ? 'Tanár' : '');
                ?></p>
            </div>
            <i class='bx bx-chevron-right toggle' onclick="openSidebar()"></i>
        </div>
        <div class="container-fluid">
            <ul class="nav">
            <li class="navlink">
                    <a href="index.php">
                        <i class='bx bx-home navicon' ></i>
                        <span class="text">Főoldal</span>
                    </a>
                </li>
                <li class="navlink">
                    <a href="#">
                        <i class='bx bx-task navicon' ></i>
                        <span class="text">Elérhető tesztek</span>
                    </a>
                </li>
                <li class="navlink">
                    <a href="#">
                        <i class='bx bx-line-chart navicon'></i>
                        <span class="text">Eredmények</span>
                    </a>
                </li>
                <?php if (isset($_SESSION["roleId"]) && $_SESSION["roleId"] === 1) {?>
                <li class="navlink">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#addTestModal">
                        <i class='bx bx-list-plus navicon' ></i>
                        <span class="text">Teszt létrehozása</span>
                    </a>
                </li>
                
                <li class="navlink">
                    <a href="tests.php">
                        <i class='bx bx-list-ul navicon' ></i>
                        <span class="text">Saját tesztek</span>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
        </section>
        <div class="container-fluid sidebarFooter">
            <ul class="nav">
                <?php
                    if (!isset($_SESSION["userEmail"])) {
                        echo '
                        <li class="navlink">
                            <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
                                <i class="bx bx-log-in navicon"></i>
                                <span class="text">Belépés</span>
                            </a> 
                        </li>
                        ';
                    } else {
                        echo '
                        <li class="navlink">
                            <form action="includes/include.logout.php" method="post" id="logoutForm">
                                <input type="hidden" name="logout" value="1">
                                <a href="javascript:{}" onclick="document.getElementById(\'logoutForm\').submit();">
                                    <i class="bx bx-log-out navicon"></i>
                                    <span class="text">Kilépés</span>
                                </a> 
                            </form>
                        </li>
                        ';
                    }
                ?>
                
                
                <li class="navlink">
                    <a href="#" id="theme-toggle">
                        <i id="themeToggleIcon" class='bx bxs-moon navicon'></i>
                        <span class="text">Világos/Sötét</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
