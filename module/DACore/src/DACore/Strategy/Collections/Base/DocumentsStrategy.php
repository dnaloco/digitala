<?php
namespace DACore\Strategy\Collections\Base;

use Doctrine\Common\Collections\ArrayCollection;

trait DocumentsStrategy
{

	public function getDocument($key, $document)
	{
		if (!isset($document['type'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'doc_type');
			return false;
		} else {
			$document['type'] = static::checkType($key, 'DABase\Enum\DocumentType', $document['type']);
			if (!$document['type']) return false;
		}

		if (!isset($document['field1'])) {
			static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'field1');
			return false;
		} else {
			$document['field1'] = static::checkString($key, $document['field1'], 'field1');
			if (!$document['field1']) return false;
		}

		if (isset($document['field2'])) {
			$document['field2'] = static::checkString($key, $document['field2'], 'field2');
			if (!$document['field2']) return false;
		}

		if (isset($document['field3'])) {
			$document['field3'] = static::checkString($key, $document['field3'], 'field3');
			if (!$document['field3']) return false;
		}

		if (isset($document['field4'])) {
			$document['field4'] = static::checkString($key, $document['field4'], 'field4');
			if (!$document['field4']) return false;
		}

		if (isset($document['field5'])) {
			$document['field5'] = static::checkString($key, $document['field5'], 'field5');
			if (!$document['field5']) return false;
		}

		if (static::hasErrors()) return false;

		return new \DABase\Entity\Document($document);
	}

	public function getDocumentsCollection($key, $documents, $entityType, $entity)
	{
		if (!($this instanceof \DACore\Service\AbstractCrudService))
			throw new \Exception('TO USE DocumentsStrategy TRAIT NEED TO BE INSTANCE OF  DACore\Service\AbstractCrudService');

		$myTraits = class_uses($this);

		if (!in_array('DACore\Strategy\Core\DataCheckerStrategy', $myTraits)) {
			throw new \Exception('TO USE DocumentsStrategy TRAIT NEED TO HAVE DACore\Strategy\Core\DataCheckerStrategy');
		}

		$arrDocuments = new ArrayCollection();
		$key = $key . '_documents';

		if (!is_null($entity)) {

			$documentsCollection = $entity->getDocuments();

			foreach($documents as $document) {
				$document[$entityType] = $entity;
				$document = $this->getDocument($key, $document);

				if (!$document) continue;

				if (is_null($document->getId())) {
					$documentsCollection->add($document);
				} else {
					$document = $this->em->merge($document);
				}

				$arrDocuments->add($document);
			}

			foreach($documentsCollection as $document) {

				if (!$arrDocuments->contains($document)) {
					$documentsCollection->removeElement($document);
					$this->em->remove($document);
				}
			}

			return $documentsCollection;

		}

		foreach($documents as $document) {
			$document = $this->getDocument($key, $document);

			if ($document) $arrDocuments->add($document);

		}

		return $arrDocuments;
	}

}