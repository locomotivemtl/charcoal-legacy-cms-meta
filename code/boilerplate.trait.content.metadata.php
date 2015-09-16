<?php

/**
 * File: Boilerplate Document Metadata Class
 *
 * @copyright 2015 Locomotive
 * @license   PROPRIETARY
 * @link      http://charcoal.locomotive.ca
 * @author    Chauncey McAskill <chauncey@locomotive.ca>
 */

/**
 * Trait: Boilerplate Document Metadata
 *
 * Taps into properties of {@see Boilerplate_Config} and whatever
 * content types from here to there.
 *
 * 1. Values are stripped of HTML and escaped for HTML attributes.
 * 2. Values are unescaped and will include any HTML present.
 *
 * @package Boilerplate
 */
trait Boilerplate_Trait_Content_Metadata
{
	/**
	 * Triggered when invoking inaccessible methods in an object context.
	 *
	 * This method is used to trigger a recurring operation related to metadata properties.
	 *
	 * @param string $name      The name of the method being called,
	 *                          possibly a metadata property.
	 * @param string $arguments Optional. An enumerated array containing the
	 *                          parameters passed to the $name'ed method.
	 *
	 * @return mixed
	 *
	 * @todo McAskill [2015-08-20]: This doesn't work with Mustache
	 */
	public function __call( $name, $arguments = [] )
	{
		if ( 'meta_' === substr( $name, 0, 5 ) && isset( $this->{ $name } ) ) {
			return $this->get_context_meta_value( $name );
		}
		elseif ( is_callable('parent::__call') ) {
			return parent::__call( $name, $arguments );
		}
	}

	/**
	 * Does the object use basic metadata.
	 *
	 * @return boolean
	 */
	public static function has_basic_metadata_trait()
	{
		return true;
	}

	/**
	 * Does the object use OpenGraph metadata.
	 *
	 * @return boolean
	 */
	public static function has_og_metadata_trait()
	{
		return true;
	}

	/**
	 * Retrieve the document's title, for the `<title>` element.
	 *
	 * @uses self::meta_title()
	 * @uses self::meta_site_name()
	 *
	 * @param string $format    Optional. A custom format for the document title
	 * @param string $separator Optional. A custom separator
	 *
	 * @return string [1]
	 */
	public function document_title( $format = null, $separator = null )
	{
		$output  = '';
		$context = $this->context();
		$banner  = $this->meta_site_name();

		if ( ! isset( $format ) ) {
			$format = $this->document_title_format();
		}

		if ( ! isset( $separator ) ) {
			$separator = $this->document_title_separator();
		}

		if ( method_exists( $context, 'meta_title' ) ) {
			$output = $context->meta_title();
		}

		if ( empty( $output ) ) {
			$output = $banner;
		}
		else {
			if ( ! empty( $banner ) && $output !== $banner ) {
				$output = sprintf( $format, $separator, $banner, $output );
			}
		}

		return htmlspecialchars( strip_tags( $output ), ENT_QUOTES );
	}

	/**
	 * Retrieve the text pattern used for the document title
	 *
	 * Format:
	 * • "%1$s" — {@see self::document_title_separator() Separator}
	 * • "%2$s" — Site Name
	 * • "%3$s" — Object Title
	 *
	 * @return string
	 */
	protected function document_title_format()
	{
		return '%2$s%1$s%3$s';
	}

	/**
	 * Retrieve the optional separator used for the document title
	 *
	 * @return string
	 */
	protected function document_title_separator()
	{
		return ' ― ';
	}

	/**
	 * Alias of self::meta_site_name()
	 *
	 * @return string
	 */
	public function site_name()
	{
		return $this->meta_site_name();
	}

	/**
	 * Retrieve the site's title by accessing the module's config object.
	 *
	 * @return string [1]
	 */
	public function meta_site_name()
	{
		return htmlspecialchars( strip_tags( $this->cfg()->meta_title() ), ENT_QUOTES );
	}

	/**
	 * Retrieve the object's title—as it should appear
	 * in the graph—for the "og:title" meta-property.
	 *
	 * @return string [1]
	 */
	public function meta_title()
	{
		$output = $this->get_context_meta_value( __FUNCTION__ );

		return ( $output === $this->meta_site_name() ? '' : $output );
	}

	/**
	 * Retrieve the document's description.
	 *
	 * @return string [1]
	 */
	public function meta_description()
	{
		return $this->get_context_meta_value( __FUNCTION__ );
	}

	/**
	 * Retrieve the document's keywords.
	 *
	 * @return string [1]
	 */
	public function meta_keywords()
	{
		return $this->get_context_meta_value( __FUNCTION__ );
	}

	/**
	 * Retrieve an image URL—which should represent
	 * your object within the graph—for the "og:image"
	 * meta-property.
	 *
	 * @return string [1]
	 */
	public function meta_image()
	{
		return $this->get_context_meta_value( __FUNCTION__ );
	}

	/**
	 * Retrieve the document's type,
	 * for the "og:type" meta-property.
	 *
	 * @return string [1]
	 */
	public function meta_type()
	{
		return $this->get_context_meta_value( __FUNCTION__ );
	}

	/**
	 * Retrieve document's author's name.
	 *
	 * @return string [1]
	 */
	public function meta_author_name()
	{
		return $this->get_context_meta_value( __FUNCTION__ );
	}

	/**
	 * Retrieve document's author's URL.
	 *
	 * @return string [1]
	 */
	public function meta_author_url()
	{
		return $this->get_context_meta_value( __FUNCTION__ );
	}

	/**
	 * Retrieve the value of a given metadata property
	 * from the module's config object.
	 *
	 * @return string
	 */
	private function get_config_meta_value( $property_name )
	{
		$output = '';
		$config = $this->cfg();

		if ( method_exists( $config, $property_name ) ) {
			$output = $this->cfg()->{ $property_name }();
		}
		else {
			$prop = $this->cfg()->p( $property_name );

			if ( $prop ) {
				$output = $prop->text();
			}
		}

		return htmlspecialchars( strip_tags( $output ), ENT_QUOTES );
	}

	/**
	 * Retrieve the value of a given meta-property.
	 *
	 * @return string [1]
	 */
	private function get_context_meta_value( $property_name )
	{
		$output  = '';
		$context = $this->context();

		if ( method_exists( $context, $property_name ) ) {
			$output = $context->{ $property_name }();
		}

		if ( empty( $output ) ) {
			return $this->get_config_meta_value( $property_name );
		}

		return htmlspecialchars( strip_tags( $output ), ENT_QUOTES );
	}
}
