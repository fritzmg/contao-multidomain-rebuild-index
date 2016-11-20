<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2016 Leo Feyer
 *
 * @package   ada
 * @author    Fritz Michael Gschwantner <https://github.com/fritzmg>
 * @license   LGPL-3.0+
 * @copyright Fritz Michael Gschwantner 2016
 */


/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['modifyFrontendPage'][] = array('MultidomainRebuildIndex','setHeaders');


/**
 * Maintenance
 */
$GLOBALS['TL_MAINTENANCE'][] = 'MultidomainRebuildIndex';
