USE `ppmis_db`;
CREATE  OR REPLACE VIEW `new_view` AS
    SELECT 
        `x`.`username` AS `username`,
        `y`.`id` AS `id`,
        `y`.`user_id` AS `user_id`,
        `y`.`first` AS `first`,
        `y`.`middle` AS `middle`,
        `y`.`last` AS `last`,
        `y`.`email` AS `email`,
        `y`.`rank_id` AS `rank_id`,
        `r`.`rank_name` AS `rank_name`
    FROM
        ((`tbl_users` `x`
        JOIN `tbl_users_info` `y` ON (`y`.`user_id` = `x`.`id`))
        JOIN `tbl_rank` `r` ON (`r`.`id` = `y`.`rank_id`))
    WHERE
        `x`.`deleted_flag` = 0;
