<?php
namespace DACore\Entity\Base;

interface PersonInterface
{
    function getId();

    // Get general person info
    function getName();
    function getGender();
    function getBirthdate();

    // Let person tell about him/her
    function getDescription();

    function getPhoto();

    // A collection of address that belong to that person
    function getAddresses();

    // A collection of social networks that belong to that person
    function getSocialNetworks();

    // A collection of telephones that belong to that person
    function getTelephones();

    // A collection of emails that belong to that person
    function getEmails();

    // A collection of physical documents that belong to that person
    function getDocuments();

    function getWebsite();

    function getNotes();


    // when the user was created
    function getCreatedAt();

    // when the user was updated
    function getUpdatedAt();
}
