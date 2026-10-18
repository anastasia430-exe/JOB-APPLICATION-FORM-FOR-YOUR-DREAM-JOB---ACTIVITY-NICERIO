<?php
// insert a new application into the database
function insertApplication($pdo, $firstName, $lastName, $email, $phoneNumber, $programmingLanguage, $workExperienceLevel, $preferredWorkSetup) {
    $sql = "INSERT INTO applications
            (firstName, lastName, email, phoneNumber, programmingLanguage, workExperienceLevel, preferredWorkSetup)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    return $stmt->execute([
        $firstName,
        $lastName,
        $email,
        $phoneNumber,
        $programmingLanguage,
        $workExperienceLevel,
        $preferredWorkSetup
    ]);
}

// getting all the applicants from database fetch all

function getAllApplications($pdo) {
    $sql = "SELECT * FROM applications ORDER BY date_added DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// fetch 1 grabs 1
function getApplicationByID($pdo, $application_id) {
    $sql = "SELECT * FROM applications WHERE application_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$application_id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

//update
function updateApplication($pdo, $application_id, $firstName, $lastName, $email, $phoneNumber, $programmingLanguage, $workExperienceLevel, $preferredWorkSetup) {
    $sql = "UPDATE applications
            SET firstName = ?, lastName = ?, email = ?, phoneNumber = ?,
                programmingLanguage = ?, workExperienceLevel = ?, preferredWorkSetup = ?
            WHERE application_id = ?";

    $stmt = $pdo->prepare($sql);

    return $stmt->execute([
        $firstName,
        $lastName,
        $email,
        $phoneNumber,
        $programmingLanguage,
        $workExperienceLevel,
        $preferredWorkSetup,
        $application_id
    ]);
}
//delete
function deleteApplication($pdo, $application_id) {
    $sql = "DELETE FROM applications WHERE application_id = ?";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([$application_id]);
}
?>
