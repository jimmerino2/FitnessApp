-- Member Table
CREATE TABLE IF NOT EXISTS Member (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    memberName VARCHAR(30) NOT NULL,
    memberContact VARCHAR(12) NOT NULL,
    memberPassword VARCHAR(255) NOT NULL, 
    gender CHAR(1) NOT NULL,     
    email VARCHAR(50) NOT NULL,
    DOB DATE NOT NULL,
    UNIQUE (email),
    UNIQUE (memberContact)
);

-- Nutritionist Table
CREATE TABLE IF NOT EXISTS Nutritionist (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nutritionistName VARCHAR(50) NOT NULL,
    nutritonistDesc TEXT,
    nutritionistContact VARCHAR(12) NOT NULL,
    studyRecord varchar(300)
);

-- Exercise Table
CREATE TABLE IF NOT EXISTS Exercise (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    duration INT NOT NULL,
    calories INT NOT NULL,
    excerciseType VARCHAR(50) NOT NULL
);

-- Classes Table
CREATE TABLE IF NOT EXISTS Classes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    className VARCHAR(50) NOT NULL,
    classDesc TEXT,
    classTime TIME NOT NULL,
    classType VARCHAR(50) NOT NULL
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
    FOREIGN KEY (memberID) REFERENCES Member(id),
    FOREIGN KEY (nutritionistID) REFERENCES Nutritionist(id)
);

-- Enrollment Table
CREATE TABLE IF NOT EXISTS Enrollment (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    memberID INT(6) UNSIGNED NOT NULL,
    classID INT(6) UNSIGNED NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    price DECIMAL(5,2) NOT NULL,
    FOREIGN KEY (memberID) REFERENCES Member(id),
    FOREIGN KEY (classID) REFERENCES Classes(id)
);
