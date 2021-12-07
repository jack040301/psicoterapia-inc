CREATE TABLE `tbl_time`(
  `id` int(11) NOT NULL,
 `time` time
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `tbl_time`
ADD PRIMARY KEY (`id`);

ALTER TABLE `tbl_time`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;