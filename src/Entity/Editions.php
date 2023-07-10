<?php

namespace Guardian\Entity;

/**
 * Class Editions
 * 
 * The editions guardian API entity
 * 
 * @package Guardian\Entity
 */
class Editions extends APIEntity
{
    /**
     * builds URL depending on set fields to fetch sections.
     * The sections endpoint accepts a query term and a format
     * format defaults to 'json' when no format is specified.
     * when no query term is specified, all sections are fetched
     * 
     * @return string The url to be queried
     */
    public function getUrl()
    {
        $url = $this->baseUrl;

        if (isset($this->query)) {
            $url = $url . "&q=" . $this->query;
        }
        return $url;
    }
}
