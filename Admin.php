<?php
// Start the session
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['loggedin']) || $_SESSION['role'] != 'admin') {
    header('Location: index.php');
    exit;
}

// Include the database configuration file
require_once 'config.php';

// Function to fetch all users
function getUsers($conn) {
    $sql = "SELECT * FROM users";
    $result = mysqli_query($conn, $sql);
    return $result;
}

// Function to fetch all books
function getBooks($conn) {
    $sql = "SELECT * FROM books";
    $result = mysqli_query($conn, $sql);
    return $result;
}

// Function to fetch all queries
function getQueries($conn) {
    $sql = "SELECT * FROM queries";
    $result = mysqli_query($conn, $sql);
    return $result;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            margin-top: 20px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .table {
            margin-bottom: 0;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-4 text-center">Admin Dashboard</h1>
        
        <!-- Users Management Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h2>Manage Users</h2>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $users = getUsers($conn);
                        while ($row = mysqli_fetch_assoc($users)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['email'] . "</td>";
                            echo "<td>" . $row['role'] . "</td>";
                            echo "<td><a href='edit_user.php?id=" . $row['id'] . "' class='btn btn-sm btn-primary'>Edit</a> ";
                            echo "<a href='delete_user.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger'>Delete</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Books Management Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h2>Manage Books</h2>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $books = getBooks($conn);
                        while ($row = mysqli_fetch_assoc($books)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['title'] . "</td>";
                            echo "<td>" . $row['author'] . "</td>";
                            echo "<td>" . $row['genre'] . "</td>";
                            echo "<td><a href='edit_book.php?id=" . $row['id'] . "' class='btn btn-sm btn-primary'>Edit</a> ";
                            echo "<a href='delete_book.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger'>Delete</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Queries Management Section -->
        <div class="card mb-4">
            <div class="card-header">
                <h2>Manage Queries</h2>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User Email</th>
                            <th>Query</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $queries = getQueries($conn);
                        while ($row = mysqli_fetch_assoc($queries)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['user_email'] . "</td>";
                            echo "<td>" . $row['query'] . "</td>";
                            echo "<td><a href='view_query.php?id=" . $row['id'] . "' class='btn btn-sm btn-primary'>View</a> ";
                            echo "<a href='delete_query.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger'>Delete</a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
