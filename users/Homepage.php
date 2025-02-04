<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 0;
    }

    header {
        background-color: #4CAF50;
        color: white;
        padding: 20px 10%;
        text-align: center;
    }

    header h1 {
        margin: 0;
        font-size: 2.5em;
    }

    nav {
        margin-top: 15px;
    }

    nav a {
        color: white;
        text-decoration: none;
        margin: 0 15px;
        font-weight: bold;
    }

    nav a:hover {
        text-decoration: underline;
    }

    main {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        height: 80vh;
        padding: 20px;
    }

    main h2 {
        color: #333;
        font-size: 2em;
        margin-bottom: 15px;
    }

    main p {
        font-size: 1.2em;
        color: #666;
        margin-bottom: 20px;
        max-width: 600px;
    }

    main a {
        display: inline-block;
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        font-size: 1em;
        font-weight: bold;
    }

    main a:hover {
        background-color: #45a049;
    }

    footer {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 10px 0;
        position: relative;
        bottom: 0;
        width: 100%;
    }

    footer p {
        margin: 0;
        font-size: 0.9em;
    }

    footer a {
        color: #4CAF50;
        text-decoration: none;
    }

    footer a:hover {
        text-decoration: underline;
    }
    </style>
</head>

<body>
    <header>
        <h1>Library Management System</h1>
        <nav>
            <h3>
                <a href="#">Home</a>
                <a href="viewbooks.php  ">Books</a>
                <a href="search.php">Search</a>
                <a href="../index.php">Logout</a>
            </h3>
        </nav>
    </header>

    <main>
        <h2>Welcome to the Library Management System</h2>
        <p>
            Explore a wide variety of books, manage your library account, and streamline borrowing and returning books
            with ease.
        </p>
        <a href="books.php">View Books</a>
    </main>

    <footer>
        <p>&copy; 2025 Library Management System. All rights reserved. | <a href="privacy.php">Privacy Policy</a></p>
    </footer>
</body>

</html>