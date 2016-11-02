<?php
namespace DACore\Strategy\Collections\Erp\Financial;

use Doctrine\Common\Collections\ArrayCollection;

trait PaymentsStrategy
{

	private function getPayment($key, $payment)
	{
		unset($payment['createdAt']);
		unset($payment['updatedAt']);

		$payment['paymentType'] = 'compra';
		$payment['status'] = 'cadastrado';

		if (isset($payment['invoiceDate'])) {
			$payment['invoiceDate'] = static::checkDate($key, $payment['invoiceDate'], 'invoiceDate');
		}

		if (isset($payment['expirationDate'])) {
			$payment['expirationDate'] = static::checkDate($key, $payment['expirationDate'], 'expirationDate');
		}

		if (static::hasErrors()) return false;

		return new \DAErp\Entity\Financial\Payment($payment);
	}

	public function getPaymentsCollection($key, $payments, $entity)
	{
		if (!($this instanceof \DACore\Service\AbstractCrudService))
			throw new \Exception('TO USE VideosStrategy TRAIT NEED TO BE INSTANCE OF  DACore\Service\AbstractCrudService');

		$myTraits = class_uses($this);

		if (!in_array('DACore\Strategy\Core\DataCheckerStrategy', $myTraits)) {
			throw new \Exception('TO USE VideosStrategy TRAIT NEED TO HAVE DACore\Strategy\Core\DataCheckerStrategy');
		}

		$arrPayements = new ArrayCollection();
		$key = $key . '_payments';

		if (!is_null($entity)) {
			$paymentsCollection = $entity->getPayments();

			foreach($payments as $payment) {
				$payment = $this->getPayment($key, $payment);

				if (!$payment) continue;

				if (is_null($payment->getId())) {
					$paymentsCollection->add($payment);
				} else {
					$payment = $this->em->merge($payment);
				}
				$arrPayements->add($payment);

			}

			foreach($paymentsCollection as $payment) {
				if (!$arrPayements->contains($payment)) {
					$paymentsCollection->removeElement($payment);
					$this->em->remove($payment);
				}
			}

			return $paymentsCollection;

		}

		foreach($payments as $payment) {
			$payment = $this->getPayment($key, $payment);

			if ($payment) $arrPayements->add($payment);
		}

		return $arrPayements;
	}
}