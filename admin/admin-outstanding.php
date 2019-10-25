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
    <div id="result" class="card">
        <div class="container" id="searchtable">
            <p style="text-align: center; font-size: 30px; color: #f1f1f1; padding: 15px; padding-top: 20px">Outstanding Books</p>
            <table class="table table-dark">
                <thead>
                <tr>
                    <th>Member ID</th>
                    <th>ISBN</th>
                    <th>Title</th>
                    <th>Issue Date</th>
                    <th>Return Date</th>
                    <th>Days Overdue</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT a.id, a.isbn, b.Title, a.issue_date, a.return_date FROM borrow a, books b WHERE a.issued='1' AND a.isbn = b.ISBN AND `return_date`<CURRENT_DATE ";
                    $result = mysqli_query($conn, $sql);
                    if ($result->num_rows > 0) {
                        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
                            $overdue = 0;
                            $today = date("Y-m-d");
                            if ($row["return_date"] < $today) {
                                $overdue = dateDiffInDays($row["return_date"], $today);
                            }
                            echo "<tr><td>".$row["id"]."</td>
                                    <td>".$row["isbn"]."</td>
                                    <td>".$row["Title"]."</td>
                                    <td>".$row["issue_date"]."</td>
                                    <td>".$row["return_date"]."</td>
                                    <td>". $overdue ."</td>
                                    </tr>";
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

<div class="footer" style="padding: 15px;text-align: left;background: #101010;color: #d83f07;position:relative;bottom:0;width:100%;height:100%;font-size: 25px;box-shadow: 0 50vh 0 50vh #101010;">
        <a style="padding: 5px; color: #d83f07; text-decoration: none" href="../about.php" >About The creators</a>
        <br><br>
        <a style="padding: 5px;color: #d83f07; text-decoration: none" href="../feedback.php" >Submit Feedback</a>
    </div>
</div>
<script>
    function colorLink() {
        document.getElementById("admin-outstanding").style.color = "#d83f07";
    }
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>