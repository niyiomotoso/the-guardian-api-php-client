<?php
namespace Guardian\Entity;

/**
 * Class Tags
 * 
 * The tags guardian API entity
 * 
 * @package Guardian\Entity
 */
class Tags extends PageAndReferenceAPIEntity
{
    // query term
    private $webTitle;
    // filters
    private $type;

    /**
     * Sets `web-title`: free text every fetched tag will start from
     * @param string $webTitle String every tag in results should start from
     * @return self
     */
    public function setWebTitle(string $webTitle)
    {
        $this->webTitle = $webTitle;
        return $this;
    }

     /**
     * Sets tag type. Only tags of this type will be fetched
     * @param string $type Tag type
     * @return self
     */
    public function setType(string $type)
    {
        $this->type = $type;
        return $this;
    }

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

    protected function buildUrl()
    {
        $this->appendToBaseUrl("page", $this->page)
            ->appendToBaseUrl("page-size", $this->pageSize)
            ->appendToBaseUrl("q", $this->query)
            ->appendToBaseUrl("web-title", $this->webTitle)
            ->appendToBaseUrl("type", $this->type)
            ->appendToBaseUrl("section", $this->section)
            ->appendToBaseUrl("reference", $this->reference)
            ->appendToBaseUrl("reference-type", $this->referenceType)
            ->appendToBaseUrl("show-references", $this->showReferences);
        return $this->baseUrl;
    }
}
