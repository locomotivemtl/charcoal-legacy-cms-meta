<?php

/**
 * File: OpenGraph Metadata Charcoal Trait
 *
 * @copyright 2015 Locomotive
 * @license   LGPL <https://www.gnu.org/licenses/lgpl.html>
 * @link      http://charcoal.locomotive.ca
 *
 * @author    Mathieu Ducharme <mat@locomotive.ca>
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
	 * Meta Data Properties
	 *
	 * @var string  $meta_image  Property_Image
	 * @var string  $meta_type   Property_CMS_OpenGraph_Type
	 */

	public $meta_image;
	public $meta_type;

	/**
	 * Generate a collection of OpenGraph meta tags from
	 * a Mustache template, to put in the `<head>`.
	 *
	 * @return string
	 * @see    \Charcoal\Interface_Meta_OpenGraph
	 */
	public function as_html_og_tags()
	{
		$replacements = [
			'obj'     => $this,
			'in_dev'  => \Charcoal::$config['dev_mode']
		];

		$tpl = \Charcoal_Template::get( 'widget.cms.metadata.opengraph', $replacements );
		$tpl->set_template('{{#obj.meta_type}}
		<meta property="og:type"        content="{{obj.meta_type}}" />
{{/obj.meta_type}}
{{#obj.url}}
		<meta property="og:url"         content="{{obj.url}}" />
{{/obj.url}}
{{#obj.meta_title}}
		<meta property="og:title"       content="{{obj.meta_title}}" />
{{/obj.meta_title}}
{{#obj.meta_description}}
		<meta property="og:description" content="{{obj.meta_description}}" />
{{/obj.meta_description}}
{{#obj.meta_image}}
		<meta property="og:image"       content="{{obj.URL}}{{obj.meta_image}}" />
{{/obj.meta_image}}
{{#obj.meta_site_name}}
		<meta property="og:site_name"   content="{{obj.meta_site_name}}" />{{/obj.meta_site_name}}');

		return $tpl->render();
	}

	/**
	 * Does the object use this trait.
	 *
	 * @return boolean
	 */
	public static function has_metadata_og()
	{
		return true;
	}

	/**
	 * Is the object an instance of Interface_Content_Metadata_OpenGraph?
	 *
	 * @return boolean
	 */
	public static function has_metadata_og_interface( \Charcoal_Base $object )
	{
		return ( is_object( $object ) && $object instanceof Interface_Content_Metadata_OpenGraph );
	}

	/**
	 * Retrieve the site's title.
	 *
	 * @return string
	 * @see    Charcoal\Interface_Meta
	 */

	public function meta_site_name()
	{
		return $this->meta_title();
	}

	/**
	 * Retrieve the object's title—as it should appear
	 * in the graph—for the "og:title" meta-property.
	 *
	 * @return string Property_String
	 */

	public function meta_title()
	{
		return $this->p('meta_title')->text();
	}

	/**
	 * Retrieve the object's type,
	 * for the "og:type" meta-property.
	 *
	 * @return string Property_Choice
	 * @see    \Charcoal\Interface_Meta
	 */

	public function meta_type()
	{
		return $this->p('meta_type')->text();
	}

	/**
	 * Retrieve an image URL—which should represent
	 * your object within the graph—for the "og:image"
	 * meta-property.
	 *
	 * @return string Property_Image
	 * @see    \Charcoal\Interface_Meta
	 */

	public function meta_image()
	{
		return $this->p('meta_image')->text();
	}
}
