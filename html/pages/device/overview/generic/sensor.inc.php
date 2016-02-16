<?php

$sensors = dbFetchRows('SELECT * FROM `sensors` LEFT JOIN sensors_to_state_indexes ON sensors_to_state_indexes.sensor_id = sensors.sensor_id LEFT JOIN state_indexes ON state_indexes.state_index_id = sensors_to_state_indexes.state_index_id WHERE `sensor_class` = ? AND device_id = ? ORDER BY `poller_type`, `sensor_index` ', array($sensor_class, $device['device_id']));

if (count($sensors)) {
    echo '<div class="container-fluid ">
        <div class="row">
        <div class="col-md-12">
        <div class="panel panel-default panel-condensed">
        <div class="panel-heading">';
    echo '<a href="device/device='.$device['device_id'].'/tab=health/metric='.strtolower($sensor_type).'/"><img src="images/icons/'.strtolower($sensor_type).'.png"><strong> '.$sensor_type.'</strong></a>';
    echo '      </div>
        <table class="table table-hover table-condensed table-striped">';
    foreach ($sensors as $sensor) {
        $state_translation = array();
        if (!empty($sensor['state_index_id'])) {
            $state_translation = dbFetchRows('SELECT * FROM `state_translations` WHERE `state_index_id` = ? AND `state_value` = ? ', array($sensor['state_index_id'], $sensor['sensor_current']));
var_dump($state_translation);
        }

        if (!isset($sensor['sensor_current'])) {
            $sensor['sensor_current'] = 'NaN';
        }

        // FIXME - make this "four graphs in popup" a function/include and "small graph" a function.
        // FIXME - So now we need to clean this up and move it into a function. Isn't it just "print-graphrow"?
        // FIXME - DUPLICATED IN health/sensors
        $graph_colour = str_replace('#', '', $row_colour);

        $graph_array           = array();
        $graph_array['height'] = '100';
        $graph_array['width']  = '210';
        $graph_array['to']     = $config['time']['now'];
        $graph_array['id']     = $sensor['sensor_id'];
        $graph_array['type']   = $graph_type;
        $graph_array['from']   = $config['time']['day'];
        $graph_array['legend'] = 'no';

        $link_array         = $graph_array;
        $link_array['page'] = 'graphs';
        unset($link_array['height'], $link_array['width'], $link_array['legend']);
        $link = generate_url($link_array);

        $overlib_content = '<div style="width: 580px;"><h2>'.$device['hostname'].' - '.$sensor['sensor_descr'].'</h1>';
        foreach (array('day', 'week', 'month', 'year') as $period) {
            $graph_array['from']  = $config['time'][$period];
            $overlib_content .= str_replace('"', "\'", generate_graph_tag($graph_array));
        }

        $overlib_content .= '</div>';

        $graph_array['width']  = 80;
        $graph_array['height'] = 20;
        $graph_array['bg']     = 'ffffff00';
        // the 00 at the end makes the area transparent.
        $graph_array['from'] = $config['time']['day'];
        $sensor_minigraph =  generate_lazy_graph_tag($graph_array);

        $sensor['sensor_descr'] = truncate($sensor['sensor_descr'], 48, '');

        if (!empty($state_translation['state_descr'])) {
            $state_style="";
            $state_pre="";
            switch ($state_translation['state_generic_value']) {
                case 0: // OK
                    $state_style="";
                    $state_pre="OK";
                    break;
                case 1: // Warning
                    $state_style="style='color: orange'";
                    $state_pre="WARNING";
                    break;
                case 2: // Critical
                    $state_style="style='color: red'";
                    $state_pre="CRITICAL";
                    break;
                case 3: // Unknown
                default:
                    $state_style="style='color: orange'";
                    $state_pre="UNKNOWN";
                    break;
            }
                        }
            echo '<tr>
                <td><strong>'.overlib_link($link, shorten_interface_type($sensor['sensor_descr']), $overlib_content).'</strong></td>
                <td>'.overlib_link($link, $sensor_minigraph, $overlib_content).'</td>
                <td>'.overlib_link($link, '<span '.$state_style.'>'.$state_translation['state_descr'].'</span>', $overlib_content).'</td>
                </tr>';
        }
        else {
            echo '<tr>
                <td>'.overlib_link($link, shorten_interface_type($sensor['sensor_descr']), $overlib_content).'</td>
                <td>'.overlib_link($link, $sensor_minigraph, $overlib_content).'</td>
                <td>'.overlib_link($link, '<span '.($sensor['sensor_current'] < $sensor['sensor_limit_low'] || $sensor['sensor_current'] > $sensor['sensor_limit'] ? "style='color: red'" : '').'>'.$sensor['sensor_current'].$sensor_unit.'</span>', $overlib_content).'</td>
                </tr>';
        }
    }//end foreach

    echo '</table>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}//end if
