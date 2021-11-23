CREATE TABLE `studentInfo` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY    ,
    `studentName` VARCHAR(20) NOT NULL,
    `school` TEXT NOT NULL,
    `grade` TEXT NOT NULL,
    `testScore` INT
);


CREATE TABLE `teacherInfo` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY    ,
    `teacherName` VARCHAR(20) NOT NULL,
    `address` TEXT NOT NULL,
    `phone` TEXT NOT NULL,
    `gender` TEXT,
    `age` INT
);

