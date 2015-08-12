<?php

/**
 * File: OpenGraph Metadata Charcoal Interface
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
 * Interface: OpenGraph Metadata
 *
 * @package CMS\Objects
 */

interface Interface_Content_Metadata_OpenGraph
{
    /**
     * Generate a collection of OpenGraph meta tags from
     * a Mustache template, to put in the `<head>`.
     *
     * @return string
     */
    public function as_html_og_tags();

    /**
     * Retrieve the name of the web site
     * upon which the object resides.
     *
     * @return string Property_String
     */

    public function meta_site_name();

    /**
     * Retrieve the object's title—as it should appear
     * in the graph—for the "og:title" meta-property.
     *
     * @return string Property_String
     */

    public function meta_title();

    /**
     * Retrieve the object's type,
     * for the "og:type" meta-property.
     *
     * @return string Property_String
     */

    public function meta_type();

    /**
     * Retrieve an image URL—which should represent
     * your object within the graph—for the "og:image"
     * meta-property.
     *
     * @return string Property_URL
     */

    public function meta_image();
}
