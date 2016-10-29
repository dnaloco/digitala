<?php
namespace DACore\IEntities\Base;

interface CompanyInterface
{
	function getId();
	function getReference();
	function getTypes();
	function addType(\DACore\IEntities\Base\CompanyTypeInterface $type);
	function removeType(\DACore\IEntities\Base\CompanyTypeInterface $type);
	function getTradingName();
	function getCompanyName();
	function getCategory();
	function getWebsite();
	function getTelephones();
	function getDocuments();
	function getEmails();
	function getSocialNetworks();
	function getContacts();
	function getAddresses();
	function getDescription();
	function getLogo();
	function getGoodTags();
	function getNotes();
	function getUser();
	function getCreatedAt();
	function getUpdatedAt();
}