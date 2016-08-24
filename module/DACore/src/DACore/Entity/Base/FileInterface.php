<?php
namespace DACore\Entity\Base;

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

    function getCreatedAt();
}
