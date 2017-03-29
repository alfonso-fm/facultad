<?php

namespace Drupal\feria\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

class DataController extends ControllerBase {
    public function get_pageinfo( Request $request ) {
        $response['data'] = 'Some test data to return';
        $response['method'] = 'GET';
        return new JsonResponse( $response );
    }

    public function put_pageinfo( Request $request ) {
        $response['data'] = 'Some test data to return';
        $response['method'] = 'PUT';
        return new JsonResponse( $response );
    }

    public function post_pageinfo( Request $request ) {
        if ( 0 === strpos( $request->headers->get( 'Content-Type' ), 'application/json' ) ) {
            $data = json_decode( $request->getContent(), TRUE );
            $request->request->replace( is_array( $data ) ? $data : [] );
        }
        $response['data'] = 'Some test data to return';
        $response['method'] = 'POST';
        return new JsonResponse( $response );
    }

    public function delete_pageinfo( Request $request ) {
        $response['data'] = 'Some test data to return';
        $response['method'] = 'DELETE';
        return new JsonResponse( $response );
    }
}