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

    <title>Resell Books</title>
    <style>
        body {
            background-color: #ADD8E6;
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 40px;
            color: #0056b3;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group label {
            color: #333;
        }
        .form-control {
            border-radius: 0;
            box-shadow: none;
        }
        .input-group-text {
            background-color: #007bff;
            color: white;
        }
        .custom-file-label::after {
            background-color: #007bff;
            color: white;
        }
        button {
            background-color: #007bff;
            border: none;
            padding: 10px;
            color: white;
            font-size: 16px;
            border-radius: 5px;
        }
        button:hover {
            background-color: #0056b3;
        }
        select.form-control {
            border-radius: 0;
            box-shadow: none;
        }
        textarea.form-control {
            border-radius: 0;
            box-shadow: none;
        }
    </style>
</head>

<body>

    <?php include 'partials/header.php'; ?>
    <h1>Upload Book Post!!</h1>
    <div class="container">
        <form action="partials/post_upload.php" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="bookname">Book Name</label>
                    <input type="text" class="form-control" id="bookname" name="bookname" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="isbn">ISBN</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="auth">Author</label>
                    <input type="text" class="form-control" id="auth" name="authname" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="orgprice">Original Price</label>
                    <input type="text" class="form-control" id="orgprice" name="ogprice" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="exprice">Expected Price</label>
                    <input type="text" class="form-control" id="exprice" name="exprice" required>
                </div>
            </div>

            <div class="form-row">
                <label for="tarea1">Describe your book and its condition</label>
                <textarea class="form-control" id="tarea1" rows="3" name="describe" required></textarea>
            </div>
            <br>
            <div class="form-row">
                <label for="exampleFormControlTextarea1">Upload some pictures of your book</label>
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="File1" aria-describedby="inputGroupFileAddon01" required name="bookpic1">
                        <label class="custom-file-label" for="File1">Choose book cover image file</label>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="File2" aria-describedby="inputGroupFileAddon01" required name="bookpic2">
                        <label class="custom-file-label" for="File2">Choose backside image of book file</label>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="File3" aria-describedby="inputGroupFileAddon01" required name="bookpic3">
                        <label class="custom-file-label" for="File3">Choose random image of your book file</label>
                    </div>
                </div>
            </div>

            <label for="exampleFormControlTextarea1">Select categories of your book</label>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="inputState1">Genre</label>
                    <select id="inputState1" class="form-control" name="genre1" required>
                        <option value="">Choose...</option>
                        <?php include 'partials/select.php'; ?>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="inputState2">Genre</label>
                    <select id="inputState2" class="form-control" name="genre2">
                        <option value="">Choose...</option>
                        <?php include 'partials/select.php'; ?>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="inputState3">Genre</label>
                    <select id="inputState3" class="form-control" name="genre3">
                        <option value="">Choose...</option>
                        <?php include 'partials/select.php'; ?>
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="inputState4">Genre</label>
                    <select id="inputState4" class="form-control" name="genre4">
                        <option value="">Choose...</option>
                        <?php include 'partials/select.php'; ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary col-md-12" id="subtn" name="booksubmit">Submit</button>
            </div>
        </form>
    </div>

    <?php include 'partials/footer.php'; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery, Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript" src="partials/jqryfile2.js"></script>
</body>
</html>
