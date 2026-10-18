<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';

// get the application ID from the URL
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$application_id = $_GET['id'];

//application details
$application = getApplicationByID($pdo, $application_id);

if (!$application) {
    die("Application not found.");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>edit job application</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 30px;
        }

        form {
            display: inline-block;
            text-align: left;
            padding: 25px;
            border: 1px solid black;
        }

        input, select {
            padding: 6px;
        }
    </style>
</head>
<body>

<h1>Edit Job Application</h1>

<form action="core/handleForms.php" method="POST">

    <input type="hidden" name="application_id"
           value="<?php echo htmlspecialchars($application['application_id']); ?>">
    <br><br>

    <label>First Name:</label>
    <input type="text" name="firstName"
           value="<?php echo htmlspecialchars($application['firstName']); ?>" required>
    <br><br>

    <label>Last Name:</label>
    <input type="text" name="lastName"
           value="<?php echo htmlspecialchars($application['lastName']); ?>" required>
    <br><br>

    <label>Email:</label>
    <input type="email" name="email"
           value="<?php echo htmlspecialchars($application['email']); ?>" required>
    <br><br>

    <label>Phone Number:</label>
    <input type="text" name="phoneNumber"
           value="<?php echo htmlspecialchars($application['phoneNumber']); ?>" required>
    <br><br>

    <label>Programming Language:</label>
    <select name="programmingLanguage" required>
        <option value="PHP" <?php if ($application['programmingLanguage'] == 'PHP') echo 'selected'; ?>>PHP</option>
        <option value="Python" <?php if ($application['programmingLanguage'] == 'Python') echo 'selected'; ?>>Python</option>
        <option value="Java" <?php if ($application['programmingLanguage'] == 'Java') echo 'selected'; ?>>Java</option>
        <option value="JavaScript" <?php if ($application['programmingLanguage'] == 'JavaScript') echo 'selected'; ?>>JavaScript</option>
        <option value="C++" <?php if ($application['programmingLanguage'] == 'C++') echo 'selected'; ?>>C++</option>
    </select>
    <br><br>

    <label>Work Experience Level:</label>
    <select name="workExperienceLevel" required>
        <option value="Entry-Level" <?php if ($application['workExperienceLevel'] == 'Entry-Level') echo 'selected'; ?>>Entry-Level</option>
        <option value="Junior" <?php if ($application['workExperienceLevel'] == 'Junior') echo 'selected'; ?>>Junior</option>
        <option value="Mid-Level" <?php if ($application['workExperienceLevel'] == 'Mid-Level') echo 'selected'; ?>>Mid-Level</option>
        <option value="Senior" <?php if ($application['workExperienceLevel'] == 'Senior') echo 'selected'; ?>>Senior</option>
    </select>
    <br><br>

    <label>Preferred Work Setup:</label>
    <select name="preferredWorkSetup" required>
        <option value="f2f" <?php if ($application['preferredWorkSetup'] == 'f2f') echo 'selected'; ?>>F2F</option>
        <option value="online" <?php if ($application['preferredWorkSetup'] == 'online') echo 'selected'; ?>>ONLINE</option>
        <option value="hybrid" <?php if ($application['preferredWorkSetup'] == 'hybrid') echo 'selected'; ?>>HYBRID</option>
    </select>
    <br><br>

   <div style="text-align: center;">
    <input type="submit" name="updateApplication" value="Update Application">
    <br><br>
    <a href="index.php">Cancel</a>
</div>
</form>

</body>
</html>
