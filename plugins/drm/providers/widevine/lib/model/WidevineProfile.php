<?php

/**
* @package plugins.widevine
* @subpackage model
*/
class WidevineProfile extends DrmProfile
{	
	// ------------------------------------------
	// -- Custom data columns -------------------
	// ------------------------------------------
	
	const CUSTOM_DATA_WIDEVINE_KEY = 'widevine_key';
	const CUSTOM_DATA_WIDEVINE_IV = 'widevine_iv';
	const CUSTOM_DATA_WIDEVINE_OWNER = 'widevine_owner';
	const CUSTOM_DATA_WIDEVINE_PORTAL = 'widevine_portal';
	
	/**
	 * @return string
	 */
	public function getKey()
	{
		return $this->getFromCustomData(self::CUSTOM_DATA_WIDEVINE_KEY);
	}
	
	public function setKey($key)
	{
		$this->putInCustomData(self::CUSTOM_DATA_WIDEVINE_KEY, $key);
	}
	
	/**
	 * @return string
	 */
	public function getIv()
	{
		return $this->getFromCustomData(self::CUSTOM_DATA_WIDEVINE_IV);
	}
	
	public function setIv($iv)
	{
		$this->putInCustomData(self::CUSTOM_DATA_WIDEVINE_IV, $iv);
	}
	
	/**
	 * @return string
	 */
	public function getOwner()
	{
		$owner = $this->getFromCustomData(self::CUSTOM_DATA_WIDEVINE_OWNER);
		if(!$owner)
			return WidevinePlugin::getWidevineConfigParam('portal');
		return $owner;
	}
	
	public function setOwner($owner)
	{
		$this->putInCustomData(self::CUSTOM_DATA_WIDEVINE_OWNER, $owner);
	}
	
	/**
	 * @return string
	 */
	public function getPortal()
	{
		return $this->getFromCustomData(self::CUSTOM_DATA_WIDEVINE_PORTAL);
	}
	
	public function setPortal($portal)
	{
		$this->putInCustomData(self::CUSTOM_DATA_WIDEVINE_PORTAL, $portal);
	}
	
	public function getLicenseServerUrl()
	{
		if(!parent::getLicenseServerUrl())
		{
			return WidevinePlugin::getWidevineConfigParam('license_server_url');
		}
		return parent::getLicenseServerUrl();
	}
	
	public function getDefaultPolicy()
	{
		if(!parent::getDefaultPolicy())
		{
			return WidevinePlugin::DEFAULT_POLICY;
		}
		return parent::getDefaultPolicy();
	}
	

}
