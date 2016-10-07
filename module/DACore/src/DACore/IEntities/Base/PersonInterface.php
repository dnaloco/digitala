<?php
namespace DACore\IEntities\Base;

interface PersonInterface
{
    function getId();
    function getName();
    function getGender();
    function getBirthdate();
    function getDescription();
    function getPhoto();
    function getAddresses();
    function getSocialNetworks();
    function getTelephones();
    function getEmails();
    function getDocuments();
    function getWebsite();
    function getNotes();
    function getCreatedAt();
    function getUpdatedAt();
}
