CREATE TABLE `tbl_appointments`(
  `id` int(11) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `birthday` DATE NOT NULL,
  `picture` text,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date` DATE NOT NULL,
  `time` time NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `doc_id` int,
  `concern` varchar(255),
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `tbl_appointments`
ADD PRIMARY KEY (`id`);

ALTER TABLE `tbl_appointments`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;