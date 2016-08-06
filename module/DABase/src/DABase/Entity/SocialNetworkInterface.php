<?php
namespace DABase\Entity;

interface SocialNetworkInterface
{
    function getId();
    function getSocialType();
    function getAddress();
    function createdAt();
}
