<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "conference33_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $address = $conn->real_escape_string($_POST['address']);
    $track = $conn->real_escape_string($_POST['track']);
    $sessions = isset($_POST['sessions']) ? implode(", ", $_POST['sessions']) : "None";

    $sql = "INSERT INTO registrations (name, email, phone, address, track, sessions)
            VALUES ('$name', '$email', '$phone', '$address', '$track', '$sessions')";

    if ($conn->query($sql) === TRUE) {
        echo "
        <div style='font-family: Arial; padding: 20px; max-width: 600px; margin: 50px auto; background: #f5f5f5; border-radius: 8px; text-align: center;'>
            <h2 style='color: green;'>Registration Successful!</h2>
            <p>Thank you for registering. Here are your details:</p>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Phone:</strong> $phone</p>
            <p><strong>Address:</strong> $address</p>
            <p><strong>Track:</strong> $track</p>
            <p><strong>Sessions:</strong> $sessions</p>
        </div>";
    }

    $conn->close();
}
?>
