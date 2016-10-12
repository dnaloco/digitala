<?php
namespace DACore\IEntities\Erp\HumanResource\Monitoring;

interface TimePunchClockInterfarce
{
	function getId();
	function getCheckIn();
	function getCheckOut();
	function getReason();
	function getPartner();
}