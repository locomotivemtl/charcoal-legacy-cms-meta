<?php

/**
 * File: Authorship Metadata Charcoal Trait
 *
 * @copyright 2015 Locomotive
 * @license   LGPL <https://www.gnu.org/licenses/lgpl.html>
 * @link      http://charcoal.locomotive.ca
 * @author    Chauncey McAskill <chauncey@locomotive.ca>
 */

namespace CMS;

/**
 * Trait: Authorship Metadata
 *
 * @package CMS\Objects
 */

trait Trait_Content_Metadata_Author
{
	/**
	 * Author Name Metadata
	 *
	 * @var  string
	 * @see  Property_String (L10N)
	 */
	public $meta_author_name;

	/**
	 * Author URL Metadata
	 *
	 * @var  string
	 * @see  Property_URL (L10N)
	 */
	public $meta_author_url;

	/**
	 * Does the object use this trait.
	 *
	 * @return boolean
	 */
	public static function has_author_metadata_trait()
	{
		return true;
	}

	/**
	 * Is the object an instance of Interface_Content_Metadata_Author?
	 *
	 * @return boolean
	 */
	public static function has_author_metadata_interface( \Charcoal_Base $object )
	{
		return ( is_object( $object ) && $object instanceof Interface_Content_Metadata_Author );
	}

	/**
	 * {@inheritdoc}
	 */
	public function meta_author_name()
	{
		return $this->p('meta_author_name')->text();
	}

	/**
	 * {@inheritdoc}
	 */
	public function meta_author_url()
	{
		return $this->p('meta_author_url')->text();
	}
}
