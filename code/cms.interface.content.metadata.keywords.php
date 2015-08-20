<?php

/**
 * File: Keyword Metadata Charcoal Interface
 *
 * @copyright 2015 Locomotive
 * @license   LGPL <https://www.gnu.org/licenses/lgpl.html>
 * @link      http://charcoal.locomotive.ca
 * @author    Chauncey McAskill <chauncey@locomotive.ca>
 */

namespace CMS;

/**
 * Interface: Keyword Metadata
 *
 * @package CMS\Objects
 */
interface Interface_Content_Metadata_Keywords extends Interface_Content_Metadata
{
	/**
	 * Retrieve the object's keywords.
	 *
	 * @return string|string[]
	 */
	public function meta_keywords();
}
