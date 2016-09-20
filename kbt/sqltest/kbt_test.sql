CREATE DATABASE `kbt_login`;
CREATE TABLE `kbt_login`.`members`(
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
`username` VARCHAR(20) NOT NULL,
`email` VARCHAR(256) NOT NULL,
`password` CHAR(128) NOT NULL
) ENGINE=InnoDB;
CREATE TABLE `kbt_login`.`login_attempts`(
`user_id` INT(11) NOT NULL,
`time` VARCHAR(30) NOT NULL
) ENGINE=InnoDB;
INSERT INTO `kbt_login`.`members` VALUES(1, 'test_user', 'test@example.com',
'$2y$10$IrzYJi10j3Jy/K6jzSLQtOLif1wEZqTRQoK3DcS3jdnFEhL4fWM4G');