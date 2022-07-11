<?php
namespace GDO\DSGVO\Method;

use GDO\Core\Method;
use GDO\Session\GDO_Session;
use GDO\UI\GDT_Success;
use GDO\Core\Website;
use GDO\Net\GDT_Url;

/**
 * Accept cookie usage.
 * @author gizmore
 * @since 6.09
 * @version 6.09
 */
final class Accept extends Method
{
	public function gdoParameters() : array
	{
		return array(
			GDT_Url::make('ref')->allowLocal(true)->allowExternal(false),
		);
	}
	
	public function execute()
	{
		# Remember
		GDO_Session::set('gdo-dsgvo', 1);
		
		# Response
		$response = GDT_Success::responseWith('msg_cookie_accepted');
		
		# Redirect back via response
		if ($ref = $this->gdoParameterVar('ref'))
		{
			$response->addField(Website::redirect($ref));
		}
		
		# return response
		return $response;
	}

}
