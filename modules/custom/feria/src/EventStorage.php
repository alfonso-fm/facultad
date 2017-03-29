<?php

namespace Drupal\feria;
class EventStorage {
    static function getAll() {
        $result = db_query('SELECT EVT.*
                                 , DATE_ADD(date, INTERVAL duration HOUR) final
                                 , uri
                              FROM {EVENTS} EVT
                        LEFT JOIN file_managed FIL ON EVT.imageurl__target_id = FIL.fid;');
        return $result;
    }
}