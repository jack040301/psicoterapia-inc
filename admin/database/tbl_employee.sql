CREATE TABLE `tbl_employee`(
  `id` int(11) NOT NULL,
  `picture` text,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `position` varchar(255) NOT NULL,
  `time` time,
  `start_date` date,
  `end_date` date,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tempomail` varchar(255),
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `tbl_employee`
ADD PRIMARY KEY (`id`);

ALTER TABLE `tbl_employee`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;