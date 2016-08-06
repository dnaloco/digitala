<?php
namespace DABase\Entity;

interface ImageInterface
{
    function getId();
    function getTitle();
    function getName();
    function getPath();

    function hasThumb();
    function hasSmall();
    function hasMedium();
    function hasLarge();
    function hasXLarge();

    function getAlt();
    function getCaption();
    function getWidth();
    function getHeight();
    function getFiletype();
    function getCreatedAt();
}
