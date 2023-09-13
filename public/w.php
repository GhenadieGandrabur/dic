<h1>Words</h1>
<?php
$host = "localhost";
$dbname = "dicdb";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

session_start();

// Check if the user is already authenticated
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $enteredPassword = $_POST['password'];

        // Replace 'your_password_hash' with the actual password hash stored in the database
        $correctPasswordHash = '$2y$10$DphoBDqBv1h5/PLxS3pIHO0zK8ROvznwdbvQ4.PdNaLi/CNH75aXe';

        if (password_verify($enteredPassword, $correctPasswordHash)) {
            // Authentication successful
            $_SESSION['authenticated'] = true;
        } else {
            // Authentication failed
            echo "Authentication failed. Please try again.";
        }
    } else {
        // Display the login form
        echo <<<HTML
        <form method="POST" action="">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
            <input type="submit" value="Login">
        </form>
        HTML;
    }
} else {
    // User is authenticated, retrieve data from the "author" table
    $sql = "SELECT * FROM word";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $words = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo "<table border='1'>";
    echo "<tr><th>#</th><th>ID</th><th>Name</th><th>Email</th></tr>";
    $n = 0;
    foreach ($words as $word) {
        echo "<tr>";
        echo "<td>" . ($n += 1). "</td>";
        echo "<td>" . $word['authorId'] . "</td>";
        echo "<td>" . $word['first_language'] . "</td>";
        echo "<td>" . $word['second_language'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";
}
