<?php
/**
 * @package plugins.drm
 * @subpackage api.objects
 */
class KalturaPlayReadyPolicy extends KalturaDrmPolicy
{
    /**
	 * @var int
	 */
	public $gracePeriod;	
	
	/**
	 * @var KalturaPlayReadyLicenseRemovalPolicy
	 */
	public $licenseRemovalPolicy;	
	
	/**
	 * @var int
	 */
	public $licenseRemovalDuration;	
	
	/**
	 * @var int
	 */
	public $minSecurityLevel;	
	
	/**
	 * @var KalturaPlayReadyRightArray
	 */
	public $rights;	
	
	
	private static $map_between_objects = array(
		'gracePeriod',
		'licenseRemovalPolicy',
		'licenseRemovalDuration',
		'minSecurityLevel',
		'rights',
	 );
		 
	public function getMapBetweenObjects()
	{
		return array_merge(parent::getMapBetweenObjects(), self::$map_between_objects);
	}
	
	public function toObject($dbObject = null, $skip = array())
	{
		if (is_null($dbObject))
			$dbObject = new PlayReadyPolicy();
			
		parent::toObject($dbObject, $skip);
					
		return $dbObject;
	}
	
}

