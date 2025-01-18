<?php
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Book</title>
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
        max-width: 600px;
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
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
        margin-top: 10px;
    }

    input[type="submit"]:hover {
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
    </style>

    <!--javascript validation on php-->
    <script>
    function valid() {
        var title = document.getElementById('title').value.trim();
        var author = document.getElementById('author').value.trim();
        var publisher = document.getElementById('publisher').value.trim();

        if (title === "" || author === "" || publisher === "") {
            alert('All fields are required');
            return false;
        }
        return true;
    }
    </script>
    <!---->

</head>

<body>
    <div class="container">
        <form action="books.php" method="post" onsubmit="return valid()">
            <h1>Insert Book</h1>
            <table>
                <tr>
                    <th>Title</th>
                    <td><input type="text" name="title" id="title" placeholder="Enter book title"></td>
                </tr>
                <tr>
                    <th>Author</th>
                    <td><input type="text" name="author" id="author" placeholder="Enter author name"></td>
                </tr>
                <tr>
                    <th>Publisher</th>
                    <td><input type="text" name="publisher" id="publisher" placeholder="Enter publisher name"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Insert Book"></td>
                </tr>
            </table>

            <!--php code for insertion-->
            <?php
            if (isset($_POST['submit']) && trim($_POST['title'] != "") && trim($_POST['author'] != "") && trim($_POST['publisher'] != "")) {
                $title = $_POST['title'];
                $author = $_POST['author'];
                $publisher = $_POST['publisher'];
                $insqry = "INSERT INTO tbl_books(title, author, publisher) VALUES('$title','$author','$publisher')";
                if (mysqli_query($conn, $insqry)) {
                    echo "<div class='message'>Insertion successful</div>";
                    header("location:index.php");
                    exit();
                } else {
                    echo "<div class='alert'>Error in insertion</div>";
                }
            }
            ?>
        </form>
    </div>
</body>

</html>