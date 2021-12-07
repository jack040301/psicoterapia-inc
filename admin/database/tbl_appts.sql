CREATE TABLE `tbl_appts` (
  `apptID` text NOT NULL,
  `userID` text NOT NULL,
  `docID` text NOT NULL,
  `date` text NOT NULL,
  `time` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `apptDateCreated` text NOT NULL,
  `FOREIGN KEY (userID) REFERENCES tbl_useraccount`(userID`),
  `FOREIGN KEY (docID) REFERENCES tbl_employee`(id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_appts`
--

INSERT INTO `tbl_appts` (`apptID`, `userID`, `docID`, `date`, `time`, `status`, `apptDateCreated`) VALUES
('1', '3', '1', '2021-12-06', '13:00:00', 'pending', '12-05-2021'),
('2', '3', '2', '2021-12-08', '14:00:00', 'pending', '12-05-2021');

-- --------------------------------------------------------