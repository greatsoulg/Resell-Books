<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Resell Books</title>
    <style>
        body {
            background-color: #62cff4;
            font-family: Arial, sans-serif;
        }
        h1 {
            margin: 20px 0;
            font-weight: bold;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .card-img {
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }
        .card-title a {
            text-decoration: none;
            color: #343a40;
            transition: color 0.3s;
        }
        .card-title a:hover {
            color: #007bff;
        }
        .card-text {
            font-size: 0.9rem;
        }
        .container {
            padding: 20px;
        }
        .block {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .footer {
            margin-top: 20px;
            padding: 20px;
            background-color: #343a40;
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php 
    include 'partials/header.php'; 
    ?>

    <div class="container">
        <center><h1>My Posts!</h1></center>
        <div class="row mx-2 block">
            <?php 
            include 'partials/dbconnect.php';
            
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }

            $e_id = $_SESSION['uid'];
            $sql = "SELECT * FROM postbook WHERE usenam='$e_id'";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                $bok_n = $row['b_name'];
                $og_pr = $row['og_pr'];
                $ex_pr = $row['ex_pr'];
                $time = $row['dt_creation'];
                $pic = $row['pic1'];
                $p_id = $row['p_id'];
                echo '<div class="card mb-3 mx-2" style="max-width: 30%;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="partials/'.$pic.'" class="card-img" alt="..." width="100%" height="auto">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><a href="post.php?pid='.$p_id.'" class="text-dark">'.$bok_n.'</a></h5>
                                    <p class="card-text">Original Price: $'.$og_pr.'</p>
                                    <p class="card-text">Expected Price: $'.$ex_pr.'</p>
                                    <p class="card-text"><small class="text-muted">Last updated '.$time.'</small></p>
                                </div>
                            </div>
                        </div>
                    </div>';
            }
            ?>
        </div>
    </div>

    <?php include 'partials/footer.php'; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
