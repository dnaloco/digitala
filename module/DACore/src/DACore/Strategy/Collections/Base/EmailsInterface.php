<?php
namespace DACore\Strategy\Collections\Base;

interface EmailsInterface
{
	function getEmailsCollection($key, $emails, $entity);
}