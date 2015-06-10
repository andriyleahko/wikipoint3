ALTER TABLE `objects` ADD `who_add` INT NULL DEFAULT NULL AFTER `id_wherefrom`;
ALTER TABLE `objects` ADD `is_new` INT NULL AFTER `who_add`;