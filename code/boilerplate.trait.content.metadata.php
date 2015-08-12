<?php

use \CMS\Trait_Content_Metadata_Basic as Trait_Metadata_Basic;
use \CMS\Trait_Content_Metadata_OpenGraph as Trait_Metadata_OpenGraph;

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
    use Trait_Metadata_Basic,
        Trait_Metadata_OpenGraph;

    /**
     * Get the meta-tags HTML, to put in the header.
     *
     * @return string
     */
    public function meta_tags_html()
    {
        $output = $this->as_html_meta_tags();

        if ( method_exists( $this, 'as_html_og_tags' ) ) {
            $output .= "\n" . $this->as_html_og_tags();
        }

        return $output;
    }

    /**
     * Retrieve the document's title,
     * for the `<title>` element.
     *
     * @return string, {@see [1]}.
     * @see    Interface_Meta_Basic
     */

    public function document_title()
    {
        $output  = '';
        $format  = '%1$s — %2$s';
        $config  = $this->cfg();
        $context = $this->context();

        if ( $context->id() && $this::has_meta_interface( $context ) ) {
            $output = $context->document_title();
        }

        if ( empty( $output ) ) {
            $output = $config->p('meta_title')->text();
        }
        else {
            $name = $config->p('meta_title')->text();

            if ( ! empty( $format ) && ! empty( $name ) && $output !== $name ) {
                $output = sprintf( $format, $name, $output );
            }
        }

        return htmlspecialchars( strip_tags( $output ), ENT_QUOTES );
    }

    /**
     * Retrieve the site's title.
     *
     * @return string, {@see [2]}.
     * @see    Interface_Meta_Basic
     */

    public function site_name()
    {
        return $this->cfg()->meta_title();
    }

    /**
     * Retrieve the site's title.
     *
     * @return string Value of metadata, {@see [1]}.
     * @see    Interface_Meta_OpenGraph
     */

    public function meta_site_name()
    {
        return htmlspecialchars( strip_tags( $this->cfg()->meta_title() ), ENT_QUOTES );
    }

    /**
     * Retrieve the object's title—as it should appear
     * in the graph—for the "og:title" meta-property.
     *
     * @return string
     * @see    Interface_Meta_OpenGraph
     */

    public function meta_title()
    {
        $output = $this->get_meta_value( __FUNCTION__ );

        return ( $output === $this->meta_site_name() ? false : $output );
    }

    /**
     * Retrieve the document's description.
     *
     * @return string
     * @see    Interface_Meta_Basic
     */

    public function meta_description()
    {
        return $this->get_meta_value( __FUNCTION__ );
    }

    /**
     * Retrieve the document's keywords.
     *
     * @return string
     * @see    Interface_Meta_Basic
     */

    public function meta_keywords()
    {
        return $this->get_meta_value( __FUNCTION__ );
    }

    /**
     * Retrieve an image URL—which should represent
     * your object within the graph—for the "og:image"
     * meta-property.
     *
     * @return string Property_Image
     * @see    Interface_Meta_OpenGraph
     */

    public function meta_image()
    {
        return $this->get_meta_value( __FUNCTION__ );
    }

    /**
     * Retrieve the value of a given meta-property.
     *
     * @return string Value of metadata, {@see [1]}.
     * @see    Interface_Meta_Basic
     */

    private function get_meta_value( $property_name )
    {
        $output  = '';
        $config  = $this->cfg();
        $context = $this->context();

        if ( $context->id() && $this::has_meta_interface( $context ) ) {
            $output = $context->{ $property_name }();
        }

        if ( empty( $output ) ) {
            $output = trim_words( $config->p( $property_name )->text() );
        }

        return htmlspecialchars( strip_tags( $output ), ENT_QUOTES );
    }

    /**
     * Retrieve document's author's name.
     *
     * @return string
     * @see    Interface_Meta_Basic
     */

    public function meta_author_name()
    {
        return $this->cfg()->p('meta_author_name')->text();
    }

    /**
     * Retrieve document's author's URL.
     *
     * @return string Property_URL
     * @see    Interface_Meta_Basic
     */

    public function meta_author_url()
    {
        return $this->cfg()->p('meta_author_url')->text();
    }

    /**
     * Retrieve the object's type,
     * for the "og:type" meta-property.
     *
     * @return string Property_Choice
     * @see    Interface_Meta_OpenGraph
     */

    public function meta_type()
    {
        return $this->cfg()->p('meta_type')->text();
    }

}
