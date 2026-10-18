
<?php
require_once 'core/dbConfig.php';
require_once 'core/models.php';

$applications = getAllApplications($pdo);
?>

<!DOCTYPE html>
<html>
<head>
    <title>job application form</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 30px;
        }

        .application-form {
            display: inline-block;
            text-align: left;
            padding: 25px;
            border: 1px solid black;
            margin-bottom: 30px;
        }

        input, select {
            padding: 6px;
            margin-top: 3px;
        }

        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 95%;
        }

        th, td {
            padding: 10px;
            border: 1px solid black;
        }

        th {
            background-color: #eeeeee;
        }

        .table-container {
            overflow-x: auto;
            width: 100%;
        }
    </style>
</head>
<body>

<h1>Programmer Application Form</h1>

<form class="application-form" action="core/handleForms.php" method="POST">

    <label>First name:</label>
    <input type="text" name="firstName" required>
    <br><br>

    <label>Last name:</label>
    <input type="text" name="lastName" required>
    <br><br>

    <label>E-mail:</label>
    <input type="email" name="email" required>
    <br><br>

    <label>Phone number:</label>
    <input type="text" name="phoneNumber" required>
    <br><br>

    <label>Programming language:</label>
    <select name="programmingLanguage" required>
        <option value="PHP">PHP</option>
        <option value="Python">Python</option>
        <option value="Java">Java</option>
        <option value="JavaScript">JavaScript</option>
        <option value="C++">C++</option>
    </select>
    <br><br>

    <label>Work Experience Level:</label>
    <select name="workExperienceLevel" required>
        <option value="Entry-Level">Entry-Level</option>
        <option value="Junior">Junior</option>
        <option value="Mid-Level">Mid-Level</option>
        <option value="Senior">Senior</option>
    </select>
    <br><br>

    <label>Preferred work-setup:</label>
    <select name="preferredWorkSetup" required>
        <option value="f2f">F2F</option>
        <option value="online">ONLINE</option>
        <option value="hybrid">HYBRID</option>
    </select>
    <br><br>

    <div style="text-align: center;">
        <input type="submit" name="insertApplication" value="submit">
    </div>

</form>

<hr>

<h2>Records</h2>

<div class="table-container">

<?php if ($applications) { ?>

    <table>
        <tr>
            <th>id</th>
            <th>first name</th>
            <th>last name</th>
            <th>e-mail</th>
            <th>phone number</th>
            <th>programming language</th>
            <th>work experience level</th>
            <th>preferred work-setup</th>
            <th>date-added</th>
            <th>actions</th>
        </tr>

        <?php foreach ($applications as $application) { ?>

            <tr>
                <td><?php echo htmlspecialchars($application['application_id']); ?></td>
                <td><?php echo htmlspecialchars($application['firstName']); ?></td>
                <td><?php echo htmlspecialchars($application['lastName']); ?></td>
                <td><?php echo htmlspecialchars($application['email']); ?></td>
                <td><?php echo htmlspecialchars($application['phoneNumber']); ?></td>
                <td><?php echo htmlspecialchars($application['programmingLanguage']); ?></td>
                <td><?php echo htmlspecialchars($application['workExperienceLevel']); ?></td>
                <td><?php echo htmlspecialchars($application['preferredWorkSetup']); ?></td>
                <td><?php echo htmlspecialchars($application['date_added']); ?></td>

                <td>
                    <a href="editApplication.php?id=<?php echo urlencode($application['application_id']); ?>">Edit</a>

                    <form action="deleteApplication.php" method="POST">
                        <input type="hidden" name="application_id"
                               value="<?php echo htmlspecialchars($application['application_id']); ?>">

                        <input type="submit" name="deleteApplication"
                               value="Delete"
                               onclick="return confirm('Are you sure you want to delete this application?');">
                    </form>
                </td>
            </tr>

        <?php } ?>

    </table>

<?php } else { ?>

    <p>No Applications Yet.</p>

<?php } ?>

</div>

</body>
</html>
