<?php
namespace DACore\IEntities\Erp\HumanResource\Recruitment;

interface CandidateInterface
{
	function getId();
	function getPerson();
	function getCurriculum();
	function getRecruitmentStep();
	function getCreatedAt();
	function getUpdatedAt();
}