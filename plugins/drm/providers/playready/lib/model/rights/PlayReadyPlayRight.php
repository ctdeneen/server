<?php
/**
* @package plugins.drm
* @subpackage model
*/
class PlayReadyPlayRight extends PlayReadyRight
{
	/**
	 * @var int
	 */
	private $analogVideoOPL ;
	
	/**
	 * @var array
	 */
	private $analogVideoOutputProtectionList ;
	
    /**
	 * @var int
	 */
	private $compressedDigitalAudioOPL ;
	
    /**
	 * @var int
	 */
	private $compressedDigitalVideoOPL ;

	/**
	 * @var array
	 */
	private $digitalAudioOutputProtectionList; 
	
	/**
	 * @var int
	 */	
	private $uncompressedDigitalAudioOPL;

    /**
	 * @var int
	 */
	private $uncompressedDigitalVideoOPL; 
	
    /**
	 * @var int
	 */
	private $firstPlayExpiration;
	
    /**
	 * @var int
	 */
	private $playEnablers;
	
	/**
	 * @return the $analogVideoOPL
	 */
	public function getAnalogVideoOPL() {
		return $this->analogVideoOPL;
	}

	/**
	 * @return the $analogVideoOutputProtectionList
	 */
	public function getAnalogVideoOutputProtectionList() {
		return $this->analogVideoOutputProtectionList;
	}

	/**
	 * @return the $compressedDigitalAudioOPL
	 */
	public function getCompressedDigitalAudioOPL() {
		return $this->compressedDigitalAudioOPL;
	}

	/**
	 * @return the $compressedDigitalVideoOPL
	 */
	public function getCompressedDigitalVideoOPL() {
		return $this->compressedDigitalVideoOPL;
	}

	/**
	 * @return the $digitalAudioOutputProtectionList
	 */
	public function getDigitalAudioOutputProtectionList() {
		return $this->digitalAudioOutputProtectionList;
	}

	/**
	 * @return the $uncompressedDigitalAudioOPL
	 */
	public function getUncompressedDigitalAudioOPL() {
		return $this->uncompressedDigitalAudioOPL;
	}

	/**
	 * @return the $uncompressedDigitalVideoOPL
	 */
	public function getUncompressedDigitalVideoOPL() {
		return $this->uncompressedDigitalVideoOPL;
	}

	/**
	 * @return the $firstPlayExpiration
	 */
	public function getFirstPlayExpiration() {
		return $this->firstPlayExpiration;
	}

	/**
	 * @return the $playEnablers
	 */
	public function getPlayEnablers() {
		return $this->playEnablers;
	}

	/**
	 * @param int $analogVideoOPL
	 */
	public function setAnalogVideoOPL($analogVideoOPL) {
		$this->analogVideoOPL = $analogVideoOPL;
	}

	/**
	 * @param array $analogVideoOutputProtectionList
	 */
	public function setAnalogVideoOutputProtectionList($analogVideoOutputProtectionList) {
		$this->analogVideoOutputProtectionList = $analogVideoOutputProtectionList;
	}

	/**
	 * @param int $compressedDigitalAudioOPL
	 */
	public function setCompressedDigitalAudioOPL($compressedDigitalAudioOPL) {
		$this->compressedDigitalAudioOPL = $compressedDigitalAudioOPL;
	}

	/**
	 * @param int $compressedDigitalVideoOPL
	 */
	public function setCompressedDigitalVideoOPL($compressedDigitalVideoOPL) {
		$this->compressedDigitalVideoOPL = $compressedDigitalVideoOPL;
	}

	/**
	 * @param array $digitalAudioOutputProtectionList
	 */
	public function setDigitalAudioOutputProtectionList($digitalAudioOutputProtectionList) {
		$this->digitalAudioOutputProtectionList = $digitalAudioOutputProtectionList;
	}

	/**
	 * @param int $uncompressedDigitalAudioOPL
	 */
	public function setUncompressedDigitalAudioOPL($uncompressedDigitalAudioOPL) {
		$this->uncompressedDigitalAudioOPL = $uncompressedDigitalAudioOPL;
	}

	/**
	 * @param int $uncompressedDigitalVideoOPL
	 */
	public function setUncompressedDigitalVideoOPL($uncompressedDigitalVideoOPL) {
		$this->uncompressedDigitalVideoOPL = $uncompressedDigitalVideoOPL;
	}

	/**
	 * @param int $firstPlayExpiration
	 */
	public function setFirstPlayExpiration($firstPlayExpiration) {
		$this->firstPlayExpiration = $firstPlayExpiration;
	}

	/**
	 * @param int $playEnablers
	 */
	public function setPlayEnablers($playEnablers) {
		$this->playEnablers = $playEnablers;
	}
}