ALTER TABLE `xin_employees` ADD `title` ENUM('MR.','MD.','MRS.','MS.','MISS.') NULL DEFAULT NULL AFTER `citizenship_id`, ADD `n_id` VARCHAR(50) NULL DEFAULT NULL AFTER `title`;
ALTER TABLE `xin_employees` ADD `religion` ENUM('Islam','Hinduism','Buddhism','Sikhism','Taoism','Judaism','Confucianism','Shinto','Jainism','Zoroastrianism') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL AFTER `n_id`;


CREATE TABLE xin_employee_additional` ( `id` INT NOT NULL AUTO_INCREMENT , `other_name` VARCHAR(50) NULL DEFAULT NULL , `full_name` VARCHAR(100) NULL DEFAULT NULL , `father_name` VARCHAR(100) NULL DEFAULT NULL , `mother_name` VARCHAR(100) NULL DEFAULT NULL , `pre_house_no` VARCHAR(30) NULL DEFAULT NULL , `pre_street1` VARCHAR(200) NULL DEFAULT NULL , `pre_street2` VARCHAR(200) NULL DEFAULT NULL , `pre_city` INT NULL DEFAULT NULL , `pre_district` INT NULL DEFAULT NULL , `pre_country` INT NULL DEFAULT NULL , `pre_tel` VARCHAR(20) NULL DEFAULT NULL , `pre_mobile` VARCHAR(20) NULL DEFAULT NULL , `per_house_no` VARCHAR(30) NULL DEFAULT NULL , `per_police_station` INT NULL DEFAULT NULL , `per_post_office` INT NULL DEFAULT NULL , `per_city` INT NULL DEFAULT NULL , `per_district` INT NULL DEFAULT NULL , `per_country` INT NULL DEFAULT NULL , `per_tel` VARCHAR(20) NULL DEFAULT NULL , `per_mobile` VARCHAR(20) NULL DEFAULT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `added_by` INT NOT NULL , `updated_by` INT NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;


CREATE TABLE `xin_employee_training` ( `id` INT NOT NULL AUTO_INCREMENT , `employee_id` INT NOT NULL , `training_category` INT NOT NULL , `title` VARCHAR(250) NOT NULL , `institute` VARCHAR(200) NOT NULL , `time_period` VARCHAR(50) NOT NULL , `year` INT NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `added_by` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;


CREATE TABLE `xin_employee_academic` ( `id` INT NOT NULL AUTO_INCREMENT , `employee_id` INT NOT NULL , `academic_type` INT NOT NULL , `institute_name` VARCHAR(250) NOT NULL , `board` VARCHAR(100) NOT NULL , `cgpa` VARCHAR(10) NOT NULL , `duration` INT NOT NULL , `passing_year` INT NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `added_by` INT NOT NULL , `updated_by` INT NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

CREATE TABLE `xin_employee_extra_curriculam` ( `id` INT NOT NULL AUTO_INCREMENT , `employee_id` INT NOT NULL , `interest` TEXT NULL DEFAULT NULL , `hobbies` TEXT NULL DEFAULT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `added_by` INT NOT NULL , `updated_by` INT NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

ALTER TABLE `xin_employee_additional` ADD `employee_id` INT NOT NULL AFTER `id`;

ALTER TABLE `xin_employee_additional` ADD `spouse_name` VARCHAR(200) NULL DEFAULT NULL AFTER `mother_name`, ADD `no_of_child` VARCHAR(50) NULL DEFAULT NULL AFTER `spouse_name`;

ALTER TABLE `xin_employee_additional` CHANGE `per_post_office` `per_post_office` VARCHAR(50) NULL DEFAULT NULL;

CREATE TABLE `xin_professional_training_category` ( `id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(250) NOT NULL , `added_by` INT NOT NULL , `updated_by` INT NULL DEFAULT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = MyISAM;

ALTER TABLE `xin_employees` ADD `daily_food_allowance` INT(4) NOT NULL DEFAULT '0' AFTER `religion`;

ALTER TABLE `xin_salary_payslips` ADD `net_payable_salary` VARCHAR(15) NOT NULL DEFAULT '0' AFTER `net_salary`;

ALTER TABLE `xin_employees` ADD `e_tin` VARCHAR(30) NULL DEFAULT NULL AFTER `daily_food_allowance`;

ALTER TABLE `xin_finance_payees` ADD `debit_account` VARCHAR(50) NULL DEFAULT NULL AFTER `contact_number`, ADD `email` VARCHAR(100) NULL DEFAULT NULL AFTER `debit_account`, ADD `batch` VARCHAR(50) NULL DEFAULT NULL AFTER `email`, ADD `credit_account` VARCHAR(50) NULL DEFAULT NULL AFTER `batch`, ADD `txn_type` VARCHAR(50) NULL DEFAULT NULL AFTER `credit_account`, ADD `bank_name` VARCHAR(200) NULL DEFAULT NULL AFTER `txn_type`, ADD `routing_no` VARCHAR(50) NULL DEFAULT NULL AFTER `bank_name`, ADD `pay_amount` VARCHAR(20) NULL DEFAULT NULL AFTER `routing_no`, ADD `remarks` TEXT NULL DEFAULT NULL AFTER `pay_amount`;
ALTER TABLE `xin_salary_payslips` ADD `food_allowance` VARCHAR(20) NOT NULL DEFAULT '0' AFTER `status`;

ALTER TABLE `xin_finance_payees`
  DROP `debit_account`,
  DROP `batch`,
  DROP `txn_type`,
  DROP `pay_amount`,
  DROP `remarks`;

ALTER TABLE `xin_employee_promotions` ADD `designation_id` INT NOT NULL AFTER `company_id`;
//01/12/2020
ALTER TABLE `xin_leave_applications` ADD `employee_alternate` INT NULL DEFAULT NULL AFTER `employee_id`;
ALTER TABLE `xin_assets` ADD `asset_value` FLOAT(13,2) NOT NULL DEFAULT '0' AFTER `name`;