CREATE TABLE `tbl_company`(
  `id` int(11) NOT NULL,
  `companyname1` text,
  `companyname2` varchar(255),
  `companyname3` varchar(255),
  `companylogo` text NOT NULL,
  `organization` varchar(255) NOT NULL,
  `establish` date not null ,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `tbl_company`
ADD PRIMARY KEY (`id`);

ALTER TABLE `tbl_company`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;