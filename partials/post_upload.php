<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'dbconnect.php';
    session_start();

     // Enable error reporting for debugging
     ini_set('display_errors', 1);
     ini_set('display_startup_errors', 1);
     error_reporting(E_ALL);

    $err1 = $err2 = $err3 = false;
    $errmessg1 = $errmessg2 = $errmessg3 = "";

    $username = $_SESSION['uid'];
    $bookname = mysqli_real_escape_string($conn, $_POST["bookname"]);
    $isbn = mysqli_real_escape_string($conn, $_POST["isbn"]);
    $auth = mysqli_real_escape_string($conn, $_POST["authname"]);
    $ogprice = mysqli_real_escape_string($conn, $_POST["ogprice"]);
    $exprice = mysqli_real_escape_string($conn, $_POST["exprice"]);
    $description = mysqli_real_escape_string($conn, $_POST["describe"]);
    $gener1 = mysqli_real_escape_string($conn, $_POST["genre1"]);
    $gener2 = mysqli_real_escape_string($conn, $_POST["genre2"]);
    $gener3 = mysqli_real_escape_string($conn, $_POST["genre3"]);
    $gener4 = mysqli_real_escape_string($conn, $_POST["genre4"]);

    // Function to handle file uploads
    function handleFileUpload($file, &$err, &$errmessg, $fileIndex) {
        $allowed = array('jpg', 'jpeg', 'png');
        $fileName = $file["name"];
        $fileError = $file["error"];
        $fileTmpName = $file["tmp_name"];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        
        if (in_array($fileActualExt, $allowed)) {
            if ($fileError === 0) {
                $fileNewName = uniqid('', true) . "." . $fileActualExt;
                $fileDestination = 'uploads/' . $fileNewName;
                return $fileDestination;
            } else {
                $err = true;
                $errmessg = "Your input file encountered an error (file $fileIndex)";
            }
        } else {
            $err = true;
            $errmessg = "You cannot input a file of this extension (file $fileIndex)";
        }
        return null;
    }

    $fileDestination1 = handleFileUpload($_FILES["bookpic1"], $err1, $errmessg1, 1);
    $fileDestination2 = handleFileUpload($_FILES["bookpic2"], $err2, $errmessg2, 2);
    $fileDestination3 = handleFileUpload($_FILES["bookpic3"], $err3, $errmessg3, 3);

    if ($err1) {
        header("Location: ../makepost.php?postsuccess=false&poerror=$errmessg1");
        exit();
    } elseif ($err2) {
        header("Location: ../makepost.php?postsuccess=false&poerror=$errmessg2");
        exit();
    } elseif ($err3) {
        header("Location: ../makepost.php?postsuccess=false&poerror=$errmessg3");
        exit();
    } else {
        move_uploaded_file($_FILES["bookpic1"]["tmp_name"], $fileDestination1);
        move_uploaded_file($_FILES["bookpic2"]["tmp_name"], $fileDestination2);
        move_uploaded_file($_FILES["bookpic3"]["tmp_name"], $fileDestination3);

        $sql = "INSERT INTO `postbook` (`b_name`, `b_isbn`, `b_auth`, `og_pr`, `ex_pr`, `descript`, `pic1`, `pic2`, `pic3`, `genr1`, `genr2`, `genr3`, `genr4`, `used`, `display`, `usenam`) 
                VALUES ('$bookname', '$isbn', '$auth', '$ogprice', '$exprice', '$description', '$fileDestination1', '$fileDestination2', '$fileDestination3', '$gener1', '$gener2', '$gener3', '$gener4', 'N', 'Y', '$username')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header("Location: ../index.php?postsuccess=true");
            exit();
        } else {
            header("Location: ../index.php?postsuccess=false");
            exit();
        }
    }
}
?>
