<?php

/*
 * LibreNMS
 *
 * Copyright (c) 2014 Neil Lathwood <https://github.com/laf/ http://www.lathwood.co.uk/fa>
 *
 * This program is free software: you can redistribute it and/or modify it
 * under the terms of the GNU General Public License as published by the
 * Free Software Foundation, either version 3 of the License, or (at your
 * option) any later version.  Please see LICENSE.txt at the top level of
 * the source code distribution for details.
 */

if ($device['os'] == 'linux' || $device['os'] == 'windows') {
    $oids     = snmp_walk($device, '1.3.6.1.4.1.232.6.2.9', '-Osqn', '');
    $main_oid = '.1.3.6.1.4.1.232.6.2.9.1.';
    if ($debug) {
        echo $oids."\n";
    }

    $oids = trim($oids);
    if ($oids) {
        echo 'HP_PowerStatus ';
        foreach (explode("\n", $oids) as $data) {
            list($oid,)    = explode(' ', $data, 2);
            $state_oid     = '0';
            $state_current = snmp_get($device, $main_oid.$state_oid, '-Oevq');
            discover_sensor($valid['sensor'], 'state', $device, $main_oid.$state_oid, 'HP_PowerStatus', 'snmp', 'Power Status', '1', '1', null, null, null, null, $state_current);

            $sensor_entry = dbFetchRow('SELECT sensor_id FROM `sensors` WHERE `sensor_class` = ? AND `device_id` = ? AND `sensor_type` = ? AND `sensor_index` = ?', array('state', $device['device_id'], 'snmp', 'HP_PowerStatus'));
            $state_indexes_entry = dbFetchRow('SELECT state_index_id FROM `state_indexes` WHERE `state_name` = ?', array('HP_PowerStatus'));

            if (!empty($sensor_entry['sensor_id']) && !empty($state_indexes_entry['state_index_id'])) {
                $insert = array(
                    'sensor_id' => $sensor_entry['sensor_id'],
                    'state_index_id' => $state_indexes_entry['state_index_id'],
                );

                foreach ($insert as $key => $val_check) {
                    if (!isset($val_check)) {
                        unset($insert[$key]);
                    }
                }
                $inserted = dbInsert($insert, 'sensors_to_state_indexes');
            }
        }
    }
}

if ($device['os'] == 'linux' || $device['os'] == 'windows') {
    $oids     = snmp_walk($device, '1.3.6.1.4.1.232.6.2.14', '-Osqn', '');
    $main_oid = '.1.3.6.1.4.1.232.6.2.14.';
    if ($debug) {
        echo $oids."\n";
    }

    $oids = trim($oids);
    if ($oids) {
        echo 'HP_MemStatus ';
        foreach (explode("\n", $oids) as $data) {
            list($oid,)    = explode(' ', $data, 2);
            $state_oid     = '4';
            $state_current = snmp_get($device, $main_oid.$state_oid, '-Oevq');
            discover_sensor($valid['sensor'], 'state', $device, $main_oid.$state_oid, 'HP_MemStatus', 'snmp', 'Memory Status', '1', '1', null, null, null, null, $state_current);

            $sensor_entry = dbFetchRow('SELECT sensor_id FROM `sensors` WHERE `sensor_class` = ? AND `device_id` = ? AND `sensor_type` = ? AND `sensor_index` = ?', array('state', $device['device_id'], 'snmp', 'HP_MemStatus'));
            $state_indexes_entry = dbFetchRow('SELECT state_index_id FROM `state_indexes` WHERE `state_name` = ?', array('HP_MemStatus'));

            if (!empty($sensor_entry['sensor_id']) && !empty($state_indexes_entry['state_index_id'])) {
                $insert = array(
                    'sensor_id' => $sensor_entry['sensor_id'],
                    'state_index_id' => $state_indexes_entry['state_index_id'],
                );
                foreach ($insert as $key => $val_check) {
                    if (!isset($val_check)) {
                        unset($insert[$key]);
                    }
                }
                $inserted = dbInsert($insert, 'sensors_to_state_indexes');
            }
        }
    }
}

if ($device['os'] == 'linux' || $device['os'] == 'windows') {
    $oids     = snmp_walk($device, '1.3.6.1.4.1.232.6.2.6', '-Osqn', '');
    $main_oid = '.1.3.6.1.4.1.232.6.2.6.';
    if ($debug) {
        echo $oids."\n";
    }

    $oids = trim($oids);
    if ($oids) {
        echo 'HP_CPUFanStatus ';
        foreach (explode("\n", $oids) as $data) {
            list($oid,)    = explode(' ', $data, 2);
            $state_oid     = '5';
            $state_current = snmp_get($device, $main_oid.$state_oid, '-Oevq');
            discover_sensor($valid['sensor'], 'state', $device, $main_oid.$state_oid, 'HP_CPUFanStatus', 'snmp', 'CPU Fan Status', '1', '1', null, null, null, null, $state_current);

            $sensor_entry = dbFetchRow('SELECT sensor_id FROM `sensors` WHERE `sensor_class` = ? AND `device_id` = ? AND `sensor_type` = ? AND `sensor_index` = ?', array('state', $device['device_id'], 'snmp', 'HP_CPUFanStatus'));
            $state_indexes_entry = dbFetchRow('SELECT state_index_id FROM `state_indexes` WHERE `state_name` = ?', array('HP_CPUFanStatus'));

            if (!empty($sensor_entry['sensor_id']) && !empty($state_indexes_entry['state_index_id'])) {
                $insert = array(
                    'sensor_id' => $sensor_entry['sensor_id'],
                    'state_index_id' => $state_indexes_entry['state_index_id'],
                );
                foreach ($insert as $key => $val_check) {
                    if (!isset($val_check)) {
                        unset($insert[$key]);
                    }
                }
                $inserted = dbInsert($insert, 'sensors_to_state_indexes');
            }
        }
    }
}

if ($device['os'] == 'linux' || $device['os'] == 'windows') {
    $oids     = snmp_walk($device, '1.3.6.1.4.1.232.6.2.6', '-Osqn', '');
    $main_oid = '.1.3.6.1.4.1.232.6.2.6.';
    if ($debug) {
        echo $oids."\n";
    }

    $oids = trim($oids);
    if ($oids) {
        echo 'HP_SysFanStatus ';
        foreach (explode("\n", $oids) as $data) {
            list($oid,)    = explode(' ', $data, 2);
            $state_oid     = '4';
            $state_current = snmp_get($device, $main_oid.$state_oid, '-Oevq');
            discover_sensor($valid['sensor'], 'state', $device, $main_oid.$state_oid, 'HP_SysFanStatus', 'snmp', 'System Fan Status', '1', '1', null, null, null, null, $state_current);

            $sensor_entry = dbFetchRow('SELECT sensor_id FROM `sensors` WHERE `sensor_class` = ? AND `device_id` = ? AND `sensor_type` = ? AND `sensor_index` = ?', array('state', $device['device_id'], 'snmp', 'HP_SysFanStatus'));
            $state_indexes_entry = dbFetchRow('SELECT state_index_id FROM `state_indexes` WHERE `state_name` = ?', array('HP_SysFanStatus'));

            if (!empty($sensor_entry['sensor_id']) && !empty($state_indexes_entry['state_index_id'])) {
                $insert = array(
                    'sensor_id' => $sensor_entry['sensor_id'],
                    'state_index_id' => $state_indexes_entry['state_index_id'],
                );
                foreach ($insert as $key => $val_check) {
                    if (!isset($val_check)) {
                        unset($insert[$key]);
                    }
                }
                $inserted = dbInsert($insert, 'sensors_to_state_indexes');
            }
        }
    }
}

if ($device['os'] == 'linux' || $device['os'] == 'windows') {
    $oids     = snmp_walk($device, '1.3.6.1.4.1.232.3.1.3', '-Osqn', '');
    $main_oid = '.1.3.6.1.4.1.232.3.1.3.';
    if ($debug) {
        echo $oids."\n";
    }

    $oids = trim($oids);
    if ($oids) {
        echo 'HP_RAIDStatus ';
        foreach (explode("\n", $oids) as $data) {
            list($oid,)    = explode(' ', $data, 2);
            $state_oid     = '0';
            $state_current = snmp_get($device, $main_oid.$state_oid, '-Oevq');
            discover_sensor($valid['sensor'], 'state', $device, $main_oid.$state_oid, 'HP_RAIDStatus', 'snmp', 'RAID Overall Status', '1', '1', null, null, null, null, $state_current);


            $sensor_entry = dbFetchRow('SELECT sensor_id FROM `sensors` WHERE `sensor_class` = ? AND `device_id` = ? AND `sensor_type` = ? AND `sensor_index` = ?', array('state', $device['device_id'], 'snmp', 'HP_RAIDStatus'));
            $state_indexes_entry = dbFetchRow('SELECT state_index_id FROM `state_indexes` WHERE `state_name` = ?', array('HP_RAIDStatus'));

            if (!empty($sensor_entry['sensor_id']) && !empty($state_indexes_entry['state_index_id'])) {
                $insert = array(
                    'sensor_id' => $sensor_entry['sensor_id'],
                    'state_index_id' => $state_indexes_entry['state_index_id'],
                );
                foreach ($insert as $key => $val_check) {
                    if (!isset($val_check)) {
                        unset($insert[$key]);
                    }
                }
                $inserted = dbInsert($insert, 'sensors_to_state_indexes');
            }
        }
    }
}

if ($device['os'] == 'linux' || $device['os'] == 'windows') {
    $oids     = snmp_walk($device, '1.3.6.1.4.1.232.3.2.2.2.1.2', '-Osqn', '');
    $main_oid = '.1.3.6.1.4.1.232.3.2.2.2.1.2.';
    if ($debug) {
        echo $oids."\n";
    }

    $oids = trim($oids);
    if ($oids) {
        echo 'HP_RAIDCache ';
        foreach (explode("\n", $oids) as $data) {
            list($oid,)    = explode(' ', $data, 2);
            $state_oid     = '0';
            $state_current = snmp_get($device, $main_oid.$state_oid, '-Oevq');
            discover_sensor($valid['sensor'], 'state', $device, $main_oid.$state_oid, 'HP_RAIDCache', 'snmp', 'RAID Cache Status', '1', '1', null, null, null, null, $state_current);

            $sensor_entry = dbFetchRow('SELECT sensor_id FROM `sensors` WHERE `sensor_class` = ? AND `device_id` = ? AND `sensor_type` = ? AND `sensor_index` = ?', array('state', $device['device_id'], 'snmp', 'HP_RAIDCache'));
            $state_indexes_entry = dbFetchRow('SELECT state_index_id FROM `state_indexes` WHERE `state_name` = ?', array('HP_RAIDCache'));

            if (!empty($sensor_entry['sensor_id']) && !empty($state_indexes_entry['state_index_id'])) {
                $insert = array(
                    'sensor_id' => $sensor_entry['sensor_id'],
                    'state_index_id' => $state_indexes_entry['state_index_id'],
                );
                foreach ($insert as $key => $val_check) {
                    if (!isset($val_check)) {
                        unset($insert[$key]);
                    }
                }
                $inserted = dbInsert($insert, 'sensors_to_state_indexes');
            }
        }
    }
}

if ($device['os'] == 'linux' || $device['os'] == 'windows') {
    $oids     = snmp_walk($device, '1.3.6.1.4.1.232.3.2.2.2.1.6', '-Osqn', '');
    $main_oid = '.1.3.6.1.4.1.232.3.2.2.2.1.6.';
    if ($debug) {
        echo $oids."\n";
    }

    $oids = trim($oids);
    if ($oids) {
        echo 'HP_RAIDBBU ';
        foreach (explode("\n", $oids) as $data) {
            list($oid,)    = explode(' ', $data, 2);
            $state_oid     = '0';
            $state_current = snmp_get($device, $main_oid.$state_oid, '-Oevq');
            discover_sensor($valid['sensor'], 'state', $device, $main_oid.$state_oid, 'HP_RAIDBBU', 'snmp', 'RAID BBU Status', '1', '1', null, null, null, null, $state_current);

            $sensor_entry = dbFetchRow('SELECT sensor_id FROM `sensors` WHERE `sensor_class` = ? AND `device_id` = ? AND `sensor_type` = ? AND `sensor_index` = ?', array('state', $device['device_id'], 'snmp', 'HP_RAIDBBU'));
            $state_indexes_entry = dbFetchRow('SELECT state_index_id FROM `state_indexes` WHERE `state_name` = ?', array('HP_RAIDBBU'));

            if (!empty($sensor_entry['sensor_id']) && !empty($state_indexes_entry['state_index_id'])) {
                $insert = array(
                    'sensor_id' => $sensor_entry['sensor_id'],
                    'state_index_id' => $state_indexes_entry['state_index_id'],
                );
                foreach ($insert as $key => $val_check) {
                    if (!isset($val_check)) {
                        unset($insert[$key]);
                    }
                }
                $inserted = dbInsert($insert, 'sensors_to_state_indexes');
            }
        }
    }
}

if ($device['os'] == 'linux' || $device['os'] == 'windows') {
    $oids     = snmp_walk($device, '1.3.6.1.4.1.232.3.2.3.1.1.11', '-Osqn', '');
    $main_oid = '.1.3.6.1.4.1.232.3.2.3.1.1.11.';
    if ($debug) {
        echo $oids."\n";
    }

    $oids = trim($oids);
    if ($oids) {
        echo 'HP_RAIDLogDrv ';
        foreach (explode("\n", $oids) as $data) {
            list($oid,)    = explode(' ', $data, 2);
            $state_oid = str_replace($main_oid, '', $oid);
            $state_current = snmp_get($device, $main_oid.$state_oid, '-Oevq');
            $name_current = snmp_get($device, '.1.3.6.1.4.1.232.3.2.3.1.1.14.'.$state_oid, '-Oevq');
            discover_sensor($valid['sensor'], 'state', $device, $main_oid.$state_oid, "HP_RAIDLogDrv.$state_oid", 'snmp', "RAID LogDrv $state_oid $name_current Status", '1', '1', null, null, null, null, $state_current);

            $sensor_entry = dbFetchRow('SELECT sensor_id FROM `sensors` WHERE `sensor_class` = ? AND `device_id` = ? AND `sensor_type` = ? AND `sensor_index` = ?', array('state', $device['device_id'], 'snmp', "HP_RAIDLogDrv.$state_oid"));
            $state_indexes_entry = dbFetchRow('SELECT state_index_id FROM `state_indexes` WHERE `state_name` = ?', array('HP_RAIDLogDrv'));

            if (!empty($sensor_entry['sensor_id']) && !empty($state_indexes_entry['state_index_id'])) {
                $insert = array(
                    'sensor_id' => $sensor_entry['sensor_id'],
                    'state_index_id' => $state_indexes_entry['state_index_id'],
                );
                foreach ($insert as $key => $val_check) {
                    if (!isset($val_check)) {
                        unset($insert[$key]);
                    }
                }
                $inserted = dbInsert($insert, 'sensors_to_state_indexes');
            }
        }
    }
}

if ($device['os'] == 'linux' || $device['os'] == 'windows') {
    $oids     = snmp_walk($device, '1.3.6.1.4.1.232.3.2.5.1.1.37', '-Osqn', '');
    $main_oid = '.1.3.6.1.4.1.232.3.2.5.1.1.37.';
    if ($debug) {
        echo $oids."\n";
    }

    $oids = trim($oids);
    if ($oids) {
        echo 'HP_PhysicalDrive ';
        foreach (explode("\n", $oids) as $data) {
            list($oid,)    = explode(' ', $data, 2);
            $state_oid = str_replace($main_oid, '', $oid);
            $state_current = snmp_get($device, $main_oid.$state_oid, '-Oevq');
            $name_current = snmp_get($device, '.1.3.6.1.4.1.232.3.2.5.1.1.3.'.$state_oid, '-Oevq');
            $serial_current = snmp_get($device, '.1.3.6.1.4.1.232.3.2.5.1.1.51.'.$state_oid, '-Oevq');
            discover_sensor($valid['sensor'], 'state', $device, $main_oid.$state_oid, "HP_PhysicalDrive.$state_oid", 'snmp', "Physical Drive $state_oid $name_current $serial_current Status", '1', '1', null, null, null, null, $state_current);

            $sensor_entry = dbFetchRow('SELECT sensor_id FROM `sensors` WHERE `sensor_class` = ? AND `device_id` = ? AND `sensor_type` = ? AND `sensor_index` = ?', array('state', $device['device_id'], 'snmp', "HP_PhysicalDrive.$state_oid"));
            $state_indexes_entry = dbFetchRow('SELECT state_index_id FROM `state_indexes` WHERE `state_name` = ?', array('HP_PhysicalDrive'));

            if (!empty($sensor_entry['sensor_id']) && !empty($state_indexes_entry['state_index_id'])) {
                $insert = array(
                    'sensor_id' => $sensor_entry['sensor_id'],
                    'state_index_id' => $state_indexes_entry['state_index_id'],
                );
                foreach ($insert as $key => $val_check) {
                    if (!isset($val_check)) {
                        unset($insert[$key]);
                    }
                }
                $inserted = dbInsert($insert, 'sensors_to_state_indexes');
            }
        }
    }
}