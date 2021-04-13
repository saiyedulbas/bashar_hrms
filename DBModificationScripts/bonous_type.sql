CREATE TABLE `dhakacoffee_hrms`.`xin_bonous_type` ( `bonous_type_id` INT NOT NULL AUTO_INCREMENT , `bpnous_type` VARCHAR(200) NOT NULL , `status` TINYINT NOT NULL DEFAULT '0' , `created_by` INT NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_by` INT NULL DEFAULT NULL , PRIMARY KEY (`bonous_type_id`)) ENGINE = MyISAM;
ALTER TABLE `xin_bonous_type` ADD `company_id` INT NOT NULL AFTER `bonous_type_id`;
ALTER TABLE `xin_salary_payslips` ADD `total_bonous` VARCHAR(20) NOT NULL DEFAULT '0' AFTER `total_other_payments`;
ALTER TABLE `xin_bonous_type` CHANGE `bpnous_type` `bonous_type` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
ALTER TABLE `xin_salary_payslips` ADD `tax_deduction` VARCHAR(20) NOT NULL DEFAULT '0' AFTER `advance_salary_amount`;



ALTER TABLE `xin_salary_statutory_deductions` ADD `ordering` INT NOT NULL AFTER `employee_id`;

ALTER TABLE `xin_salary_payslip_statutory_deductions` ADD `ordering` INT NOT NULL AFTER `payslip_id`;