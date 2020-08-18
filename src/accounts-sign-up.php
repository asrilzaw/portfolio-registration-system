<?php
require_once '../includes/config.php';
require_once '../includes/connection.php';

session_start();

$sqlQuery = "SELECT account_email FROM accounts WHERE account_email = :email";

if ($stmt = connection()->prepare($sqlQuery)) {

    $stmt->bindParam(':email', $param_email);

    $param_email = $_POST['email'];

    if ($stmt->execute()) {

        if ($stmt->rowCount() == 0) {

            if ($_POST['password'] == $_POST['retype_password']) {
                $sqlQuery = "INSERT INTO accounts (account_name, account_email, account_password, account_created) VALUES (:name, :email, :password, :created)";

                if ($stmt = connection()->prepare($sqlQuery)) {

                    $stmt->bindParam(":name", $param_name);
                    $stmt->bindParam(":email", $param_email);
                    $stmt->bindParam(":password", $param_password);
                    $stmt->bindParam(":created", $param_created);

                    $param_name     = $_POST['name'];
                    $param_email    = $_POST['email'];
                    $param_password = md5($_POST['password']);
                    $param_created  = date('Y-m-d H:i:s');

                    if ($stmt->execute()) {

                        $_SESSION['account'] = TRUE;
                        $_SESSION['name']    = $param_name;

                        header("Location: " . URLROOT);
                        exit();
                    } else {
                        echo "Something went wrong. Please try again later.";
                    }
                }
            } else {
                header("Location: " . URLROOT . "/sign-up");
                exit();
            }
        } else {
            header("Location: " . URLROOT . "/sign-up");
            exit();
        }
    } else {
        echo 'Oops! Something went wrong. Please try again later.';
    }
}
