<?php
include('connection.php');
?>
<?php
$author = $publisher = $title = $bookid = "";
$selqry = "SELECT * FROM tbl_books";
$result = mysqli_query($conn, $selqry);

if (isset($_POST['btn_update']) && trim($_POST['title']) != "" && trim($_POST['author']) != "" && trim($_POST['publisher']) != "") {
    $ubookid = $_POST['btn_update'];
    $utitle = $_POST['title'];
    $uauthor = $_POST['author'];
    $upublisher = $_POST['publisher'];
    $updateqry = "UPDATE tbl_books SET author='$uauthor', publisher='$upublisher', title='$utitle' WHERE book_id=$ubookid";

    if (mysqli_query($conn, $updateqry)) {
        echo "<div class='message'>Updation successful</div>";
        header("location:index.php");
        exit();
    } else {
        echo "<div class='alert'>Update error</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Book</title>
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
        width: 80%;
        max-width: 800px;
        padding: 20px;
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #333;
    }

    table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    input[type="text"] {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-bottom: 10px;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }

    .message {
        text-align: center;
        margin-top: 20px;
        color: green;
    }

    .alert {
        color: red;
        text-align: center;
        margin-top: 10px;
    }

    .back-link {
        text-align: center;
        margin-top: 20px;
    }

    .back-link a {
        color: #4CAF50;
        text-decoration: none;
    }

    .back-link a:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>
    <div class="container">
        <form action="update.php" method="POST">
            <h1>Update Book</h1>
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
                    <td><input type="text" name="title" id="title" placeholder="<?php echo $title; ?>"
                            value="<?php echo $title; ?>"></td>
                    <td><input type="text" name="author" id="author" placeholder="<?php echo $author; ?>"
                            value="<?php echo $author; ?>"></td>
                    <td><input type="text" name="publisher" id="publisher" placeholder="<?php echo $publisher; ?>"
                            value="<?php echo $publisher; ?>"></td>
                    <td>
                        <button type="submit" name="btn_update" value="<?php echo $bookid; ?>">Update</button>
                    </td>
                </tr>
                <?php
                    }
                } else {
                    echo '<tr><td colspan="4" class="alert">No record found <a href="books.php">Add books here</a></td></tr>';
                }
                ?>
            </table>
        </form>
        <div class="back-link">
            <h4><a href="index.php">Back to Home</a></h4>
        </div>
    </div>
</body>

</html>