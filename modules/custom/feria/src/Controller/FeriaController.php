<?php

namespace Drupal\feria\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;
use Drupal\Core\Url;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Drupal\user\Form;
use Drupal\feria\EmpresaStorage;
use Drupal\feria\PageStorage;
use Drupal\feria\EventStorage;

class FeriaController extends ControllerBase {
	public function home() {
		$page_data = PageStorage::getContentByKey("home");
		return array(
			'#theme' => 'home',
			'#title'       => $page_data[0]->header,
			'#description' => $page_data[0]->description,
			'#comments'    => $page_data[0]->comments,
			'#companies'   => EmpresaStorage::getAll(),
			'#links'       => PageStorage::getAll(),
			'#carousel1'   => PageStorage::getCarouselByType(1),
			'#carousel2'   => PageStorage::getCarouselByType(1),
			'#news'        => PageStorage::getCarouselByType(2),
			'#static'      => PageStorage::getStaticContent(),
		);
	}
	public function galleries(){
		return array(
			'#theme' => 'galleries',
			'#title'       => ' ',
			'#description' => null,
			'#comments'    => null,
			'#links'       => PageStorage::getAll(),
			'#static'      => PageStorage::getStaticContent(),
    );
	}
	public function stands(){
		$page_data = PageStorage::getContentByKey("stands");
		return array(
			'#theme' => 'stands',
			'#title'       => $page_data[0]->header,
			'#description' => $page_data[0]->description,
			'#comments'    => $page_data[0]->comments,
			'#links'       => PageStorage::getAll(),
			'#static'      => PageStorage::getStaticContent(),
		);
	}
	public function enterprisesList(){
		$page_data = PageStorage::getContentByKey("companies");
		return array(
			'#theme'       => 'enterprisesList',
			'#title'       => $page_data[0]->header,
			'#description' => $page_data[0]->description,
			'#comments'    => $page_data[0]->comments,
			'#companies'   => EmpresaStorage::getAll(),
			'#links'       => PageStorage::getAll(),
			'#static'      => PageStorage::getStaticContent(),
		);
	}
	public function schedule(){
		$page_data = PageStorage::getContentByKey("schedule");
		return array(
			'#theme' => 'schedule',
			'#title'       => $page_data[0]->header,
			'#description' => $page_data[0]->description,
			'#comments'    => $page_data[0]->comments,
			'#links'       => PageStorage::getAll(),
			'#static'      => PageStorage::getStaticContent(),
			'#events'      => EventStorage::getAll(),
    );
	}
	public function maps(){
		$page_data = PageStorage::getContentByKey("maps");
		return array(
			'#theme' => 'maps',
			'#title'       => $page_data[0]->header,
			'#description' => $page_data[0]->description,
			'#comments'    => $page_data[0]->comments,
			'#links'       => PageStorage::getAll(),
			'#static'      => PageStorage::getStaticContent(),
    	);
	}
}
