<?php
namespace DACore\Strategy\Collections;

interface EmailsInterface
{
	function getEmailsCollection($key, $emails, $repoEmail);
}