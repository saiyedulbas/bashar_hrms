CREATE TABLE `dhakacoffee_hrms`.`xin_salary_payslip_bonous` ( `payslip_bonous_id` INT NOT NULL AUTO_INCREMENT , `payslip_id` INT NOT NULL , `employee_id` INT NOT NULL , `bonous_title` VARCHAR(200) NOT NULL , `bonous_amount` VARCHAR(100) NOT NULL , `salary_month` VARCHAR(30) NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`payslip_bonous_id`)) ENGINE = MyISAM;
ALTER TABLE `xin_salary_payslips` ADD `basicSalary` FLOAT(13,2) NOT NULL DEFAULT '0' AFTER `basic_salary`, ADD `houseRent` FLOAT(13,2) NOT NULL DEFAULT '0' AFTER `basicSalary`, ADD `medicalAllowance` FLOAT(13,2) NOT NULL DEFAULT '0' AFTER `houseRent`, ADD `totalConveyence` FLOAT(13,2) NOT NULL DEFAULT '0' AFTER `medicalAllowance`;