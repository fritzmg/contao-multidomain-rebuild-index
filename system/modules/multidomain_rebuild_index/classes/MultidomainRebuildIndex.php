<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @package   multidomain_rebuild_index
 * @author    Fritz Michael Gschwantner <https://github.com/fritzmg>
 * @license   LGPL-3.0+
 * @copyright Fritz Michael Gschwantner 2016
 */


class MultidomainRebuildIndex implements \executable
{
	/**
	 * Sets the allowOrigin config to the current domain.
	 *
	 * @return string
	 */
	public function run()
	{
		\Config::persist('allowOrigin', \Environment::get('url') );
		return '';
	}

	/**
	 * This class has no detail.
	 *
	 * @return boolean
	 */
	public function isActive()
	{
		return false;
	}

	/**
	 * Sets the Access-Control-Allow-Headers and Access-Control-Allow-Origin
	 * headers in the fron end.
	 *
	 * @param string $strBuffer
	 * @param string $strTemplate
	 *
	 * @return string
	 */
	public function setHeaders( $strBuffer, $strTemplate )
	{
		if( \Config::get('allowOrigin') )
		{
			header('Access-Control-Allow-Headers: X-Requested-With');
			header('Access-Control-Allow-Origin: ' . \Config::get('allowOrigin') );
		}
		return $strBuffer;
	}
}
