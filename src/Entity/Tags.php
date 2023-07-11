<?php

namespace Guardian\Entity;

/**
 * Class Tags
 * 
 * The tags guardian API entity
 * 
 * @package Guardian\Entity
 */
class Tags extends PageAPIEntity
{
    // query term
    private $webTitle;
    // filters
    private $type;
    private $section;
    private $reference;
    private $referenceType;
    // additional information
    private $showReferences;

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
     * Sets `section(s)` to return only tags in the sections.
     * `section` supports boolean operators - ',' for AND. '|' for OR. '-' for NOT.
     * Valid section strings: "business,sports", "business", "business|sports"
     * @param string $section
     * @return self
     */
    public function setSection(string $section)
    {
        $this->section = $section;
        return $this;
    }

     /**
     * Sets `reference(s)` to return only tags with those references
     * `reference` supports boolean operators - ',' for AND. '|' for OR. '-' for NOT.
     * Valid reference strings: "isbn/9780349108391", "isbn/9780349108391,isbn/9780XXXXXXX"
     * @param string $reference
     * @return self
     */
    public function setReference(string $reference)
    {
        $this->reference = $reference;
        return $this;
    }

    /**
     * Sets `reference-type(s)` to return only tags with references of those types
     * `reference` supports boolean operators - ',' for AND. '|' for OR. '-' for NOT.
     * @param string $referenceType
     * @return self
     */
    public function setReferenceType(string $referenceType)
    {
        $this->referenceType = $referenceType;
        return $this;
    }

    /**
     * Sets `show-references` field to specify if the associated reference data like ISBNs
     * for the fetched tags is to be shown.
     * `show-references` is a string list. 
     * See https://open-platform.theguardian.com/documentation/tag
     * for valid entries for this list
     * @param string $showReferences
     * @return self
     */
    public function setShowReferences(string $showReferences)
    {
        $this->showReferences = $showReferences;
        return $this;
    }

    public function buildUrl()
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
