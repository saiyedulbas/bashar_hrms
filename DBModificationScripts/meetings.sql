ALTER TABLE `xin_meetings` CHANGE `employee_id` `employee_id` VARCHAR(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;

ALTER TABLE `xin_job_applications` ADD `phone` VARCHAR(25) NOT NULL AFTER `email`;