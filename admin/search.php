<?php
include('../connection_class/connection.php');


if (isset($_POST['searchitem'])) {
    $search = mysqli_real_escape_string($conn, $_POST['searchitem']);
    $selqry = "SELECT * FROM tbl_books WHERE title LIKE '%$search%' OR author LIKE '%$search%' OR publisher LIKE '%$search%'";
    $result = mysqli_query($conn, $selqry);
}

if (isset($_POST['btn_delete'])) {
    $bookid = $_POST['btn_delete'];
    $deleteqry = "DELETE FROM tbl_books WHERE book_id = $bookid";

    if (mysqli_query($conn, $deleteqry)) {
        echo "<div class='message'>Book deleted successfully!</div>";
        header("Refresh:2; url=search.php");
        exit();
    } else {
        echo "<div class='alert'>Error in deleting the book</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Books</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        width: 90%;
        max-width: 1000px;
        margin: auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #333;
        text-align: center;
    }

    input[type="search"] {
        padding: 10px;
        width: 70%;
        margin: 10px;
        border-radius: 4px;
        border: 1px solid #ddd;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 10px;
    }

    button:hover {
        background-color: #45a049;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    input[type="text"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .no-record {
        color: red;
        text-align: center;
        cursor: pointer;
    }

    a {
        color: #4CAF50;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .back-link {
        text-align: center;
        margin-top: 20px;
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Search Books</h1>
        <form action="search.php" method="POST">
            <table>
                <tr>
                    <th><input type="search" name="searchitem" id="searchitem"
                            placeholder="Search by title, author, or publisher..."></th>
                </tr>
            </table>
            <button type="submit">Search</button>
        </form>

        <table>
            <tr>
                <th>BOOK Title</th>
                <th>BOOK Author</th>
                <th>BOOK Publisher</th>
                <th>Action</th>
            </tr>
            <?php
            if (isset($result) && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $bookid = $row['book_id'];
                    $title = $row['title'];
                    $publisher = $row['publisher'];
                    $author = $row['author'];
            ?>
            <tr>
                <td><input type="text" name="title" id="title" value="<?php echo $title; ?>" readonly></td>
                <td><input type="text" name="author" id="author" value="<?php echo $author; ?>" readonly></td>
                <td><input type="text" name="publisher" id="publisher" value="<?php echo $publisher; ?>" readonly></td>
                <td>
                    <form action="search.php" method="POST">
                        <button type="submit" name="btn_delete" value="<?php echo $bookid; ?>">Delete</button>
                    </form>
                </td>
            </tr>
            <?php
                }
            } else {
                echo '<tr><td colspan="4" class="no-record">No record found. <a href="books.php">Add books here</a></td></tr>';
            }
            ?>
        </table>

        <div class="back-link">
            <h4><a href="index.php">Back to Home</a></h4>
        </div>
    </div>
</body>

</html>