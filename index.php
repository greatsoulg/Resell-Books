<!doctype html>
<html lang="en">
<head>

 <!-- JavaScript files start -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- JavaScript files end -->

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

<!-- Bootstrap files (jQuery first, then Popper.js, then Bootstrap JS) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" type="text/javascript"></script>

    <title>Resell Books</title>
</head>
<body>

<?php include 'partials/header.php'; ?>

<!--<h1>Hot Books!</h1>-->  

<?php include 'partials/corousel.php'; ?>

<center><h1>Hot Books!</h1></center>
<div class="row mx-2 block">
    <?php
    include 'partials/dbconnect.php';

    $sql = "SELECT * FROM `postbook` ORDER BY `dt_creation` DESC LIMIT 6";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo '<div class="alert alert-danger" role="alert">Error fetching books: ' . mysqli_error($conn) . '</div>';
    } else {
        while ($row = mysqli_fetch_assoc($result)) {
            $bok_n = htmlspecialchars($row['b_name']);
            $og_pr = htmlspecialchars($row['og_pr']);
            $ex_pr = htmlspecialchars($row['ex_pr']);
            $time = htmlspecialchars($row['dt_creation']);
            $pic = htmlspecialchars($row['pic1']);
            $p_id = htmlspecialchars($row['p_id']);
            echo '<div class="card mb-3 mx-2" style="max-width: 32%;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="partials/' . $pic . '" class="card-img" alt="..." width="500" height="250">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><a href="post.php?pid=' . $p_id . '" class="text-dark">' . $bok_n . '</a></h5>
                                <p class="card-text">Original Price: ' . $og_pr . '</p>
                                <p class="card-text">Expected Price: ' . $ex_pr . '</p>
                                <p class="card-text"><small class="text-muted">Last updated ' . $time . '</small></p>
                            </div>
                        </div>
                    </div>
                </div>';
        }
    }
    ?>
</div>

<?php include 'partials/footer.php'; ?>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
