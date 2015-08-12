<?php

/**
 * File: Authorship Metadata Charcoal Interface
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
 * Interface: Authorship Metadata
 *
 * @package CMS\Objects
 */

interface Interface_Content_Metadata_Author
{
    /**
     * Retrieve document's author's name.
     *
     * @return string Property_String
     */

    public function meta_author_name();

    /**
     * Retrieve document's author's URL.
     *
     * @return string Property_URL
     */

    public function meta_author_url();
}
