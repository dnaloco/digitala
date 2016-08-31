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

    function getHasThumb();
    function getHasSmall();
    function getHasMedium();
    function getHasLarge();
    function getHasXLarge();

    function getAlt();

    function getWidth();
    function getHeight();

    function getFiletype();

    function getCreatedAt();
}
