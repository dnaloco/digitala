<?php
namespace DACore\Strategy\Collections;

interface DocumentsInterface
{
	function getDocumentsCollection($key, $documents, $entityType, $entity);
}