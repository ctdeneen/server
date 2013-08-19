<?php
/**
 * @package plugins.playReady
 * @subpackage api.objects
 */
class KalturaPlayReadyLicenseDetails extends KalturaObject 
{
	/**
	 * PlayReady policy object
	 * 
	 * @var KalturaPlayReadyPolicy
	 */
	public $policy;
	
	/**
	 * License begin date
	 * 
	 * @var string
	 */
	public $beginDate;
	
	/**
	 * License expiration date
	 * 
	 * @var string
	 */
	public $expirationDate;
	
	/**
	 * License removal date
	 * 
	 * @var string
	 */
	public $removalDate;
	
	/*
	 * mapping between the field on this object (on the left) and the setter/getter on the entry object (on the right)  
	 */
	private static $map_between_objects = array(
		'policy',
		'beginDate',
		'expirationDate',
		'removalDate',
	 );
		 
	public function getMapBetweenObjects()
	{
		return array_merge(parent::getMapBetweenObjects(), self::$map_between_objects);
	}
}