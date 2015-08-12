<?php

/**
 * File: Authorship Metadata Charcoal Trait
 *
 * @copyright   2015 Locomotive
 * @license     LGPL <https://www.gnu.org/licenses/lgpl.html>
 * @link        http://charcoal.locomotive.ca
 *
 * @author      Mathieu Ducharme <mat@locomotive.ca>
 * @author      Chauncey McAskill <chauncey@locomotive.ca>
 *
 * @since       Version 2015-08-11
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
     * Meta Data Properties
     *
     * @var string  $meta_author_name   Property_String / l10n
     * @var string  $meta_author_url    Property_URL / l10n
     */

    public $meta_author_name;
    public $meta_author_url;

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
        $tpl->set_template('{{#obj.meta_author_name}}

        <meta name="author" content="{{obj.meta_author_name}}" />
{{/obj.meta_author_name}}
{{#obj.meta_author_url}}

        <link rel="author" href="{{obj.meta_author_url}}" />{{/obj.meta_author_url}}');

        return $tpl->render();
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
