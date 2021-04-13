CREATE TABLE `dhakacoffee_hrms`.`xin_employee_earn_leave` ( `id` INT NOT NULL , `employee_id` INT NOT NULL , `leave_balance` VARCHAR(10) NOT NULL , `year` VARCHAR(10) NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `added_by` INT NOT NULL , `updated_by` INT NULL DEFAULT NULL ) ENGINE = MyISAM;
ALTER TABLE `xin_employee_earn_leave` ADD `status` TINYINT(3) NOT NULL DEFAULT '0' AFTER `year`;
ALTER TABLE `xin_employee_earn_leave` ADD `leave_taken` VARCHAR(12) NOT NULL DEFAULT '0' AFTER `status`;
ALTER TABLE `xin_employee_earn_leave` ADD PRIMARY KEY(`id`);
ALTER TABLE `xin_employee_earn_leave` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;

//28/3/21
ALTER TABLE `xin_employee_earn_leave` ADD `leave_encashment` TINYINT NOT NULL DEFAULT '0' AFTER `year`;