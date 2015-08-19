<?php

/**
 * File: Basic Metadata Charcoal Interface
 *
 * @copyright   2015 Locomotive
 * @license     LGPL <https://www.gnu.org/licenses/lgpl.html>
 * @link        http://charcoal.locomotive.ca
 *
 * @author      Mathieu Ducharme <mat@locomotive.ca>
 * @author      Chauncey McAskill <chauncey@locomotive.ca>
 *
 * @since       Version 2014-09-28
 */

namespace CMS;

/**
 * Interface: Basic Metadata
 *
 * @package CMS\Objects
 */

interface Interface_Content_Metadata_Basic
{
	/**
	 * Generate the HTML meta tags from a Mustache template,
	 * to put in the `<head>`.
	 *
	 * @return string
	 */
	public function as_html_meta_tags();

	/**
	 * Retrieve the document's title,
	 * for the `<title>` element.
	 *
	 * @return string Property_String
	 */

	public function document_title();

	/**
	 * Retrieve the document's description.
	 *
	 * @return string Property_String
	 */

	public function meta_description();

	/**
	 * Retrieve the document's keywords.
	 *
	 * @return string Property_String
	 */

	public function meta_keywords();
}
