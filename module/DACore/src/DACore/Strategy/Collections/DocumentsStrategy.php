<?php
namespace DACore\Strategy\Collections;

use Doctrine\Common\Collections\ArrayCollection;

trait DocumentsStrategy
{
	public function getDocumentsCollection($key, $documents)
	{
		$arrDocuments = new ArrayCollection();
		$key = $key . '_documents';

		foreach($documents as $document) {
			if (!isset($document['type'])) {
				static::addDataError($key, static::ERROR_REQUIRED_FIELD, 'type');
				return false;
			} else {
				$document['type'] = static::checkType($key, 'DACore\Enum\DocumentType', $document['type']);
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

			$arrDocuments->add(new \DABase\Entity\Document($document));
		}

		return $arrDocuments;
	}

}