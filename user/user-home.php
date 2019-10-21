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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>
        <link rel="stylesheet" type="text/css" href="user.css" />
    </head>

    <body onload="javascript:colorLink()">
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" id="cbutton">&times;</a>
            <a class="tablink" href="user-home.php" id="user-home" style="margin-top: 100px">Dashboard</a>
            <button class="tablink" id="user-books" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="display: inline-block">Books&nbsp&#8595;</button>
            <div class="collapse" id="collapseExample">
                <a class="tablink" href="user-search.php" id="user-search" style="padding-left: 50px">Search&nbsp/&nbspBorrow</a>
                <a class="tablink" href="user-return.php" id="user-return" style="padding-left: 50px">Return&nbsp/&nbspRenew</a>
                <a class="tablink" href="user-request.php" id="user-request" style="padding-left: 50px">Request</a>
            </div>
            <a class="tablink" href="user-fines.php" id="user-fines">Fines</a>
            <a class="tablink" href="user-profile.php" id="user-profile">View&nbspProfile</a>
            <a href="../DB_Connect/logout.php" class="tablink" style="position: fixed; top: 650px">Logout</a>
        </div>

        <div class="header">
            <button class="openbtn" onclick="openNav()" style="float: left">☰</button>
            <h1><strong>SFIT Online Library</strong></h1>
            <p>Your link to the past & gateway to the future.</p>
        </div> 

        <div id="main">
            <div id="dashboard" class="shomepage">
                <div id="welcome" class="card" style="height: 400px; font-size: 20px">
                    <div class="minicard" id="u-pie">
                            <canvas id="myChart"></canvas>
                    </div>
                    <div class="minicard" id="w-user">
                        <p class="word1" style="text-align: center; font-size: 90px; color: #f1f1f1; font-family: 'American Typewriter'; letter-spacing: 2px; margin-top: 3%" >Welcome</p>
                        <?php
                            $username = $_SESSION['login_user'];
                            $sql = "select f_name from member where `username` = '$username'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                            echo '<p class="word2" style="text-align: center; font-size: 70px; color: #d83f07; font-family: \'American Typewriter\'; letter-spacing: 3px">'.$row["f_name"].'</p>';
                        ?>
                    </div>
                </div>
                <div id="issuedbooks" class="card" >
                    <p style="font-size: 30px">Borrowed Books</p>
                </div>
                <div id="outstandingbooks" class="card">
                    <p style="font-size: 30px">Outstanding Books</p>
                </div>
            </div>
        </div>

        <div class="footer">

        </div>

        <script type="text/javascript">
            var ctx = document.getElementById("myChart").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ["Books you have borrowed", "Books you can borrow"],
                    datasets: [{
                        backgroundColor: [
                            "#ffa600",
                            "#d83f07"
                        ],
                        data: [2, 1]
                    }]
                },
                options: {
                    legend: {
                        labels: {
                            fontColor: '#f1f1f1f1',
                            fontSize: 20,
                            padding: 20
                        }
                    }
                }
            });
        </script>

        <script>
           function openNav() {
                document.getElementById("mySidenav").style.width = "250px";
                document.getElementById("main").style.marginLeft = "250px";
                document.getElementById("main").style.opacity=0.3;
            }
            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
                document.getElementById("main").style.opacity=1;
            }
           function colorLink() {
               document.getElementById("user-home").style.color = "#d83f07";
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
        </script>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>