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
     * Sets the `query` attribute for this API entity
     * @param string $query Free text to search for
     * @return self The object this was set on
     */
    public function setQuery(string $query)
    {
        $this->query = $query;
        return $this;
    }

    /**
     * builds URL depending on set fields to fetch editions.
     * The editions endpoint accepts a query term and a format.
     * `format` defaults to 'json' when no format is specified.
     * When no query term is specified, all editions are fetched
     * 
     * @return string The url to be queried
     */
    protected function buildUrl()
    {
        $this->appendToBaseUrl("q", $this->query);
        return $this->baseUrl;
    }
}
