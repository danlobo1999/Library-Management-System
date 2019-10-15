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
<nav class="navbar navbar-expand-sm navbar-custom sticky-top">
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
    <div id="result" class="card">
        <div class="container" id="searchtable">
            <p style="text-align: center; font-size: 30px; color: #f1f1f1; padding: 15px; padding-top: 20px">Requested Books</p>
            <table class="table table-dark">
                <thead>
                <tr>
                    <th>ISBN</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Copies</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1598</td>
                    <td>Theory of Computer Science</td>
                    <td>Daniel Lobo</td>
                    <td>5</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div id="admin-add" class="shomepage">
        <div id="add-books" class="card">
            <div style="margin-left: 10%; width: 30%; margin-top: 5%">
                <img src="../images/add_book.svg">
            </div>
            <div style="margin-left: 25%; margin-top: -35%">
                <form class="add-form" method="post">
                    <p style="text-align: center; font-size: 30px; color: #f1f1f1; padding: 15px; padding-top: 5px">Add a book</p>
                    <div class="input-container">
                        <input class="input-field" type="text" placeholder="Book name" name="bknm">
                    </div>

                    <div class="input-container">
                        <input class="input-field" type="text" placeholder="Author's name" name="anm">
                    </div>
                    <div class="input-container">
                        <input class="input-field" type="text" placeholder="ISBN" name="isbn">
                    </div>
                    <div class="input-container">
                        <input class="input-field" type="text" placeholder="Subject" name="sub">
                    </div>
                    <div class="input-container">
                        <input class="input-field" type="text" placeholder="Copies" name="copies">
                    </div>
                    <button type="button" id="mybutton" class="btn btn-secondary">Add Book</button>
                </form>
            </div>
        </div>
    </div>

    <div class="footer">

    </div>
</div>
<script>
    function colorLink() {
        document.getElementById("admin-add").style.color = "#d83f07";
    }
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>