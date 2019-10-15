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
        <link rel="stylesheet" href="admin.css">
    </head>

    <body onload="javascript:colorLink()">
        <div class="container-fluid" id="header">
            <h1><strong>SFIT Online Library</strong></h1>
            <p>Your link to the past & gateway to the future.</p>
        </div>
        <nav class="navbar navbar-expand-sm navbar-custom sticky-top " >
            <a class="navbar-brand" href="#">Library Admin</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="tablink" href="admin-home.php" id="admin-home" style="text-decoration: none;">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="tablink" href="admin-users.php" id="admin-members" style="text-decoration: none;">Members</a>
                </li>
                <li class="nav-item">
                    <a class="tablink" href="admin-books.php" id="admin-books" style="text-decoration: none;">Books</a>
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
            <div id="dashboard" class="shomepage">
                <div id="welcome" class="card" style="height: 400px; font-size: 20px">
                    <div class="minicard" id="a-user">
                        <p class="word1" style="text-align: center; font-size: 110px; color: #f1f1f1; font-family: 'American Typewriter'; letter-spacing: 2px" >Welcome</p>
                        <p class="word2" style="text-align: center; font-size: 90px; color: #d83f07; font-family: 'American Typewriter'; letter-spacing: 3px">Daniel</p>
                    </div>
                </div>
                <div id="issuedbooks" class="card" style="height: 550px">
                    <p style="font-size: 50px">Issued Books</p>
                    <div class="minicard" id="a-pie-i">
                        <canvas id="myChart1"></canvas>
                    </div>
                </div>
                <div id="outstandingbooks" class="card" style="height: 550px">
                    <p style="font-size: 50px">Outstanding Books</p>
                    <div class="minicard" id="a-pie-o">
                        <canvas id="myChart2"></canvas>
                    </div>
                </div>
            </div>

            <div class="footer">

            </div>
        </div>
        <script type="text/javascript">
            var ctx = document.getElementById("myChart1").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ["Books issued", "Books that can be issued"],
                    datasets: [{
                        backgroundColor: [
                            "#0d71db",
                            "#d83f07"
                        ],
                        data: [40, 165]
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
        <script type="text/javascript">
            var ctx = document.getElementById("myChart2").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ["Outstanding Books", "Non-outstanding Books"],
                    datasets: [{
                        backgroundColor: [
                            "#0d71db",
                            "#d83f07"
                        ],
                        data: [5, 35]
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
            function colorLink() {
                document.getElementById("admin-home").style.color = "#d83f07";
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