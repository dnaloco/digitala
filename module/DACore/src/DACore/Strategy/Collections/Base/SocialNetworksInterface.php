<?php
namespace DACore\Strategy\Collections\Base;

interface SocialNetworksInterface
{
	function getSocialNetworksCollection($key, $socialNetworks, $entity);
}