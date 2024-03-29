<?php
namespace GDO\DSGVO;

use GDO\Core\GDT;
use GDO\Core\GDT_Template;
use GDO\Session\GDO_Session;
use GDO\User\GDO_User;

/**
 * Render DSGVO information panel.
 *
 * @version 7.0.1
 * @since 6.7.0
 * @author gizmore
 */
final class GDT_DSGVOPanel extends GDT_Template
{

	protected function __construct()
	{
		parent::__construct();
		$this->name = 'dsgvo';
		$this->templateModule = 'DSGVO';
		$this->templatePath = 'dsgvo.php';
	}

	public function render(): array|string|null
	{
		if (!GDO_User::current()->isAuthenticated())
		{
			if (!GDO_Session::get('gdo-dsgvo'))
			{
				return parent::render();
			}
		}
		return GDT::EMPTY_STRING;
	}

}
