<?php

/**
 * File: Basic Metadata Charcoal Trait
 *
 * @copyright 2015 Locomotive
 * @license   LGPL <https://www.gnu.org/licenses/lgpl.html>
 * @link      http://charcoal.locomotive.ca
 * @author    Chauncey McAskill <chauncey@locomotive.ca>
 */

namespace CMS;

/**
 * Trait: Basic Metadata
 *
 * @package CMS\Objects
 */
trait Trait_Content_Metadata_Basic
{
	/**
	 * Object Title Metadata
	 *
	 * @var  string
	 * @see  Property_String (L10N)
	 */
	public $meta_title;

	/**
	 * Object Description Metadata
	 *
	 * @var  string
	 * @see  Property_Text (L10N)
	 */
	public $meta_description;

	/**
	 * Does the object use this trait.
	 *
	 * @return boolean
	 */
	public static function has_basic_metadata_trait()
	{
		return true;
	}

	/**
	 * Is the object an instance of Interface_Content_Metadata_Basic?
	 *
	 * @return boolean
	 */
	public static function has_basic_metadata_interface( \Charcoal_Base $object )
	{
		return ( is_object( $object ) && $object instanceof Interface_Content_Metadata_Basic );
	}

	/**
	 * {@inheritdoc}
	 */
	public function meta_title()
	{
		return $this->p('meta_title')->text();
	}

	/**
	 * {@inheritdoc}
	 */
	public function meta_description()
	{
		return $this->p('meta_description')->text();
	}
}
