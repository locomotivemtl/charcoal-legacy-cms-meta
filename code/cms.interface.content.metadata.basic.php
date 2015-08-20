<?php

/**
 * File: Basic Metadata Charcoal Interface
 *
 * @copyright 2015 Locomotive
 * @license   LGPL <https://www.gnu.org/licenses/lgpl.html>
 * @link      http://charcoal.locomotive.ca
 * @author    Chauncey McAskill <chauncey@locomotive.ca>
 */

namespace CMS;

/**
 * Interface: Basic Metadata
 *
 * @package CMS\Objects
 */
interface Interface_Content_Metadata_Basic extends Interface_Content_Metadata
{
	/**
	 * Retrieve the object's title.
	 *
	 * With the Basic Metadata, this should appear
	 * in the `<title>` element.
	 *
	 * With the OpenGraph Metadata—as it should appear
	 * in the graph—for the "og:title" meta-property.
	 *
	 * @return string
	 */
	public function meta_title();

	/**
	 * Retrieve the object's description.
	 *
	 * @return string
	 */
	public function meta_description();
}
