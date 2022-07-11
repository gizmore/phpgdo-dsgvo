<?php
namespace GDO\DSGVO;

use GDO\Core\GDO_Module;
use GDO\User\GDO_User;
use GDO\Session\GDO_Session;
use GDO\UI\GDT_Page;

/**
 * This module adds a popup about cookie usage until understood
 * @author gizmore
 *
 */
final class Module_DSGVO extends GDO_Module
{
	public function onLoadLanguage() : void { $this->loadLanguage('lang/dsgvo'); }
	
	public function onIncludeScripts() : void
	{
		$this->addCSS('css/gdo-dsgvo.css');
	}
	
	public function onInitSidebar() : void
	{
	    if (!GDO_Session::get('gdo-dsgvo'))
	    {
	        GDT_Page::$INSTANCE->bottomNav->addField(GDT_DSGVOPanel::make());
	    }
	}
	
	#############
	### Hooks ###
	#############
	public function hookUserLoggedOut(GDO_User $user)
	{
		GDO_Session::set('gdo-dsgvo', 1); # prevent cookie again
	}
	
}
