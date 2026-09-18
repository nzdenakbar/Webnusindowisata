<?php
session_start();
include 'koneksi.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $name = $conn->real_escape_string(trim($_POST['name']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $subject = $conn->real_escape_string(trim($_POST['subject']));
    $message = $conn->real_escape_string(trim($_POST['message']));

    $sql = "INSERT INTO kontak (name, email, subject, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
     
        $stmt->bind_param("ssss", $name, $email, $subject, $message);

        if ($stmt->execute()) {

            header("Location: formkontak.php?success=true");
            exit();
        } else {

            header("Location: formkontak.php?success=false");
            exit();
        }

        $stmt->close();
    } else {
    
        header("Location: formkontak.php?success=false");
        exit();
    }
}

$conn->close();
?>
