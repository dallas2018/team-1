ALTER TABLE `contactInfo` ADD `cellNumber` TEXT NULL AFTER `lastName`, ADD `email` TEXT NOT NULL AFTER `cellNumber`, ADD `birthday` TEXT NOT NULL AFTER `email`, ADD `zip` TEXT NOT NULL AFTER `birthday`, ADD `workStatus` BOOLEAN NOT NULL AFTER `zip`;
