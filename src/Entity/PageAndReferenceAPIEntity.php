<?php
namespace Guardian\Entity;

use InvalidArgumentException;

/**
 * Class PageAndReferenceAPIEntity
 * 
 * Base class for guardian API entities that have page & reference attributes
 * 
 * @package Guardian\Entity
 */
abstract class PageAndReferenceAPIEntity extends APIEntity {

    // page options
    protected $page = 1;
    protected $pageSize = 20;
    // Filters
    protected $section;
    protected $reference;
    protected $referenceType;
    // additional information
    protected $showReferences;
    
     /**
     * Sets the page index results should be fetched for.
     * If `page` is not set, it defaults to 1
     * @param int $page Page index to be set
     * @return self
     * @throws InvalidArgumentException If `page` is invalid
     */
    public function setPage(int $page)
    {
        if($page < 1) {
            throw new InvalidArgumentException("Page cannot be negative or zero");
        }
        $this->page = $page;
        return $this;
    }

    /**
     * Sets the number of items displayed per page.
     * If `pageSize` is not set, it defaults to 20
     * @param int $pageSize Number of items per page
     * @return self
     * @throws InvalidArgumentException If `pageSize` is invalid
     */
    public function setPageSize(int $pageSize)
    {
        if($pageSize < 1) {
            throw new InvalidArgumentException("Page size cannot be negative or zero");
        }
        $this->pageSize = $pageSize;
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
}