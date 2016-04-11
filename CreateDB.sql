CREATE TABLE SHOOTERS (
  
  ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  FirstName varchar(50),
  LastName varchar(150),
  City varchar(100),
  Club varchar(100),
  IsLicence boolean,
  DateBirth Date,
  Email varchar(50),
  RegDate Timestamp
  
)


CREATE TABLE COMPETITION_TYPE (

  ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  DESCR varchar(200)
  
)

CREATE TABLE COMPETITIONS (

  ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  COMPETITION_NAME varchar(300),
  MONTH INT(2),
  YEAR INT(4)
  
)



