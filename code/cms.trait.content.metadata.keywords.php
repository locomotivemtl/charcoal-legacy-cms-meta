<?php

/**
 * File: Keyword Metadata Charcoal Trait
 *
 * @copyright 2015 Locomotive
 * @license   LGPL <https://www.gnu.org/licenses/lgpl.html>
 * @link      http://charcoal.locomotive.ca
 * @author    Chauncey McAskill <chauncey@locomotive.ca>
 */

namespace CMS;

/**
 * Trait: Keyword Metadata
 *
 * @package CMS\Objects
 */

trait Trait_Content_Metadata_Keywords
{
	/**
	 * Object Keyword Metadata
	 *
	 * @var  string|string[]
	 * @see  Property_String (L10N)
	 * @todo McAskill [2015-08-20]: $meta_keywords should be "multiple" enabled.
	 */
	public $meta_keywords;

	/**
	 * Does the object use this trait.
	 *
	 * @return boolean
	 */
	public static function has_keyword_metadata_trait()
	{
		return true;
	}

	/**
	 * Is the object an instance of Interface_Content_Metadata_Keywords?
	 *
	 * @return boolean
	 */
	public static function has_keyword_metadata_interface( \Charcoal_Base $object )
	{
		return ( is_object( $object ) && $object instanceof Interface_Content_Metadata_Keywords );
	}

	/**
	 * {@inheritdoc}
	 */
	public function meta_keywords()
	{
		return $this->p('meta_keywords')->text();
	}
}
