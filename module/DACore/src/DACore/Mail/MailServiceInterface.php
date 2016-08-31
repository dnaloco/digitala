<?php
namespace DACore\Mail;

interface MailServiceInterface
{
	function setPage($page);
	function setSubject($subject);
	function setTo($to);
	function setData($data);
	function renderView($page, array $data = array());
	function prepare();
	function send();
}