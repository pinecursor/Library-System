<?php
include("connect.php");
$result=mysqli_query($con,"SELECT* from tab1 ORDER BY ISBN ASC");
$rese=mysqli_query($con,"SELECT* from bookreq ORDER BY ISBN ASC");
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Dashboard</title>
    <link rel="stylesheet" href="./dashboar.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">

            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">
                    <h1> <a class="nav-link active" aria-current="page" href="#">Home</a></h1>
                    </li>
                    <li class="nav-item">
                        <!-- <a class="nav-link" href="#">Link</a> -->
                    </li>
                    <li class="nav-item dropdown">
                        <!-- <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a> -->
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>

                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <li class="nav-item dropdown d-flex text-white logged-in">
                    <div class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                        <h3>hello
                            <?php
                            session_start();
                            echo $_SESSION['user'];
                            ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                        </h3>
                        
                    </div>
                    
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
                        
                           
                    </ul>
                </li>

            </div>
        </div>
    </nav>
    <section class="books">
        <div class="card text-dark bg-info mb-3" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Total Nummber of Books Available</h5>

                <p class="card-text"><?php
                include("config.php");
                $checker = mysqli_query($con,"SELECT * FROM `tab1`"); 
                $numrow = mysqli_num_rows($checker);
                echo $numrow;
                ?></p>

            </div>
        </div>
        <div class="card text-white bg-secondary mb-3" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Total numaber of Members</h5>

                <p class="card-text"><?php
                include("config.php");
                $checker = mysqli_query($con,"SELECT * FROM `login` WHERE `role`='student'"); 
                $numrow = mysqli_num_rows($checker);
                echo $numrow;
                ?></p>

            </div>
        </div>
        <div class="card text-dark bg-warning mb-3" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">No. of Books Issued</h5>

                <p class="card-text"><?php
                include("connect.php");
                $checker = mysqli_query($con,"SELECT * FROM `tab1` where `IssueStatus`='Yes'"); 
                $numrow = mysqli_num_rows($checker);
                echo $numrow;
                ?></p>

            </div>
        </div>
    </section>
    <section class="Input-Book">
        <div class="row">
            <div class="col-sm-6">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Enter Book Detail</h5>
                        <form action="insertbook.php" method="post">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Book Name</label>
                                <input type="text" name="BookName" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="BookName">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">ISBN</label>
                                <input type="number" name="ISBN" class="form-control" id="exampleInputPassword1" placeholder="ISBN" Required>

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Author</label>
                                <input type="text" name="Author" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Author">
                                <small id="emailHelp" class="form-text text-white">Please vrify the details before
                                    submit</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card text-white bg-success mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Book Issue</h5>
                        <form action="issue.php" method="post">
                            <div class="form-group" >
                                <label for="exampleInputPassword1">Name</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Name" name="name" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter email" name="email">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Book Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Book Name" name="bname">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">ISBN</label>
                                <input type="number" class="form-control" id="exampleInputPassword1" placeholder="ISBN" name="ISBN">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Author</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Enter Author Name" name="Author">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Issue Date</label>
                                <input type="date" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Issue Date" name="idate">

                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Return Date</label>
                                <input type="date" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" placeholder="Return Date" name="rdate">
                                <small id="emailHelp" class="form-text text-white">Please verify the details before
                                    submit</small>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <h1>Books In library</h1>
    <section class="Book-details">
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">ISBN NO.</th>
                        <th scope="col">BOOK NAME</th>
                        <th scope="col">AUTHOR NAME</th>
                        <th scope="col">BORROWER NAME</th>
                        <th scope="col">DATE OF BORROW</th>
                        <th scope="col">DATE OF RETURN</th>
                    </tr>
                </thead>
                <tbody>
                <?php
						while($res=mysqli_fetch_array($result)){
							echo '<tr>';
							echo '<td>'.$res['ISBN'].'</td>';
							echo '<td>'.$res['BookName'].'</td>';
							echo '<td>'.$res['Author'].'</td>';
                            echo '<td>'.$res['BorrowerName'].'</td>';
							echo '<td>'.$res['Date of Borrow'].'</td>';
							echo '<td>'.$res['Date of Return'].'</td>';
							echo '</tr>';
							
						}
						?>
                </tbody>
            </table>
        </div>

    </section>

    <h1>Issue Request</h1>
    <section class="Book-details">
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email ID</th>
                        <th scope="col">ISBN NO.</th>
                        <th scope="col">Book Name</th>
                        <th scope="col">Author</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php
						while($res=mysqli_fetch_array($rese)){
							echo '<tr>';
							echo '<td>'.$res['Name'].'</td>';
							echo '<td>'.$res['Email'].'</td>';
							echo '<td>'.$res['ISBN'].'</td>';
                            echo '<td>'.$res['BookName'].'</td>';
							echo '<td>'.$res['Author'].'</td>';
							echo '</tr>';
							
						}
						?>
                </tbody>
            </table>
        </div>

    </section>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>


</body>

</html>