<?php

namespace DACore\IEntities\Base;

interface DocumentInterface
{
	function getId();
	function getField1();
	function getField2();
	function getField3();
	function getField4();
	function getField5();
	function getImages();
	function getFiles();
	function getCreatedAt();
	function getUpdatedAt();
}