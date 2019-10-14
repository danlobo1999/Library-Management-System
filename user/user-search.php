<?php
include('DB_Connect/session.php');
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
                    <form class="form-inline active-pink-3 active-pink-4" id="search">
                        <i class="fa fa-search" aria-hidden="true" style="font-size: 35px; color: #d83f07"></i>
                        <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search" aria-label="Search" style="font-size: 25px; color: #111111">
                    </form>
                </div>
                <div id="searchby">
                    <p style="display: inline-block">Search By :&nbsp</p>
                    <label class="radio-inline" style="color: #d83f07"><input type="radio" name="optradio" checked> Name</label>
                    <label class="radio-inline" style="color: #d83f07"><input type="radio" name="optradio"> Author</label>
                    <label class="radio-inline" style="color: #d83f07"><input type="radio" name="optradio"> Category</label>
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
                        <tr>
                            <td>1234</td>
                            <td>Theory of Computer Science</td>
                            <td>Daniel Lobo</td>
                            <td>TCS</td>
                            <td><button type="button" id="mybutton" class="btn btn-secondary">Borrow</button></td>
                        </tr>
                        <tr>
                            <td>1234</td>
                            <td>Theory of Computer Science</td>
                            <td>Daniel Lobo</td>
                            <td>TCS</td>
                            <td><button type="button" id="mybutton" class="btn btn-secondary">Borrow</button></td>
                        </tr>
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




