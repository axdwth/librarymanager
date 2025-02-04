<?php
include('../assets/connection/connection.php');
?>
<?php
$author = $publisher = $title = $bookid = "";
$selqry = "SELECT * from tbl_books";
$result = mysqli_query($conn, $selqry);
if (isset($_POST['btn_delete'])) {
    $delete_id = $_POST['btn_delete'];
    $delqry = "DELETE FROM tbl_books where book_id= $delete_id";
    $result = mysqli_query($conn, $delqry);
    if ($result) {
        echo "Deletion successful";
        header("location:index.php");
        exit();
    } else {
        echo "Error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
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

    h1 {
        color: #333;
    }

    table {
        width: 80%;
        border-collapse: collapse;
        margin-top: 20px;
        background-color: #fff;
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

    button {
        background-color: #f44336;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #e53935;
    }

    a {
        color: #4CAF50;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .no-record {
        color: red;
        cursor: pointer;
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
    </style>
</head>

<body>
    <div class="container">
        <h1>Books</h1>
        <form action="index.php" method="POST">
            <table>
                <tr>
                    <th>BOOK Title</th>
                    <th>BOOK Author</th>
                    <th>BOOK Publisher</th>
                    <th>Action</th>
                </tr>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $bookid = $row['book_id'];
                        $title = $row['title'];
                        $publisher = $row['publisher'];
                        $author = $row['author'];
                          
                ?>
                <tr>
                    <td><input type="text" name="title" id="title" value="<?php echo $title; ?>" readonly></td>
                    <td><input type="text" name="author" id="author" value="<?php echo $author; ?>" readonly></td>
                    <td><input type="text" name="publisher" id="publisher" value="<?php echo $publisher; ?>" readonly>
                    </td>
                    <td>
                        <button type="submit" name="btn_delete" value="<?php echo $bookid; ?>">Delete</button>
                    </td>
                </tr>
                <?php
                    }
                } else {
                    echo '<tr><td colspan="4" class="no-record">No records found. <a href="books.php">Add books here</a></td></tr>';
                }
                ?>
            </table>
            <div style="margin-top: 20px;">
                <h4><a href="books.php">Add Books Here</a></h4>
                <h4><a href="search.php">Search Books Here</a></h4>
                <h4><a href="update.php">Update</a></h4>
            </div>
        </form>
    </div>
</body>

</html>