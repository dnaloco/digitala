<?php
namespace DABase\Entity;

interface PersonInterface
{
    function getId();

    function getName();
    function getGender();
    function getBirthdate();

    function getDescription();

    // function getAddresses();

    // function getSocialNetworks();

    // function getContacts();

    function getCreatedAt();

    function getUpdatedAt();
}
