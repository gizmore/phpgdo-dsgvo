<?php
declare(strict_types=1);
namespace GDO\DSGVO\Method;

use GDO\Core\GDT;
use GDO\Core\GDT_Tuple;
use GDO\Core\Method;
use GDO\Net\GDT_Url;
use GDO\Session\GDO_Session;
use GDO\UI\GDT_Success;

/**
 * Accept german DSGVO cookie usage.
 *
 * @version 7.0.3
 * @since 6.9.0
 * @author gizmore
 */
final class Accept extends Method
{

	public function getMethodTitle(): string
	{
		return t('dsgvo');
	}

	public function gdoParameters(): array
	{
		return [
			GDT_Url::make('_ref')->allowAll(),
		];
	}

	public function execute(): GDT
	{
		# Remember
		GDO_Session::set('gdo-dsgvo', 1);

		# Response
		$response = GDT_Tuple::make();
		$response->addField(GDT_Success::make()->text('msg_cookie_accepted'));

		# Redirect back via response
		if ($ref = $this->gdoParameterVar('_ref'))
		{
			$this->redirect($ref);
		}

		# return response
		return $response;
	}

}
