<?php

namespace Drupal\bolsa\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;
use Drupal\Core\Url;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Drupal\user\Form;

class BolsaController extends ControllerBase {
	public function enterpriseprofile(){
		return array(
			'#theme' => 'enterpriseprofile',
			'#title'       => 'Bolsa de Trabajo de la Facultad de Ingeniería',
			'#description' => 'Perfil de la Empresa',
			'#comments'    => 'Datos Generales de la Empresa',
			'#rows'        => null,
    	);
	}
	public function find(){
		return array(
			'#theme' => 'find',
			'#title'       => 'Bolsa de Trabajo de la Facultad de Ingeniería',
			'#description' => 'Busqueda',
			'#comments'    => 'Realiza búsqueda en la Bolsa',
			'#rows'        => null,
    	);
	}
	public function sitemap(){
		return array(
			'#theme' => 'sitemap',
			'#title'       => 'Bolsa de Trabajo de la Facultad de Ingeniería',
			'#description' => 'Mapa del Sitio',
			'#comments'    => 'Información del Portal',
			'#rows'        => null,
    	);
	}
	public function login(){
		return array(
			'#theme' => 'login',
			'#title'       => 'Bolsa de Trabajo de la Facultad de Ingeniería',
			'#description' => 'Unete a Nuestra Bolsa de Trabajo',
			'#comments'    => 'Si no tienes cuenta, agrega tu perfil',
			'#rows'        => null,
    	);
	}
	public function profile(){
		return array(
			'#theme' => 'profile',
			'#title'       => 'Bolsa de Trabajo de la Facultad de Ingeniería',
			'#description' => 'Perfil del Postulante',
			'#comments'    => 'Datos Generales del Postulante',
			'#rows'        => null,
    	);
	}
	public function portada(){
		return array(
			'#theme' => 'portada',
			'#title'       => 'Bolsa de Trabajo de la Facultad de Ingeniería',
			'#description' => 'Portada',
			'#comments'    => 'Nuevas Ofertas',
			'#rows'        => null,
    	);
	}
}