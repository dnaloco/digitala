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