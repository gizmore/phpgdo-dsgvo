<?php
namespace GDO\DSGVO;

use GDO\Core\GDT_Template;
use GDO\Session\GDO_Session;
use GDO\User\GDO_User;

final class GDT_DSGVOPanel extends GDT_Template
{
	protected function __construct()
	{
	    $this->name = 'dsgvo';
		$this->templateModule = 'DSGVO';
		$this->templatePath = 'dsgvo.php';
	}
	
	public function render()
	{
		if (!GDO_User::current()->isAuthenticated())
		{
			if (!GDO_Session::get('gdo-dsgvo'))
			{
				return parent::render();
			}
		}
		return '';
	}
	
}
