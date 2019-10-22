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
        <div id="search" class="shomepage">
            <div id="searchcard" class="card" >
                <p style="font-size: 40px; text-align: center; color: #f1f1f1">Search for Books</p>
                <div id="searchbooks" style="padding: 2%;padding-left: 16%">
                    <form class="form-inline active-pink-3 active-pink-4" id="search" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                        <button class="btn" type="submit" value="s_button" name='button' id="s_button"><i class="fa fa-search" aria-hidden="true" style="font-size: 35px; color: #d83f07"></i></button>
                        <input name="searchbar" type="text" class="form-control form-control-sm ml-3 w-75"  placeholder="Search" aria-label="Search" style="font-size: 25px; color: #111111">
                </div>
                <div id="searchby">
                    <p style="display: inline-block">Search By :&nbsp</p>
                    <label class="radio-inline" style="color: #d83f07"><input type="radio" name="optradio" value="Name" checked> Name</label>
                    <label class="radio-inline" style="color: #d83f07"><input type="radio" name="optradio" value="Author"> Author</label>
                    <label class="radio-inline" style="color: #d83f07"><input type="radio" name="optradio" value="Category"> Subject</label>
                </div>
            </div>
            <div id="result" class="card">
                <div class="container" id="searchtable">
                    <p style="text-align: center; font-size: 30px; color: #f1f1f1; padding: 15px; padding-top: 20px">Search Results</p>
                    <table class="table table-dark">
                        <thead>
                        <tr>
                            <th>ISBN</th>
                            <th>Name</th>
                            <th>Author</th>
                            <th>Subject</th>
                            <th>Borrow</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if ($_POST["button"]=='s_button') {
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $search = test_input($_POST['searchbar']);
                                $search_by = test_input($_POST['optradio']);
                                if($search != '' and $search_by = "Name"){
                                    $sql = "SELECT ISBN, Title, Author, Category FROM `books` WHERE `Title` LIKE '%$search%'";
                                    $result = mysqli_query($conn, $sql);

                                }
                                elseif ($search != '' and $search_by = "Author"){
                                    $sql = "SELECT ISBN, Title, Author, Category FROM `books` WHERE `Author` LIKE '%$search%'";
                                    $result = mysqli_query($conn, $sql);
                                }
                                elseif ($search != '' and $search_by = "Category"){
                                    $sql = "SELECT ISBN, Title, Author, Category FROM `books` WHERE `Category` LIKE '%$search%'";
                                    $result = mysqli_query($conn, $sql);
                                }
                                if ($result->num_rows > 0) {
                                    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                        $value = $row["ISBN"];
                                        echo "<tr><td><form method='post' action=''>".$row["ISBN"]."</td>
                                                <td>".$row["Title"]."</td>
                                                <td>".$row["Author"]."</td>
                                                <td>".$row["Category"]."</td>
                                                <td><input onclick='return confirm(\"Are you sure you want to borrow this book?\")' type=\"submit\" name=\"action\" value=\"Borrow\"/><input type=\"hidden\" name=\"id\" value=\"$value\"></form></td>
                                            </tr>";
                                    }
                                }
                            }
                        }
                        if ($_POST["action"] && $_POST['id']) {
                            $isbn = $_POST['id'];
                            $sql = "SELECT copies FROM `books` WHERE `ISBN` = '$isbn'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            $copies = $row["copies"];
                            if($copies>0) {
                                $username = $_SESSION['login_user'];
                                $usertype = $_SESSION['login_type'];
                                $sql = "SELECT UID FROM `member` WHERE `username` = '$username'";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                $uid = $row["UID"];
                                $borrow_total = '5';
                                if ($usertype == "faculty") {
                                    $borrow_total = '15';
                                }
                                $sql = "SELECT COUNT(*) FROM `borrow` WHERE `isbn` = '$isbn' AND `id` IN (SELECT UID FROM `member` WHERE `username` = '$username')";
                                $result = mysqli_query($conn, $sql);
                                $row = mysqli_fetch_row($result);
                                $taken = $row[0];
                                if($taken==0) {
                                    $sql = "SELECT COUNT(*) FROM `borrow` WHERE `issued` = '1' AND `id` IN (SELECT UID FROM `member` WHERE `username` = '$username')";
                                    $result = mysqli_query($conn, $sql);
                                    $row = mysqli_fetch_row($result);
                                    $borrow_count = $row[0];
                                    if ($borrow_count < $borrow_total){
                                        $sql = "SELECT COUNT(*) FROM `borrow` WHERE `issued` = '1' AND `return_date` < CURRENT_DATE AND `id` IN (SELECT UID FROM `member` WHERE `username` = '$username')";
                                        $result = mysqli_query($conn, $sql);
                                        $row = mysqli_fetch_row($result);
                                        $overdue = $row[0];
                                        if($overdue == 0){
                                            $sql = "INSERT INTO `borrow`(`id`, `isbn`, `issue_date`, `return_date`, `renew_count`, `issued`) VALUES ('$uid','$isbn',CURRENT_DATE , DATE_ADD(now(),INTERVAL 7 DAY),'0','0')";
                                            if ($conn->query($sql) === TRUE) {
                                                mysqli_query($conn,"UPDATE `books` SET `Copies` = `Copies`-1 WHERE `ISBN` = '$isbn'");
                                                echo '<script language="javascript">';
                                                echo 'alert("Success! Your borrow request has been sent to the admin for approval.")';
                                                echo '</script>';
                                            }else {
                                                echo '<script language="javascript">';
                                                echo "Error: " . $sql . "<br>" . $conn->error;
                                                echo '</script>';
                                            }
                                        }else{
                                            echo '<script language="javascript">';
                                            echo 'alert("You have book/s overdue! You cannot borrow more books!")';
                                            echo '</script>';
                                        }
                                    } else {
                                        echo '<script language="javascript">';
                                        echo 'alert("You have borrowed the maximum amount of books!")';
                                        echo '</script>';
                                    }
                                }else{
                                    echo '<script language="javascript">';
                                    echo 'alert("You have already borrowed this book!")';
                                    echo '</script>';
                                }
                            }
                            else{
                                echo '<script language="javascript">';
                                echo 'alert("There are no more copies left of this book!")';
                                echo '</script>';
                            }
                        }

                        function test_input($data) {
                            $data = trim($data);
                            $data = stripslashes($data);
                            $data = htmlspecialchars($data);
                            return $data;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">

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
            document.getElementById("user-search").style.color = "#d83f07";
            document.getElementById("user-books").style.color = "#d83f07";
        }
    </script>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>




