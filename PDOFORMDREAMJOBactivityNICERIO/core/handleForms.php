<?php
require_once __DIR__ . '/dbConfig.php';
require_once __DIR__ . '/models.php';

// handles new application
if (isset($_POST['insertApplication'])) {

    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $programmingLanguage = $_POST['programmingLanguage'];
    $workExperienceLevel = $_POST['workExperienceLevel'];
    $preferredWorkSetup = $_POST['preferredWorkSetup'];

    insertApplication(
        $pdo,
        $firstName,
        $lastName,
        $email,
        $phoneNumber,
        $programmingLanguage,
        $workExperienceLevel,
        $preferredWorkSetup
    );

    header("Location: ../index.php");
    exit();
}

// delete application
if (isset($_POST['deleteApplication'])) {
    $application_id = $_POST['application_id'];
    deleteApplication($pdo, $application_id);
    header("Location: ../index.php");
    exit();
}
// updates application
if (isset($_POST['updateApplication'])) {
    $application_id = $_POST['application_id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $programmingLanguage = $_POST['programmingLanguage'];
    $workExperienceLevel = $_POST['workExperienceLevel'];
    $preferredWorkSetup = $_POST['preferredWorkSetup'];

    updateApplication(
        $pdo,
        $application_id,
        $firstName,
        $lastName,
        $email,
        $phoneNumber,
        $programmingLanguage,
        $workExperienceLevel,
        $preferredWorkSetup
    );
    header("Location: ../index.php");
    exit();
}
?>
