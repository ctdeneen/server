<?php
/**
 * @package plugins.playReady
 * @subpackage api.objects
 */
class KalturaPlayReadyPlayRight extends KalturaPlayReadyRight
{
    /**
	 * @var int
	 */
	public $analogVideoOPL ;
	
	/**
	 * @var KalturaKeyValueArray
	 */
	public $analogVideoOutputProtectionList ;
	
    /**
	 * @var int
	 */
	public $compressedDigitalAudioOPL ;
	
    /**
	 * @var int
	 */
	public $compressedDigitalVideoOPL ;

	/**
	 * @var KalturaKeyValueArray
	 */
	public $digitalAudioOutputProtectionList; 
	
	/**
	 * @var int
	 */	
	public $uncompressedDigitalAudioOPL;

    /**
	 * @var int
	 */
	public $uncompressedDigitalVideoOPL; 
	
    /**
	 * @var int
	 */
	public $firstPlayExpiration;
	
    /**
	 * @var string
	 */
	public $playEnablers; 
	
	
	private static $map_between_objects = array(
		'analogVideoOPL',
    	'analogVideoOutputProtectionList',
    	'compressedDigitalAudioOPL',
    	'compressedDigitalVideoOPL',
		'digitalAudioOutputProtectionList',
		'uncompressedDigitalAudioOPL',
		'uncompressedDigitalVideoOPL',
		'firstPlayExpiration',
		'playEnablers',
	 );
		 
	public function getMapBetweenObjects()
	{
		return array_merge(parent::getMapBetweenObjects(), self::$map_between_objects);
	}
	
	public function toObject($dbObject = null, $skip = array())
	{
		if (is_null($dbObject))
			$dbObject = new PlayReadyPlayRight();
			
		parent::toObject($dbObject, $skip);
					
		return $dbObject;
	}
}


