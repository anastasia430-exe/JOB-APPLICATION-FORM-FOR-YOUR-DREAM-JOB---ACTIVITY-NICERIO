<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';

//  checks if application id is summitted
if (isset($_POST['application_id']) && isset($_POST['deleteApplication'])) {

    // get application ID
    $application_id = $_POST['application_id'];

    // delete the application from the database
    deleteApplication($pdo, $application_id);
}

// go back to main page
header("Location: index.php");
exit();
?>
