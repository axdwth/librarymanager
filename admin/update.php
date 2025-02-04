<?php
include('../assets/connection/connection.php');

$bookid = $title = $author = $publisher = $isbn = $year = $cover = "";

$selqry = "SELECT * FROM tbl_books";
$result = mysqli_query($conn, $selqry);

if (isset($_POST['btn_update']) && trim($_POST['title']) != "" && trim($_POST['author']) != "" && trim($_POST['publisher']) != "" && trim($_POST['isbn']) != "" && trim($_POST['year']) != "") {
    $ubookid = $_POST['btn_update'];
    $utitle = $_POST['title'];
    $uauthor = $_POST['author'];
    $upublisher = $_POST['publisher'];
    $uisbn = $_POST['isbn'];
    $uyear = $_POST['year'];

    if (isset($_FILES['cover']) && $_FILES['cover']['error'] == 0) {
        $cover = 'uploads/' . basename($_FILES['cover']['name']);
        move_uploaded_file($_FILES['cover']['tmp_name'], $cover);
    }

    $updateqry = "UPDATE tbl_books SET title='$utitle', author='$uauthor', publisher='$upublisher', isbn='$uisbn', year='$uyear', cover='$cover' WHERE book_id=$ubookid";

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

    input[type="text"],
    input[type="file"],
    input[type="number"] {
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
        <form action="update.php" method="POST" enctype="multipart/form-data">
            <h1>Update Book</h1>
            <table>
                <tr>
                    <th>BOOK Title</th>
                    <th>BOOK Author</th>
                    <th>BOOK Publisher</th>
                    <th>BOOK ISBN</th>
                    <th>BOOK Year</th>
                    <th>Cover Image</th>
                    <th>Action</th>
                </tr>

                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $bookid = $row['book_id'];
                        $title = $row['title'];
                        $publisher = $row['publisher'];
                        $author = $row['author'];
                        $isbn = $row['isbn'];
                        $year = $row['year'];
                        $cover = $row['cover'];
                ?>
                <tr>
                    <td><input type="text" name="title" id="title" value="<?php echo $title; ?>" required></td>
                    <td><input type="text" name="author" id="author" value="<?php echo $author; ?>" required></td>
                    <td><input type="text" name="publisher" id="publisher" value="<?php echo $publisher; ?>" required>
                    </td>
                    <td><input type="text" name="isbn" id="isbn" value="<?php echo $isbn; ?>" required></td>
                    <td><input type="number" name="year" id="year" value="<?php echo $year; ?>" required></td>
                    <td>
                        <?php if ($cover) { ?>
                        <img src="<?php echo $cover; ?>" alt="Book Cover" width="50" height="50">
                        <?php } ?>
                        <input type="file" name="cover" id="cover" accept="image/*">
                    </td>
                    <td>
                        <button type="submit" name="btn_update" value="<?php echo $bookid; ?>">Update</button>
                    </td>
                </tr>
                <?php
                    }
                } else {
                    echo '<tr><td colspan="7" class="alert">No record found <a href="books.php">Add books here</a></td></tr>';
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