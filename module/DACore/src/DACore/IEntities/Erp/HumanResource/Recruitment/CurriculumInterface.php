<?php
namespace DACore\IEntities\Erp\HumanResource\Recruitment;

interface CurriculumInterface
{
	function getId();
	function getPerson();
	function getFile();
	function getImage();
	function getCreatedAt();
	function getUpdatedAt();
}