<?php
namespace GDO\DSGVO\Method;

use GDO\Core\Method;
use GDO\Session\GDO_Session;
use GDO\UI\GDT_Success;
use GDO\Net\GDT_Url;
use GDO\Core\GDT_Tuple;

/**
 * Accept german DSGVO cookie usage.
 * 
 * @author gizmore
 * @version 7.0.1
 * @since 6.9.0
 */
final class Accept extends Method
{
	public function getMethodTitle() : string
	{
		return t('dsgvo');
	}
	
	public function gdoParameters() : array
	{
		return [
			GDT_Url::make('ref')->allowAll(true),
		];
	}
	
	public function execute()
	{
		# Remember
		GDO_Session::set('gdo-dsgvo', 1);
		
		# Response
		$response = GDT_Tuple::make();
		$response->addField(GDT_Success::make()->text('msg_cookie_accepted'));
		
		# Redirect back via response
		if ($ref = $this->gdoParameterVar('ref'))
		{
			$response->addField($this->redirect($ref));
		}
		
		# return response
		return $response;
	}

}
