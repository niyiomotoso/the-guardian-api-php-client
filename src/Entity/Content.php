<?php
namespace Guardian\Entity;

/**
 * Class Content
 *
 * The content guardian API entity
 *
 * @package Guardian\Entity
 */
class Content extends ContentAPIEntity
{
    // Query term
    private $queryFields;

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

    public function setQueryFields(string $queryFields)
    {
        $this->queryFields = $queryFields;
        return $this;
    }

    protected function buildUrl()
    {
        parent::buildUrl();
        $this->appendToBaseUrl("q", $this->query)
            ->appendToBaseUrl("query-fields", $this->queryFields);
        return $this->baseUrl;
    }
}
