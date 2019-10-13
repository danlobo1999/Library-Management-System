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
        <link rel="stylesheet" href="admin.css">
    </head>

    <body>
        <div class="container-fluid" id="header">
            <h1><strong>SFIT Online Library</strong></h1>
            <p>Your link to the past & gateway to the future.</p>
        </div>
        <nav class="navbar navbar-expand-sm navbar-custom sticky-top">
            <a class="navbar-brand" href="#">Admin</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <button class="tablink" onclick="openPage('dashboard',this)" id="defaultOpen">Dashboard</button>
                </li>
                <li class="nav-item">
                    <button class="tablink" onclick="openPage('dashboard',this)" id="defaultOpen">Dashboard</button>
                </li>
                <li class="nav-item">
                    <button class="tablink" onclick="openPage('dashboard',this)" id="defaultOpen">Dashboard</button>
                </li>
                <li class="nav-item">
                    <button class="tablink" onclick="openPage('dashboard',this)" id="defaultOpen">Dashboard</button>
                </li>
                <li class="nav-item">
                    <button class="tablink" onclick="openPage('dashboard',this)" id="defaultOpen">Dashboard</button>
                </li>
            </ul>
        </nav>
        <div class="container-fluid" id="main" style="height: 800px">

        </div>
    </body>
</html>