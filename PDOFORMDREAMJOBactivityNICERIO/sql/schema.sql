CREATE TABLE applications (
    application_id INT AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(100),
    lastName VARCHAR(100),
    email VARCHAR(100),
    phoneNumber VARCHAR(20),
    programmingLanguage VARCHAR(100),
    yearsOfExperience INT,
    preferredWorkSetup VARCHAR(50),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);