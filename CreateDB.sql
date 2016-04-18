CREATE TABLE `SHOOTER` (
  `ID` int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
  `FirstName` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `LastName` varchar(150) COLLATE utf8_polish_ci NOT NULL,
  `City` varchar(200) COLLATE utf8_polish_ci DEFAULT NULL,
  `Club` varchar(200) COLLATE utf8_polish_ci DEFAULT NULL,
  `IsLicence` tinyint(1) DEFAULT NULL,
  `BirthDate` date DEFAULT NULL,
  `Email` varchar(150) COLLATE utf8_polish_ci DEFAULT NULL,
  `Phone` varchar(20) COLLATE utf8_polish_ci DEFAULT NULL,
  `Notes` varchar(1024) COLLATE utf8_polish_ci DEFAULT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;




CREATE PROCEDURE `insert_shooter` 
( 
IN `p_FirstName` VARCHAR( 50 ) CHARSET utf8, 
IN `p_LastName` VARCHAR( 150 ) CHARSET utf8, 
IN `p_City` VARCHAR( 200 ) CHARSET utf8, 
IN `p_Club` VARCHAR( 200 ) CHARSET utf8, 
IN `p_IsLicence` BOOLEAN, 
IN `p_BirthDate` DATE, 
IN `p_Email` VARCHAR( 150 ) CHARSET utf8, 
IN `p_Phone` VARCHAR( 20 ) CHARSET utf8, 
IN `p_Notes` VARCHAR( 1024 ) CHARSET utf8 ) NOT DETERMINISTIC 
CONTAINS SQL SQL SECURITY DEFINER 
INSERT INTO SHOOTER
(
FirstName, 
LastName, 
City, 
Club, 
IsLicence, 
BirthDate, 
Email, 
Phone, 
Notes )
VALUES (
p_FirstName, 
p_LastName, 
p_City, 
p_Club, 
p_IsLicence, 
p_BirthDate, 
p_Email, 
p_Phone, 
p_Notes
)



CREATE TABLE USER (
  ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  Login varchar(20),
  Password varchar(300),
  FirstName varchar(50),
  LastName varchar(150),
  Email (varchar(150),
  Status int(2)
  )

-------------------------------------------------------------------------------------


CREATE TABLE TYPE (

  ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  Name varchar(300),
  Status int(2)
)

CREATE TABLE COMPETITION (
  ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  COMPETITION_NAME varchar(300),
  Date date
)

CREATE TABLE COMPETITION_TYPE(

   ID INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   FOREIGN KEY (TYPE_ID) REFERENCES TYPE(ID),
   FOREIGN KEY (COMPETITION_ID) REFERENCES COMPETITION(ID),

)

CREATE TABLE RESULTS (
  ID INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  P_0 int(2),
  P_1 int(2),
  P_2 int(2),
  P_3 int(2),
  P_4 int(2),
  P_5 int(2),
  P_6 int(2),
  P_7 int(2),
  P_8 int(2),
  P_9 int(2),
  P_10 int(2),
  Series int(2),
  FOREIGN KEY (COMPETITION_TYPE_ID) REFERENCES COMPETITION_TYPE(ID),
  FOREIGN KEY (SHOOTER_ID) REFERENCES SHOOTER(ID)
)

INSERT INTO `user` (`login`, `password`) VALUES
    ('admin', '21232f297a57a5a743894a0e4a801fc3');


