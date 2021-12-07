CREATE TABLE `tbl_useraccount` (
  `userID` text NOT NULL,
  `userImage` text NOT NULL,
  `userGivenName` text NOT NULL,
  `userSurname` text NOT NULL,
  `userFullname` text NOT NULL,
  `userUsername` text NOT NULL,
  `userContactNumber` text NOT NULL,
  `userAddress` text NOT NULL,
  `userBirthday` text NOT NULL,
  `userAge` text NOT NULL,
  `userEmail` text NOT NULL,
  `userPassword` text NOT NULL,
  `userCode` text NOT NULL,
  `userFPCode` text NOT NULL,
  `userStatus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_useraccount`
--

INSERT INTO `tbl_useraccount` (`userID`, `userImage`, `userGivenName`, `userSurname`, `userFullname`, `userUsername`, `userContactNumber`, `userAddress`, `userBirthday`, `userAge`, `userEmail`, `userPassword`, `userCode`, `userFPCode`, `userStatus`) VALUES
('1', '', 'Dem', 'ROvira', 'Dem ROvira', 'leonida', '09673222205', 'BLOCK 39 LOT 15', '1997-01-28', '24', 'demverleenespinola07@gmail.com', 'spM4Gpog', '0', '0', 'verified'),
('2', '', 'DEMVERLEEN', 'ESPINOLA', 'DEMVERLEEN ESPINOLA', 'DEM', '09673522220', 'CALOOCAN CITY', '1999-10-07', '22', 'espinola.demverleen.bscs2019@gmail.com', '4tJvStt3a9X1w/M5', '0', '0', 'verified'),
('3', 'uploads/default.png', 'DEM', 'ESPINOLA', 'DEM ESPINOLA', 'ASD', '09673222205', 'CALOOCAN CITY', '1999-10-07', '22', 'espinola.demverleen@gmail.com', 'spM4', '0', '0', 'verified');

--
-- Indexes for dumped tables
--