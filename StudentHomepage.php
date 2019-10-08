<?php
     include('session.php');
?>

<!DOCTYPE html>
<html>
    <title>Online Library</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <head>
        <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
                background-color: #121212;
                /* background-image: url("header-background.jpg"); 
                background-position:top;
                background-repeat: no-repeat;
                background-size: cover; */
            }

            .header {
                padding: 10px;
                text-align: center; 
                background: #050606; 
                color: #cc8112; 
                border-radius: 25px;
                line-height: 0.4cm;
            }
            
            .header h1 {
                font-size: 47px;
            }

             /* The side navigation menu */
            .sidenav {
            height: 100%; /* 100% Full-height */
            width: 0; /* 0 width - change this with JavaScript */
            position: fixed; /* Stay in place */
            z-index: 1; /* Stay on top */
            top: 0; /* Stay at the top */
            left: 0;
            background-color: #111; /* Black*/
            overflow-x: hidden; /* Disable horizontal scroll */
            padding-top: 60px; /* Place content 60px from the top */
            transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
            }

            /* The navigation menu links */
            .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.1s;
            }

            .sidenav a.bottom {
                margin-top: 330px;
            }

            /* When you mouse over the navigation links, change their color */
            .sidenav a:hover {
            color: #f1f1f1;
            }

            /* Position and style the close button (top right corner) */
            .sidenav .closebtn {
            position: absolute;
            top: 0;
            left: 0px;
            font-size: 36px;
            }

            .openbtn {
                font-size: 20px;
                cursor: pointer;
                background-color: #272727;
                color: white;
                padding: 10px 15px;
                border: none;
                position: fixed;
                top: 20px;
                left: 20px;
            }

            .openbtn:hover {
                background-color:#444;
            }

            /* Style page content - To push the page content to the right when you open the side navigation */
            #main {
            transition: margin-left .5s;
            padding: 20px;
            }

            .bgcolor {
                background-color: #050606bd;
                width: 100%;
                height: 100%;
            }

            /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
            @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
            } 
        </style>
    </head>
    <body>
        <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#">Dashboard</a>
            <a href="#">Issued Books</a>
            <a href="#">Search Books</a>
            <a href="#">Request Books</a>
            <a href="#">View Profile</a>
            <a href="logout.php" class="bottom">Logout</a>
        </div>

        <div class="header">
            <button class="openbtn" onclick="openNav()" style="float: left">☰</button> 
            <h1>SFIT Online Library</h1>
            <p>Your link to the past & gateway to the future.</p>
        </div> 

        <div id="main">
            <div id="bgcolor"></div>
        </div>  

        <script>
           function openNav() {
                document.getElementById("mySidenav").style.width = "100%";
                document.getElementById("mySidenav").style.width = "250px";
                document.getElementById("main").style.marginLeft = "250px";
                // document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
            }
            function closeNav() {
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("mySidenav").style.width = "0";
                document.getElementById("main").style.marginLeft = "0";
                document.body.style.backgroundColor = "#1f2020";
            } 
        </script>
    </body>
</html>