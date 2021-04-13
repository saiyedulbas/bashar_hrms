
CREATE TABLE `dhakacoffee_hrms`.`xin_employee_bonous` ( `emp_bonous_id` INT NOT NULL AUTO_INCREMENT , `employee_id` INT NOT NULL , `bonous_type_id` INT NOT NULL , `amount` VARCHAR(100) NOT NULL , `amount_option` TINYINT(0) NOT NULL , `status` TINYINT(0) NOT NULL , `added_by` INT NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_by` INT NULL DEFAULT NULL , `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`emp_bonous_id`)) ENGINE = MyISAM;
ALTER TABLE `xin_employee_bonous` ADD `company_id` INT NOT NULL AFTER `emp_bonous_id`;
ALTER TABLE `xin_salary_overtime` ADD `status` TINYINT(3) NOT NULL DEFAULT '1' AFTER `overtime_rate`;
ALTER TABLE `xin_salary_overtime` CHANGE `status` `status` TINYINT(3) NOT NULL DEFAULT '0';