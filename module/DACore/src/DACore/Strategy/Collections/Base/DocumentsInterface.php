<?php
namespace DACore\Strategy\Collections\Base;

interface DocumentsInterface
{
	function getDocumentsCollection($key, $documents, $entityType, $entity);
}