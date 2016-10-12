<?php
namespace DACore\IEntities\Erp\HumanResource\Monitoring;

interface EvaluationRatingInterface
{
	function getId();
	function getAppraiser();
	function getPartner();
	function getRating();
	function getNotes();
	function getCreatedAt();
}