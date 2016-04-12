CREATE PROCEDURE `insert_shooter`(IN `p_FirstName` VARCHAR(50), IN `p_LastName` VARCHAR(150), IN `p_City` VARCHAR(100), IN `p_Club` VARCHAR(100), IN `p_IsLicence` BOOLEAN, IN `p_BirthDate` DATE, IN `p_Email` VARCHAR(150), IN `p_Phone` VARCHAR(20), IN `p_Notes` VARCHAR(1024))
INSERT INTO SHOOTER (
	FirstName, 
	LastName,
	City,
    Club,
    IsLicence,
    BirthDate,
    Email,
    Phone,
    Notes
) 	
	values	
	(
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
