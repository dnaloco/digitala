<?php
namespace DACore\Entity\Base;

interface CompanyInterface
{
	function getId();
	function getType();
	function getTradingName();
	function getCompanyName();
	function getCategory();
	function getWebsite();
	function getTelephones();
	function getDocuments();
	function getEmails();
	function getAddresses();
	function getDescription();
	function getLogo();
	function getGoodTags();
	function getNotes();
	function getCreatedAt();
	function getUpdatedAt();
}