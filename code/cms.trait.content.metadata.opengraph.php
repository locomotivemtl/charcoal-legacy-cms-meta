<?php

/**
 * File: OpenGraph Metadata Charcoal Trait
 *
 * @copyright 2015 Locomotive
 * @license   LGPL <https://www.gnu.org/licenses/lgpl.html>
 * @link      http://charcoal.locomotive.ca
 * @author    Chauncey McAskill <chauncey@locomotive.ca>
 */

namespace CMS;

/**
 * Trait: OpenGraph Metadata
 *
 * @package CMS\Objects
 */
trait Trait_Content_Metadata_OpenGraph
{
	/**
	 * Object Type Metadata
	 *
	 * @var  string
	 * @see  Property_CMS_OpenGraph_Type
	 */
	public $meta_type;

	/**
	 * Object Thumbnail Metadata
	 *
	 * @var  string
	 * @see  Property_Image
	 */
	public $meta_image;

	/**
	 * Does the object use this trait.
	 *
	 * @return boolean
	 */
	public static function has_og_metadata_trait()
	{
		return true;
	}

	/**
	 * Is the object an instance of Interface_Content_Metadata_OpenGraph?
	 *
	 * @return boolean
	 */
	public static function has_og_metadata_interface( \Charcoal_Base $object )
	{
		return ( is_object( $object ) && $object instanceof Interface_Content_Metadata_OpenGraph );
	}

	/**
	 * {@inheritdoc}
	 */
	public function meta_site_name()
	{
		return $this->meta_title();
	}

	/**
	 * {@inheritdoc}
	 */
	public function meta_type()
	{
		return $this->p('meta_type')->text();
	}

	/**
	 * {@inheritdoc}
	 */
	public function meta_image()
	{
		return $this->p('meta_image')->text();
	}
}
