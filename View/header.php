<?php
/**
 * Created by PhpStorm.
 * User: Yujie Lyu
 * Date: 2019-09-11
 * Time: 23:12
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Facebook-Lite</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--    CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--    icons-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!--    jQuery-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <!--    popper.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <!--    Latest compiled JavaScript-->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
</head>

<!--background：Facebook bg #E9EBEE-->
<body id="Facebook-Lite" style="background-color: #E9EBEE;">
<nav class="navbar" style="background: #3b5998">
    <!-- Brand/logo -->
    <a href="MainPage.php">
        <img src="../resources/fb_logo.jpg" alt="logo" style="width:35px;">
    </a>
    <?php
    session_start();
    require_once("../Controllers/DBConnect.php");
    require_once("../Controllers/UserAccount.php");
    if (isset($_POST['SearchRequest'])):
        $users = new UserAccount();
        $users->searchUsers();
    endif;
    ?>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search" name="SearchRequest" id="search-request">
            <div class="input-group-append">
                <button type="submit" class="btn btn-outline input-group-text">Search</button>
            </div>
        </div>

    </form>
    <h4 class="text-white text-sm">Welcome to Facebook-Lite</h4>
</nav>

