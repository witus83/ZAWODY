CREATE TABLE SHOOTER (
  
  ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  FirstName varchar(50) not null,
  LastName varchar(150) not null,
  City varchar(200) not null,
  Club varchar(1200),
  IsLicence boolean,
  BirthDate Date,
  Email varchar(150),
  Phone varchar(20),
  Notes varchar(1024),
  RegDate Timestamp
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

CREATE TABLE COMPETITION_TYPE (

  ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  DESCR varchar(300),
  Status int(2)
  
)

CREATE TABLE COMPETITION (

  ID INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  COMPETITION_NAME varchar(300),
  Date date
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
  Series int(1),
  FOREIGN KEY (COMPETITION_TYPE_ID) REFERENCES COMPETITION_TYPE(ID),
  FOREIGN KEY (COMPETITION_ID) REFERENCES COMPETITION(ID),
  FOREIGN KEY (SHOOTER_ID) REFERENCES SHOOTER(ID)
)

INSERT INTO `user` (`login`, `password`) VALUES
    ('admin', '21232f297a57a5a743894a0e4a801fc3');


