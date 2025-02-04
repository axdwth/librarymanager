<?php

include('../assets/connection/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $title = $_POST["title"];
    $author = $_POST["author"];
    $publisher = $_POST["publisher"];
    $isbn = $_POST["isbn"];
    $year = $_POST["year"];
    

    $cover = null;
    if (isset($_FILES['cover']) && $_FILES['cover']['error'] == 0) {
        $cover = 'uploads/' . basename($_FILES['cover']['name']);
        move_uploaded_file($_FILES['cover']['tmp_name'], $cover);
    }

    if (empty($title) || empty($author) || empty($publisher) || empty($isbn) || empty($year)) {
        echo "<p>All fields are required.</p>";
    } else {
   
        $stmt = $conn->prepare("INSERT INTO tbl_books (title, author, publisher, cover, isbn, year) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssi", $title, $author, $publisher, $cover, $isbn, $year); 
     
        if ($stmt->execute()) {
            echo "<p>Book added successfully!</p>";
            echo "<p><a href='index.php'>Go back</a></p>";
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }

        $stmt->close();
    }


    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body>

    <h1>Library Management</h1>

    <form id="addBookForm" action="book.php" method="POST" enctype="multipart/form-data"
        onsubmit="return validateForm()">
        <label for="title">Book Title:</label>
        <input type="text" id="title" name="title" required>
        <br><br>

        <label for="author">Author:</label>
        <input type="text" id="author" name="author" required>
        <br><br>

        <label for="publisher">Publisher:</label>
        <input type="text" id="publisher" name="publisher" required>
        <br><br>

        <label for="isbn">ISBN:</label>
        <input type="text" id="isbn" name="isbn" required>
        <br><br>

        <label for="year">Year of Publication:</label>
        <input type="text" id="year" name="year" required>
        <br><br>

        <label for="cover">Cover Image:</label>
        <input type="file" id="cover" name="cover" accept="image/*">
        <br><br>

        <button type="submit">Add Book</button>
    </form>

    <div id="errorMessages"></div>
    <script>
    function validateForm() {
        let title = document.getElementById("title").value;
        let author = document.getElementById("author").value;
        let publisher = document.getElementById("publisher").value;
        let isbn = document.getElementById("isbn").value;
        let year = document.getElementById("year").value;
        let errorMessages = [];


        let errorsDiv = document.getElementById("errorMessages");
        if (errorsDiv) {
            errorsDiv.remove();
        }

        if (title.trim() === "") {
            errorMessages.push("Title is required.");
        }

        if (author.trim() === "") {
            errorMessages.push("Author is required.");
        }

        if (publisher.trim() === "") {
            errorMessages.push("Publisher is required.");
        }

        if (isbn.trim() === "" || !/^\d{13}$/.test(isbn)) {
            errorMessages.push("ISBN must be a 13-digit number.");
        }

        if (year.trim() === "" || !/^\d{4}$/.test(year)) {
            errorMessages.push("Year must be a 4-digit number.");
        }

        if (errorMessages.length > 0) {
            let errorDiv = document.createElement("div");
            errorDiv.id = "errorMessages";
            errorMessages.forEach((msg) => {
                let errorMessage = document.createElement("p");
                errorMessage.classList.add("error");
                errorMessage.textContent = msg;
                errorDiv.appendChild(errorMessage);
            });
            document.querySelector("form").prepend(errorDiv);
            return false;
        }

        return true;
    }
    </script>

</body>

</html>