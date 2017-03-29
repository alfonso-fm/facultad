<?php

namespace Drupal\feria;
class EmpresaStorage {
    static function getAll() {
        $result = db_query('SELECT * FROM {EMPRESAS}');
	    return $result;
    }
}