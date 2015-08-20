<?php

/**
 * File: Authorship Metadata Charcoal Interface
 *
 * @copyright 2015 Locomotive
 * @license   LGPL <https://www.gnu.org/licenses/lgpl.html>
 * @link      http://charcoal.locomotive.ca
 * @author    Chauncey McAskill <chauncey@locomotive.ca>
 */

namespace CMS;

/**
 * Interface: Authorship Metadata
 *
 * @package CMS\Objects
 */
interface Interface_Content_Metadata_Author extends Interface_Content_Metadata
{
	/**
	 * Retrieve object's author's name.
	 *
	 * @return string
	 */
	public function meta_author_name();

	/**
	 * Retrieve object's author's URL.
	 *
	 * @return string
	 */
	public function meta_author_url();
}
