CREATE TABLE `hrms`.`xin_tax_chalans` ( `id` INT NOT NULL AUTO_INCREMENT , `chalan_no` VARCHAR(50) NOT NULL , `submit_date` DATE NOT NULL , `bank_name` VARCHAR(200) NOT NULL , `month` INT NOT NULL , `year` INT NOT NULL , `total_amount` FLOAT(12,3) NOT NULL DEFAULT '0' , `chalan_file` TEXT NULL DEFAULT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , `added_by` INT NOT NULL , `updated_by` INT NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;







ALTER TABLE `xin_tax_chalans` ADD `company_id` INT NOT NULL AFTER `id`;
