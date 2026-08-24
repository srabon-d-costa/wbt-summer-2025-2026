<?php
require_once "db.php";
 
$nameErr = $phoneErr = $dobErr = $emailErr = $termsErr = "";
$dbErr = "";
$name = $phone = $dob = $email = $updates = $terms = "";
 
$isValid = false;
 
function cleanInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    if (empty($_POST["name"])) {
        $nameErr = "Enter your full name";
    } else {
        $name = cleanInput($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]+$/", $name)) {
            $nameErr = "Use letters, spaces, hyphens and apostrophes only";
        } elseif (strlen($name) < 3) {
            $nameErr = "Name must be at least 3 characters";
        }
    }
 
    if (empty($_POST["phone"])) {
        $phoneErr = "Enter your phone number";
    } else {
        $phone = cleanInput($_POST["phone"]);
        if (!preg_match("/^[0-9]{11}$/", $phone)) {
            $phoneErr = "Phone number must be 11 digits";
        }
    }
 
    if (empty($_POST["dob"])) {
        $dobErr = "Enter your date of birth";
    } else {
        $dob = cleanInput($_POST["dob"]);
        $today = new DateTime();
        $birth = DateTime::createFromFormat("Y-m-d", $dob);
 
        if (!$birth || $birth->format("Y-m-d") !== $dob) {
            $dobErr = "Enter a valid date in YYYY-MM-DD format";
        } elseif ($birth > $today) {
            $dobErr = "Date of birth cannot be in the future";
        } elseif ($birth->diff($today)->y < 18) {
            $dobErr = "You must be at least 18 years old to register";
        }
    }
 
    if (empty($_POST["email"])) {
        $emailErr = "Enter your email address";
    } else {
        $email = cleanInput($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Enter a valid email address, e.g. saha@gmail.com";
        }
    }
 
    if (isset($_POST["updates"])) {
        $updates = cleanInput($_POST["updates"]);
    }
 
    if (empty($_POST["terms"])) {
        $termsErr = "You must agree to the Terms & Privacy Policy";
    } else {
        $terms = cleanInput($_POST["terms"]);
    }
 
    $isValid = !$nameErr && !$phoneErr && !$dobErr
            && !$emailErr && !$termsErr;
 
    if ($isValid) {
 
        $stmt = mysqli_prepare(
            $conn,
            "INSERT INTO registrations1 (name, phone, dob, email, updates, terms)
             VALUES (?, ?, ?, ?, ?, ?)"
        );
 
        mysqli_stmt_bind_param(
            $stmt, "ssssss",
            $name, $phone, $dob, $email, $updates, $terms
        );
 
        if (!mysqli_stmt_execute($stmt)) {
            $dbErr = "Could not save registration: " . mysqli_stmt_error($stmt);
            $isValid = false;
        }
 
        mysqli_stmt_close($stmt);
    }
}
?>
 