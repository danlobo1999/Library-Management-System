<?php
include('../DB_Connect/session.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Library</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
    <link rel="stylesheet" href="admin.css">
</head>

<body onload="javascript:colorLink()">
<div class="container-fluid" id="header">
    <h1><strong>SFIT Online Library</strong></h1>
    <p>Your link to the past & gateway to the future.</p>
</div>
<nav class="navbar navbar-expand-sm navbar-custom sticky-top " >
    <a class="navbar-brand" href="#">Admin</a>
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="tablink" href="admin-home.php" id="admin-home" style="text-decoration: none;">Dashboard</a>
        </li>
        <li class="nav-item">
            <a class="tablink" href="admin-users.php" id="admin-members" style="text-decoration: none;">Members</a>
        </li>
        <li class="nav-item">
            <a class="tablink" href="admin-books.php" id="admin-books" style="text-decoration: none;">Search&nbspBooks</a>
        </li>
        <li class="nav-item">
            <a class="tablink" href="admin-issue.php" id="admin-issue" style="text-decoration: none;">Issue&nbspBooks</a>
        </li>
        <li class="nav-item">
            <a class="tablink" href="admin-add.php" id="admin-add" style="text-decoration: none;">Add&nbspBooks</a>
        </li>

        <li class="nav-item">
            <a class="tablink" href="admin-issued.php" id="admin-issued" style="text-decoration: none;">Issued&nbspBooks</a>
        </li>
        <li class="nav-item">
            <a class="tablink" href="admin-outstanding.php" id="admin-outstanding" style="text-decoration: none;">Outstanding&nbspBooks</a>
        </li>
        <li class="nav-item">
            <a class="tablink" href="admin-profile.php" id="admin-profile" style="text-decoration: none;">Profile</a>
        </li>
        <li class="nav-item">
            <a class="tablink" href="../DB_Connect/logout.php" id="admin-logout" style="text-decoration: none;">Logout</a>
        </li>
    </ul>
</nav>
<div class="container-fluid" id="main">
    <div id="profile" class="shomepage">
        <div class="card" id="aprofile">
            <div class="minicard" id="image" >
                <img src="../images/user.svg">
            </div>
            <div class="minicard" id="user-name">
                <?php
                $username = $_SESSION['login_user'];
                $sql = "select f_name, l_name, acc_type from `member` where `username` = '$username'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                echo '<p class="word1" style="text-align: center; font-size: 60px; color: #f1f1f1">'.$row["f_name"].' '.$row["l_name"].'</p>';
                echo '<p class="word2" style="text-align: center; font-size: 25px; color: #f1f1f1">Account type : '.$row["acc_type"].'</p>';
                ?>
            </div>
            <div class="card" id="user-details" style="width: 50%; margin-top: 80px; margin-left: 30%">
                <?php
                $username = $_SESSION['login_user'];
                $sql = "select email, phone from `member` where `username` = '$username'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                echo '<p class="w" style="text-align: center; margin-left: -20%;font-size: 30px; color: #f1f1f1">User Details</p><br>';
                echo '<p class="w" style="float: left; width: 50%;margin-left: 20%; text-align: left; font-size: 25px; color: #f1f1f1">Username&nbsp:&nbsp</p><p class="w" style="margin-left: 50%;margin-top: -8%; text-align: left; font-size: 25px; color: #d83f07">'.$username.'</p>';
                echo '<p class="w" style="float: left; width: 50%;margin-left: 20%; text-align: left; font-size: 25px; color: #f1f1f1">Email&nbsp:&nbsp</p><p class="w" style="margin-left: 50%;margin-top: -8%; text-align: left; font-size: 25px; color: #d83f07">'.$row["email"].'</p>';
                echo '<p class="w" style="float: left; width: 50%;margin-left: 20%; text-align: left; font-size: 25px; color: #f1f1f1">Phone&nbsp:&nbsp</p><p class="w" style="margin-left: 50%;margin-top: -8%; text-align: left; font-size: 25px; color: #d83f07">'.$row["phone"].'</p>';
                ?>
            </div>
        </div>
    </div>
    <div class="footer" style="padding: 2%;text-align: left;font-size: 20px ;background: #101010;color: #d83f07;width:100%;height:100%;">
        <a style="color: #d83f07; text-decoration: none" href="../about.php" >About The creators</a>
        <br>
        <a style="color: #d83f07; text-decoration: none" href="../feedback.php" >Submit Feedback</a>
    </div>
</div>
<script>
    function colorLink() {
        document.getElementById("admin-profile").style.color = "#d83f07";
    }
    var textWrapper = document.querySelector('.word1');
    textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");
    var textWrapper1 = document.querySelector('.word2');
    textWrapper1.innerHTML = textWrapper1.textContent.replace(/\S/g, "<span class='letter1'>$&</span>");

    anime.timeline({loop: 1})
        .add({
            targets: '.word1 .letter, .word2 .letter1',
            translateX: [40,0],
            translateZ: 0,
            opacity: [0,1],
            easing: "easeOutExpo",
            duration: 6000,
            delay: (el, i) => 500 + 30 * i
        })


    anime.timeline({loop: 1})
        .add({
            targets: '.word .letter',
            translateX: [40,0],
            translateZ: 0,
            opacity: [0,1],
            easing: "easeOutExpo",
            duration: 3000,
            delay: (el, i) => 500 + 30 * i
        })

    anime.timeline({loop: 1})
        .add({
            targets: '.w',
            scale: [9,1],
            opacity: [0,1],
            easing: "easeOutCirc",
            duration: 800,
            delay: (el, i) => 300 * i
        })
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>