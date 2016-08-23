<?php
namespace DACore\Entity\Base;

interface ImageInterface
{
    function getId();
    function getTitle();
    function getAuthor();
    function getLicence();
    function getDescription();
    function getName();
    function getPath();

    function hasThumb();
    function hasSmall();
    function hasMedium();
    function hasLarge();
    function hasXLarge();

    function getAlt();

    function getWidth();
    function getHeight();

    function getFiletype();

    function getCreatedAt();
}
