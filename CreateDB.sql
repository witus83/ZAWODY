CREATE TABLE `SHOOTER` (
  ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `FirstName` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `LastName` varchar(150) COLLATE utf8_polish_ci NOT NULL,
  `City` varchar(200) COLLATE utf8_polish_ci DEFAULT NULL,
  `Club` varchar(200) COLLATE utf8_polish_ci DEFAULT NULL,
  `IsLicence` tinyint(1) DEFAULT NULL,
  `LicenceNr` varchar(50) DEFAULT NULL,
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
IN `p_licenceNr` VARCHAR(50), 
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
LicenceNr, 
Email, 
Phone, 
Notes )
VALUES (
p_FirstName, 
p_LastName, 
p_City, 
p_Club, 
p_IsLicence, 
p_LicenceNr, 
p_Email, 
p_Phone, 
p_Notes
)



CREATE TABLE USER (
  ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Login varchar(20) NOT NULL,
  Password varchar(300),
  FirstName varchar(50),
  LastName varchar(150),
  Email varchar(150),
  Status int
  )

-------------------------------------------------------------------------------------

CREATE TABLE TYPE (

  ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Name varchar(300),
  Status int(2)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
 


CREATE TABLE COMPETITION (
  ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  COMPETITION_NAME varchar(300),
  Date date
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;


CREATE TABLE COMPETITION_TYPE(

   ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	TYPE_ID INT NOT NULL,
COMPETITION_ID INT NOT NULL,
   FOREIGN KEY (TYPE_ID) REFERENCES TYPE(ID),
   FOREIGN KEY (COMPETITION_ID) REFERENCES COMPETITION(ID)

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;




CREATE TABLE RESULT (
ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  P_0 int,
  P_1 int,
  P_2 int,
  P_3 int,
  P_4 int,
  P_5 int,
  P_6 int,
  P_7 int,
  P_8 int,
  P_9 int,
  P_10 int,
  P_10_Z INT,
  P_10_W INT,
  Sum int(5),
  Series int(2),
  COMPETITION_TYPE_ID INT,
  SHOOTER_ID INT,
  FOREIGN KEY (COMPETITION_TYPE_ID) REFERENCES COMPETITION_TYPE(ID),
  FOREIGN KEY (SHOOTER_ID) REFERENCES SHOOTER(ID)
)



