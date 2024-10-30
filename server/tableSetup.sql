-- #region Table Creation
-- Member Table
CREATE TABLE IF NOT EXISTS Member (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    memberName VARCHAR(30) NOT NULL,
    memberContact VARCHAR(12) NOT NULL,
    memberPassword VARCHAR(255) NOT NULL, 
    gender CHAR(1) NOT NULL,     
    email VARCHAR(50) NOT NULL,
    DOB DATE NOT NULL,
    UNIQUE (email)
);

-- Nutritionist Table
CREATE TABLE IF NOT EXISTS Nutritionist (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nutritionistName VARCHAR(50) NOT NULL,
    nutritonistDesc TEXT,
    nutritionistContact VARCHAR(12) NOT NULL,
    studyRecord VARCHAR(300),
    UNIQUE (nutritionistContact)
);

-- Exercise Table
CREATE TABLE IF NOT EXISTS Exercise (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    duration INT NOT NULL,
    calories INT NOT NULL,
    exerciseType VARCHAR(50) NOT NULL
);

-- Classes Table
CREATE TABLE IF NOT EXISTS Classes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    className VARCHAR(50) NOT NULL,
    classDesc TEXT,
    price DECIMAL(5,2) NOT NULL,
    classType VARCHAR(50) NOT NULL,
    UNIQUE (className)
);

-- HealthRecord Table
CREATE TABLE IF NOT EXISTS HealthRecord (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    memberID INT(6) UNSIGNED NOT NULL,
    exerciseID INT(6) UNSIGNED NOT NULL,
    weight DECIMAL(5,2) NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    water INT NOT NULL,
    FOREIGN KEY (memberID) REFERENCES Member(id),
    FOREIGN KEY (exerciseID) REFERENCES Exercise(id)
);

-- Consultation Table
CREATE TABLE IF NOT EXISTS Consultation (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    memberID INT(6) UNSIGNED NOT NULL,
    nutritionistID INT(6) UNSIGNED NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    comment TEXT,
    status BOOLEAN NOT NULL, 
    FOREIGN KEY (memberID) REFERENCES Member(id),
    FOREIGN KEY (nutritionistID) REFERENCES Nutritionist(id)
);

-- Enrollment Table
CREATE TABLE IF NOT EXISTS Enrollment (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    memberID INT(6) UNSIGNED NOT NULL,
    classID INT(6) UNSIGNED NOT NULL,
    startDate DATE NOT NULL,
    endDate DATE NOT NULL,
    FOREIGN KEY (memberID) REFERENCES Member(id),
    FOREIGN KEY (classID) REFERENCES Classes(id)
);
-- #endregion

-- #region Data Insertion
-- Nutritionist Data
INSERT IGNORE INTO Nutritionist (nutritionistName, nutritonistDesc, nutritionistContact, studyRecord) VALUES
    ('Alice Johnson', 'Experienced dietitian specializing in sports nutrition.', '0123456789', 'Bachelor of Science in Nutrition, Master in Sports Science'),
    ('Bob Smith', 'Clinical nutritionist with a focus on chronic illness management.', '0987654321', 'Bachelor of Nutrition and Dietetics, Certification in Clinical Nutrition'),
    ('Cathy Lee', 'Holistic nutritionist helping clients with weight management.', '0112233445', 'Bachelor of Health Sciences, Certified Holistic Nutritionist'),
    ('David Brown', 'Registered dietitian specializing in pediatric nutrition.', '0223344556', 'Bachelor of Science in Dietetics, Pediatric Nutrition Certification'),
    ('Eva Green', 'Expert in vegan and plant-based diets.', '0334455667', 'Master of Science in Nutrition, Vegan Nutrition Certification');
-- #endregion

INSERT IGNORE INTO Classes (className, classDesc, price, classType) VALUES
    ('Test1', 'Experienced dietitian specializing in sports nutrition.', '50.00', 'I'),
    ('Test2', 'Clinical nutritionist with a focus on chronic illness management.', '100.00', 'M');
