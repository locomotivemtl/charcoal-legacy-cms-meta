<?php

/**
 * File: Basic Metadata Charcoal Trait
 *
 * @copyright   2015 Locomotive
 * @license     LGPL <https://www.gnu.org/licenses/lgpl.html>
 * @link        http://charcoal.locomotive.ca
 *
 * @author      Mathieu Ducharme <mat@locomotive.ca>
 * @author      Chauncey McAskill <chauncey@locomotive.ca>
 *
 * @since       Version 2014-09-08
 */

namespace Charcoal\CMS;

/**
 * Trait: Basic Metadata
 */

trait Trait_Meta_Basic
{
    /**
     * Meta Data Properties
     *
     * @var string  $meta_title         Property_String / l10n
     * @var string  $meta_title_prefix  Property_String / l10n
     * @var string  $meta_title_suffix  Property_String / l10n
     * @var string  $meta_description   Property_String / l10n
     * @var string  $meta_keywords      Property_String / l10n
     * @var string  $meta_author_name   Property_String / l10n
     * @var string  $meta_author_url    Property_URL / l10n
     */

    public $meta_title;
    public $meta_title_prefix;
    public $meta_title_suffix;
    public $meta_description;
    public $meta_keywords;
    public $meta_author_name;
    public $meta_author_url;

    /**
     * Get the meta-tags HTML, to put in the header.
     *
     * @return string
     */
    public function meta_tags_html()
    {
        return $this->as_html_meta_tags();
    }

    /**
     * Generate the HTML meta tags from a Mustache template,
     * to put in the `<head>`.
     *
     * @return string
     * @see    \Charcoal\Interface_Meta
     */
    public function as_html_meta_tags()
    {
        $replacements = [
            'obj'     => $this,
            'charset' => 'UTF-8',
            'in_dev'  => \Charcoal::$config['dev_mode']
        ];

        $tpl = \Charcoal_Template::get( 'meta-data', $replacements );
        $tpl->set_template('<meta charset="UTF-8">
{{#obj.document_title}}

        <title>{{obj.document_title}}</title>
{{/obj.document_title}}
{{#obj.meta_description}}

        <meta name="description" content="{{obj.meta_description}}" />
{{/obj.meta_description}}
{{#obj.meta_author_name}}

        <meta name="author" content="{{obj.meta_author_name}}" />
{{/obj.meta_author_name}}
{{#obj.meta_author_url}}

        <link rel="author" href="{{obj.meta_author_url}}" />{{/obj.meta_author_url}}');

        return $tpl->render();
    }

    /**
     * Is the object an instance of Interface_Meta?
     *
     * @return boolean
     */
    public static function has_meta_interface( \Charcoal_Base $object )
    {
        return ( is_object( $object ) && $object instanceof Interface_Meta );
    }

    /**
     * Retrieve the document's title,
     * for the `<title>` element.
     *
     * @return string Property_String
     * @see    \Charcoal\Interface_Meta
     */

    public function document_title()
    {
        return $this->p('meta_title')->text();
    }

    /**
     * Retrieve the document's description.
     *
     * @return string Property_String
     * @see    \Charcoal\Interface_Meta
     */

    public function meta_description()
    {
        return $this->p('meta_description')->text();
    }

    /**
     * Retrieve the document's keywords.
     *
     * @return string Property_String
     * @see    \Charcoal\Interface_Meta
     */

    public function meta_keywords()
    {
        return $this->p('meta_keywords')->text();
    }

    /**
     * Retrieve document's author's name.
     *
     * @return string Property_String
     * @see    \Charcoal\Interface_Meta
     */

    public function meta_author_name()
    {
        return $this->p('meta_author_name')->text();
    }

    /**
     * Retrieve document's author's URL.
     *
     * @return string Property_URL
     * @see    \Charcoal\Interface_Meta
     */

    public function meta_author_url()
    {
        return $this->p('meta_author_url')->text();
    }
}
