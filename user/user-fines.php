<?php
include('../DB_Connect/session.php');
$username = $_SESSION["login_user"];
$sql = "SELECT COUNT(*) FROM `borrow` WHERE `issued` = '1' AND `id` IN (SELECT UID FROM `member` WHERE `username` = '$username')";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($result);
$borrowed = $row[0];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Library</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="user.css">
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
    <div id="fines" class="shomepage">
        <div id="book-fines" class="card">
            <div id="result" class="card">
                <p style="text-align: center; font-size: 30px; color: #f1f1f1;">Fines</p>
                <div class="container" id="searchtable">
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th>ISBN</th>
                            <th>Name</th>
                            <th>Return Date</th>
                            <th>Days Overdue</th>
                            <th>Fine Amount (Rs.)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            if($borrowed>0){
                            $sql = "SELECT a.isbn, b.Title, a.return_date FROM borrow a, books b WHERE a.isbn = b.ISBN AND a.return_date < CURRENT_DATE AND a.issued = '1' AND a.id IN (SELECT UID FROM `member` WHERE `username` = '$username')";
                            $result = mysqli_query($conn, $sql);
                                if ($result->num_rows > 0) {
                                    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                        $overdue = 0;
                                        $today = date("Y-m-d");
                                        if ($row["return_date"] < $today) {
                                            $overdue = dateDiffInDays($row["return_date"], $today);
                                        }
                                        $fine = 5 * $overdue;
                                        echo "<tr><td>" . $row["isbn"] . "</td>
                                                <td>" . $row["Title"] . "</td>
                                                <td>" . $row["return_date"] . "</td>
                                                <td>" . $overdue . "</td>
                                                <td>" . $fine . "</td></tr>";

                                    }
                                }
                            }
                            function dateDiffInDays($date1, $date2){
                                $diff = strtotime($date2) - strtotime($date1);
                                return abs(round($diff / 86400));
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer" style="padding: 15px;text-align: left;background: #101010;color: #d83f07;position:relative;bottom:0;width:100%;height:100%;font-size: 25px;box-shadow: 0 50vh 0 50vh #101010;">
    <a style="padding: 5px; color: #d83f07; text-decoration: none" href="../about.php" >About The creators</a>
    <br><br>
    <a style="padding: 5px;color: #d83f07; text-decoration: none" href="../feedback.php" >Submit Feedback</a>
</div>

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
        document.getElementById("user-fines").style.color = "#d83f07";
    }
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>




