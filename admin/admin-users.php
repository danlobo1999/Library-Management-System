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
    <div id="search" class="shomepage">
        <div id="searchcard" class="card" >
            <p style="font-size: 40px; text-align: center; color: #f1f1f1">Search for Members</p>
            <div id="searchusers" style="padding: 2%;padding-left: 16%">
                <form class="form-inline active-pink-3 active-pink-4" id="search" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <button class="btn" type="submit" value="s_button" name='button' id="s_button"><i class="fa fa-search" aria-hidden="true" style="font-size: 35px; color: #d83f07"></i></button>
                    <input name="searchbar" type="text" class="form-control form-control-sm ml-3 w-75"  placeholder="Search" aria-label="Search" style="font-size: 25px; color: #111111">
            </div>
            <div id="searchby">
                <p style="display: inline-block">Search By :&nbsp</p>
                <label class="radio-inline" style="color: #d83f07"><input type="radio" name="radio" value="f_name" checked> First Name</label>
                <label class="radio-inline" style="color: #d83f07"><input type="radio" name="radio" value="l_name" > Last Name</label>
                <label class="radio-inline" style="color: #d83f07"><input type="radio" name="radio" value="u_name" > Username</label>
                <label class="radio-inline" style="color: #d83f07"><input type="radio" name="radio" value="id" > ID</label>
            </div>
        </div>
        <div id="result" class="card">
            <div class="container" id="searchtable">
                <p style="text-align: center; font-size: 30px; color: #f1f1f1; padding: 15px; padding-top: 20px">Members</p>
                <table class="table table-dark">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Account Type</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($_POST["button"]=='s_button') {
                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $search = test_input($_POST['searchbar']);
                                if (isset($_POST['radio'])) {
                                    $radio_input = test_input($_POST['radio']);
                                }
                                if($search != '' and $radio_input = "f_name"){
                                    $sql = "SELECT UID, f_name, l_name, username, acc_type FROM `member` WHERE `f_name` LIKE '%$search%'";
                                    $result = mysqli_query($conn, $sql);
                                }
                                elseif ($search != '' and $radio_input = "l_name"){
                                    $sql = "SELECT UID, f_name, l_name, username, acc_type FROM `member` WHERE `l_name` LIKE '%$search%'";
                                    $result = mysqli_query($conn, $sql);
                                }
                                elseif ($search != '' and $radio_input = "u_name"){
                                    $sql = "SELECT UID, f_name, l_name, username, acc_type FROM `member` WHERE `username` ='$search'";
                                    $result = mysqli_query($conn, $sql);
                                }
                                elseif ($search != '' and $radio_input = "id"){
                                    $sql = "SELECT UID, f_name, l_name, username, acc_type FROM `member` WHERE `UID` ='$search'";
                                    $result = mysqli_query($conn, $sql);
                                }
                                else{
                                    $sql = "SELECT UID, f_name, l_name, username, acc_type FROM `member`";
                                    $result = mysqli_query($conn, $sql);
                                }
                                if ($result->num_rows > 0) {
                                    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                        echo "<tr><td>".$row["UID"]."</td>
                                                <td>".$row["f_name"]."</td>
                                                <td>".$row["l_name"]."</td>
                                                <td>".$row["username"]."</td>
                                                <td>".$row["acc_type"]."</td>
                                            </tr>";
                                    }
                                }
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

    <div class="footer">

    </div>
</div>
<script>
    function colorLink() {
        document.getElementById("admin-members").style.color = "#d83f07";
    }
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>