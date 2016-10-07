<?php
namespace DACore\Strategy\Collections;

interface SocialNetworksInterface
{
	function getSocialNetworksCollection($key, $socialNetworks, $entity);
}