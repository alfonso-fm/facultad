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

class FeriaAdminController extends ControllerBase {
	public function home() {
		return array(
			'#theme' => 'admin',
			'#pagesId' => PageStorage::getPagesIds(),
		);
	}
}