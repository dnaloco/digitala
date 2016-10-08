<?php
namespace DACore\IEntities\Base;

interface FileInterface
{
    function getId();
    function getTitle();
    function getAuthor();
    function getLicence();
    function getDescription();
    function getName();
    function getPath();
    function getFiletype();
}
