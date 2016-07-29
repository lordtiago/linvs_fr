ALTER TABLE  `tithes` CHANGE  `person_id`  `person_id` INT( 11 ) NULL ;
ALTER TABLE  `tithes` DROP FOREIGN KEY  `people` ;

ALTER TABLE  `tithes` ADD CONSTRAINT  `people` FOREIGN KEY (  `person_id` ) REFERENCES  `linvs`.`people` (
`id`
) ON DELETE SET NULL ON UPDATE SET NULL ;
