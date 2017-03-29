<?php

namespace Drupal\feria;
class PageStorage {
    static function getAll() {
        $result = db_query('SELECT * FROM {LINKS}');
	    return $result;
    }

    static function getCarouselByType($type) {
        $result = db_query('SELECT CAR.*, uri 
                              FROM CAROUSEL CAR
                         LEFT JOIN file_managed FIL ON CAR.imageurl__target_id = FIL.fid;');
	    return $result;
    }

    static function getContentByKey($key) {
        $result = db_query_range(
        'SELECT n.header, n.description, n.comments 
           FROM {pageinfo} n 
          WHERE n.pagename = :pagename', 0, 2, array(':pagename' => $key))->fetchAll();
        return $result;
    }

    static function getPagesIds() {
        $result = db_query(
        'SELECT n.id, n.pagename FROM {pageinfo} n');
        return $result;
    }

    static function getStaticContent(){
        $result = db_query(
            "SELECT KeyName, FieldValue 
               FROM {STATICCONTENT} n 
              WHERE KeyName IN ('who','office')"
            )->fetchAllKeyed(0,1);    
        return $result;
    }
}