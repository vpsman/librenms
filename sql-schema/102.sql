CREATE TABLE IF NOT EXISTS `state_indexes` (
  `state_index_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `state_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`state_index_id`),
  UNIQUE KEY `state_name` (`state_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `state_translations` (
  `state_translation_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `state_index_id` int(11) unsigned NOT NULL,
  `state_descr` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `state_draw_graph` tinyint(1) unsigned NOT NULL,
  `state_value` tinyint(1) unsigned NOT NULL,
  `state_generic_value` tinyint(1) unsigned NOT NULL,
  `state_lastupdated` timestamp NOT NULL,
  PRIMARY KEY (`state_translation_id`),
  UNIQUE KEY `state_index_id_value` (`state_index_id`,`state_value`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
CREATE TABLE IF NOT EXISTS `sensors_to_state_indexes` (
  `sensors_to_state_translations_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sensor_id` int(11) unsigned NOT NULL,
  `state_index_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`sensors_to_state_translations_id`),
  UNIQUE KEY `sensor_id_state_index_id` (`sensor_id`,`state_index_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;
ALTER TABLE  `sensors_to_state_indexes` ADD FOREIGN KEY ( `sensor_id` ) REFERENCES  `sensors` (`sensor_id`) ON DELETE RESTRICT ON UPDATE RESTRICT ;
ALTER TABLE  `sensors_to_state_indexes` ADD FOREIGN KEY ( `state_index_id` ) REFERENCES  `state_indexes` (`state_index_id`) ON DELETE RESTRICT ON UPDATE RESTRICT ;
truncate table state_translations;
INSERT INTO state_indexes (`state_index_id`, `state_name`) VALUES (1, 'HP_PowerStatus');
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (1, 'Other', 0, 1, 1);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (1, 'OK', 0, 2, 0);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (1, 'Degraded', 0, 3, 2);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (1, 'Failed', 0, 4, 2);
INSERT INTO state_indexes (`state_index_id`, `state_name`) VALUES (2, 'HP_MemStatus');
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (2, 'Other', 0, 1, 1);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (2, 'OK', 0, 2, 0);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (2, 'Degraded', 0, 3, 2);
INSERT INTO state_indexes (`state_index_id`, `state_name`) VALUES (3, 'HP_CPUFanStatus');
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (3, 'Other', 0, 1, 1);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (3, 'OK', 0, 2, 0);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (3, 'Failed', 0, 4, 2);
INSERT INTO state_indexes (`state_index_id`, `state_name`) VALUES (4, 'HP_SysFanStatus');
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (4, 'Other', 0, 1, 1);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (4, 'OK', 0, 2, 0);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (4, 'Degraded', 0, 3, 2);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (4, 'Failed', 0, 4, 2);
INSERT INTO state_indexes (`state_index_id`, `state_name`) VALUES (5, 'HP_RAIDStatus');
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (5, 'Other', 0, 1, 1);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (5, 'OK', 0, 2, 0);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (5, 'Degraded', 0, 3, 2);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (5, 'Failed', 0, 4, 2);
INSERT INTO state_indexes (`state_index_id`, `state_name`) VALUES (6, 'HP_RAIDCache');
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (6, 'Other', 0, 1, 1);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (6, 'Invalid', 0, 2, 1);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (6, 'Enabled', 0, 3, 0);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (6, 'Temporary Disabled', 0, 4, 1);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (6, 'Permanently Disabled', 0, 5, 1);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (6, 'Cache Module Flash Memory Not Attached', 0, 6, 1);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (6, 'Cache Module Degraded Failsafe Speed', 0, 7, 1);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (6, 'Cache Module Critical Failure', 0, 8, 2);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (6, 'Read Cache Could Not Be Mapped', 0, 9, 1);
INSERT INTO state_indexes (`state_index_id`, `state_name`) VALUES (7, 'HP_RAIDBBU');
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (7, 'Other', 0, 1, 1);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (7, 'OK', 0, 2, 0);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (7, 'Recharging', 0, 3, 1);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (7, 'Failed', 0, 4, 1);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (7, 'Degraded', 0, 5, 1);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (7, 'Not Present', 0, 6, 1);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (7, 'Capacitor Failed', 0, 7, 1);
INSERT INTO state_indexes (`state_index_id`, `state_name`) VALUES (8, 'HP_RAIDLogDrv');
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (8, 'Other', 0, 1, 1);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (8, 'OK', 0, 2, 0);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (8, 'Degraded', 0, 3, 2);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (8, 'Failed', 0, 4, 2);
INSERT INTO state_indexes (`state_index_id`, `state_name`) VALUES (9, 'HP_PhysicalDrive');
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (9, 'Other', 0, 1, 1);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (9, 'OK', 0, 2, 0);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (9, 'Degraded', 0, 3, 2);
INSERT INTO state_translations (`state_index_id`, `state_descr`, `state_draw_graph`, `state_value`, `state_generic_value`) VALUES (9, 'Failed', 0, 4, 2);
