CREATE TABLE `tbl_superadmin`(
  `id` int(11) NOT NULL,
  `picture` text NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tempomail` varchar(255),
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  `birthday` date NOT NULL,
  `created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `tbl_superadmin`
ADD PRIMARY KEY (`id`);

ALTER TABLE `tbl_superadmin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;