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
     * builds URL depending on set fields to fetch editions.
     * The editions endpoint accepts a query term and a format.
     * `format` defaults to 'json' when no format is specified.
     * When no query term is specified, all editions are fetched
     * 
     * @return string The url to be queried
     */
    public function buildUrl()
    {
        // $url = $this->baseUrl;

        // if (!empty($this->query)) {
        //     $url = $url . "&q=" . $this->query;
        // }
        // return $url;
        $entity = $this->appendToBaseUrl("q", $this->query);
        return $this->baseUrl;
    }
}
