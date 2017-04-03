ALTER TABLE `mobile_data`.`tbl_user_info` 
ADD COLUMN `store_user_email` VARCHAR(100) NULL COMMENT 'store mobile sim provider user email  ' AFTER `is_verified`;

  