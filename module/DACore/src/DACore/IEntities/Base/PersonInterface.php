<?php
namespace DACore\IEntities\Base;

interface PersonInterface
{
    function getId();
    function getReference();
    function getCompany();
    function getName();
    function getGender();
    function getBirthdate();
    function getDescription();
    function getPhoto();
    function getAddresses();
    function getTelephones();
    function getEmails();
    function getSocialNetworks();
    function getDocuments();
    function getWebsite();
    function getLiteracy();
    function getPost();
    function getNotes();
    function getUser();
    function getCreatedAt();
    function getUpdatedAt();
}
