<?php
     include('session.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Online Library</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.js">
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
                background-color: #050606;
            }

            .header {
                padding: 10px;
                text-align: center;
                background: #101010;
                /*color: #189bcc;*/
                color: #d83f07;
                line-height: 0.4cm;
            }

            .header h1 {
                font-size: 47px;
                margin-right: 4%;
            }

            .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #101010;
            overflow-x: hidden;
            padding-top: 60px;
            transition: 0.5s;
            }

            .sidenav a {
            padding: 12px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
            }

            .sidenav a:hover {
            color: #f1f1f1;
            }

            .sidenav .closebtn {
            position: absolute;
            top: 10px;
            left: 0px;
            font-size: 45px;
            }

            .openbtn {
                font-size: 30px;
                cursor: pointer;
                background-color: #101010;
                color: white;
                padding: 10px 15px;
                border: none;
                position: relative;
                top: 25px;
                left: 16px;
                border-radius: 10px;
            }

            .tablink {
                background-color: #101010;
                border: none;
                outline: none;
                cursor: pointer;
                padding: 10px 8px 5px 32px;
                text-align: center;
                text-decoration: none;
                font-size: 25px;
                color: #818181;
                display: block;
            }

            .tablink:hover {
                color: #f1f1f1;
            }

            .card {
                text-align: center;
                padding: 1%;
                background-color: #101010;
                color: #f1f1f1;
                border-radius: 0;
            }

            #issuedbooks {
                float: left;
                margin: 1%;
                margin-right: 2%;
                width: 47%;
            }

            #outstandingbooks {
                /*float: right;*/
                margin: 1%;
                margin-top: 2%;
                margin-left: 50%;
                /*width: 45%;*/
            }

            #welcome {
                margin-left: 3%;
                margin-right: 3%;
                margin-top: 3%;
            }

            #main {
                transition: margin-left .5s;
                padding: 20px;
            }

            #searchcard, #result, #return_books, #request-books, #book-fines, #welcome{
                margin: 1%;
                padding: 2%;
            }

            #result{
                margin-top: 2%;
            }

            #profile {
                margin: 1%;
            }

            .radio-inline {
                padding: 10px;

            }

            #searchby {
                padding: 10px;
                font-size: 20px;
                color: #f1f1f1;

            }

            #searchtable {
                text-align: left;
            }

            th, tr {
                background-color: #101010;
                color: white;
                font-size: 20px;
            }

            th {
                color: #d83f07;
            }

            #mybutton {
                background-color: #818181;
                color: black;
            }

            #request-books {
                text-align: center;
                padding: 5%;
            }

            .input-field {
                font-size: 16px;
                width: 100%;
                padding: 12px;
                outline: none;
            }

            .input-field:focus {
                border: 2px solid #d83f07;
            }

            .input-container {
                display: -ms-flexbox; /* IE10 */
                display: flex;
                text-align: center;
                width: 100%;
                margin-bottom: 25px;
                padding-left: 30%;
                padding-right: 30%;
            }

            .minicard {
                width: 100%;
                height: 200px;
                padding: 10px;
            }

            #image {
                width: 40%;
                float: left;
            }

            #user-name {
                width: 40%;
                margin-left: 40%;
                margin-top: -10%;
            }

            #user-details {
                margin-top: 50px;
            }

            /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
            @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
            }
        </style>
        <script>
            var popCanvas = document.getElementById("popChart");
            var barChart = new Chart(popCanvas, {
                type: 'bar',
                data: {
                    labels: ["China", "India", "United States", "Indonesia", "Brazil", "Pakistan", "Nigeria", "Bangladesh", "Russia", "Japan"],
                    datasets: [{
                        label: 'Population',
                        data: [1379302771, 1281935911, 326625791, 260580739, 207353391, 204924861, 190632261, 157826578, 142257519, 126451398],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)',
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)'
                        ]
                    }]
                }
            });
        </script>
    </head>
    <body>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" id="cbutton">&times;</a>
            <button class="tablink" style="margin-top: 100px" onclick="openPage('dashboard',this)" id="defaultOpen">Dashboard</button>
            <button class="tablink" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" style="display: inline-block">Books&nbsp&#8595;</button>
            <div class="collapse" id="collapseExample">
                <button class="tablink" onclick="openPage('search',this)" style="padding-left: 50px">Search&nbsp/&nbspIssue</button>
                <button class="tablink" onclick="openPage('return',this)" style="padding-left: 50px">Return&nbsp/&nbspRenew</button>
                <button class="tablink" onclick="openPage('request',this)" style="padding-left: 50px">Request</button>
            </div>
            <button class="tablink" onclick="openPage('fines',this)" >Fines</button>
            <button class="tablink" onclick="openPage('profile',this)" >View&nbspProfile</button>
            <a href="logout.php" class="tablink" style="position: fixed; top: 650px">Logout</a>
        </div>

        <div class="header">
            <button class="openbtn" onclick="openNav()" style="float: left">☰</button> 
            <h1><strong>SFIT Online Library</strong></h1>
            <p>Your link to the past & gateway to the future.</p>
        </div> 

        <div id="main">
            <div id="dashboard" class="shomepage">
                <div id="welcome" class="card" style="height: 400px; font-size: 20px">
                    <canvas id="popChart" width="600" height="400"></canvas>
                </div>
                <div id="issuedbooks" class="card" >
                    <p style="font-size: 30px; height: 300px">Issued Books</p>
                </div>
                <div id="outstandingbooks" class="card">
                    <p style="font-size: 30px; height: 300px">Outstanding Books</p>
                </div>

            </div>
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
                                <th>Issue</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1234</td>
                                <td>Theory of Computer Science</td>
                                <td>Daniel Lobo</td>
                                <td>TCS</td>
                                <td><button type="button" id="mybutton" class="btn btn-secondary">Issue</button></td>
                            </tr>
                            <tr>
                                <td>1234</td>
                                <td>Theory of Computer Science</td>
                                <td>Daniel Lobo</td>
                                <td>TCS</td>
                                <td><button type="button" id="mybutton" class="btn btn-secondary">Issue</button></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="return" class="shomepage">
                <div class="card" id="return_books">
                    <div id="result" class="card">
                        <p style="text-align: center; font-size: 30px; color: #f1f1f1; padding: 15px; padding-top: 5px">Issued Books</p>
                        <div class="container" id="searchtable">
                            <table class="table table-dark">
                                <thead>
                                <tr>
                                    <th>ISBN</th>
                                    <th>Name</th>
                                    <th>Issue Date</th>
                                    <th>Return Date</th>
                                    <th>Overdue</th>
                                    <th>Renew</th>
                                    <th>Return</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1234</td>
                                    <td>Theory of Computer Science</td>
                                    <td>07-10-19</td>
                                    <td>17-10-19</td>
                                    <td>-</td>
                                    <td><button type="button" id="mybutton" class="btn btn-secondary">Renew</button></td>
                                    <td><button type="button" id="mybutton" class="btn btn-secondary">Return</button></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="request" class="shomepage">
                <div id="request-books" class="card">
                    <form class="request-form" method="post">
                        <p style="text-align: center; font-size: 30px; color: #f1f1f1; padding: 15px; padding-top: 5px">Place a request for a book</p>
                        <div class="input-container">
                            <input class="input-field" type="text" placeholder="Book name" name="bknm">
                        </div>

                        <div class="input-container">
                            <input class="input-field" type="text" placeholder="Author's name" name="anm">
                        </div>
                        <button type="button" id="mybutton" class="btn btn-secondary">Place Request</button>
                    </form>
                </div>
            </div>
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
                                <tr>
                                    <td>1234</td>
                                    <td>Theory of Computer Science</td>
                                    <td>07-10-19</td>
                                    <td>3</td>
                                    <td>6</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div id="profile" class="shomepage">
                <div class="card" id="user-profile">
                    <div class="minicard" id="image" >
                        <img src="user.svg">
                    </div>
                    <div class="minicard" id="user-name">
                        <p style="text-align: center; font-size: 60px; color: #f1f1f1">Daniel Lobo</p>
                        <p style="text-align: center; font-size: 25px; color: #f1f1f1">Account type : Student</p>
                    </div>
                    <div class="card" id="user-details" style="width: 50%; margin-top: 80px; margin-left: 30%">
                        <p style="text-align: center; font-size: 30px; color: #f1f1f1">User Details</p>
                        <br>
                        <p style="text-align: left; font-size: 25px; color: #d83f07">Email&nbsp:&nbsp</p>
                        <p style="text-align: left; font-size: 25px; color: #d83f07">Username&nbsp:&nbsp</p>
                        <p style="text-align: left; font-size: 25px; color: #d83f07">Password&nbsp:&nbsp</p>
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
                // document.body.style.backgroundColor = "rgba(5,6,6,0.6)";
                document.getElementById("main").style.opacity=0.3;
            }
            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
                // document.body.style.backgroundColor = "rgba(5,6,6,1)";
                document.getElementById("main").style.opacity=1;
            }
           function openPage(pageName, elmnt) {
               // Hide all elements with class="shomepage" by default */
               var i, shomepage, tablinks, color="#d83f07";
               shomepage = document.getElementsByClassName("shomepage");
               for (i = 0; i < shomepage.length; i++) {
                   shomepage[i].style.display = "none";
               }

               tablinks = document.getElementsByClassName("tablink");
               for (i = 0; i < tablinks.length; i++) {
                   tablinks[i].style.color = "";
               }

               // Show the specific tab content
               document.getElementById(pageName).style.display = "block";
               document.getElementById('cbutton').click();

               elmnt.style.color = color;
           }
           // Get the element with id="defaultOpen" and click on it
           document.getElementById("defaultOpen").click();
        </script>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>