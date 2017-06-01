<?php

namespace VeryBuy\Payment\Spgateway\Store;

use VeryBuy\Payment\Spgateway\Core\AbstractRequest;
use VeryBuy\Payment\Spgateway\Core\Support\RequestContract;
use InvalidArgumentException;

class StoreRequest extends AbstractRequest
{
	public function validate()
	{
		return $this->validAmount();
	}

	protected function validAmount()
	{
		$amount = $this->getArguments()['Amt'];

		if ($amount < 30 or $amount > 20000) {
			throw new InvalidArgumentException('Cvs amount access range is from 30 to 20000.');
		}

		return $this;
	}

	/**
	 * @return array
	 */
	public function toArray()
	{
		return array_merge($this->getArguments(), [
			'CVS' => RequestContract::CVS_ENABLE
		]);
	}
}
