<?php
namespace Guardian\Entity;

use DateTimeImmutable;

abstract class ContentAPIEntity extends PageAndReferenceAPIEntity
{
    // Filters
    protected $tag;
    protected $rights;
    protected $ids;
    protected $productionOffice;
    protected $lang;
    protected $starRating;
    // Date options
    protected $fromDate;
    protected $toDate;
    protected $useDate;
    // ordering
    protected $orderBy;
    protected $orderDate;
    // additional information
    protected $showFields;
    protected $showTags;
    protected $showSection;
    protected $showBlocks;
    protected $showElements;
    protected $showRights;

    /**
     * To set tags. Only content with the tags will be fetched
     * The `tag` attribute supports boolean operators
     * @param string $tag
     * @return self
     */
    public function setTag(string $tag)
    {
        $this->tag = $tag;
        return $this;
    }

    /**
     * To set rights. Only content with the rights will be fetched
     * The `rights` attribute doesn't support boolean operators
     * @param string $rights
     * @return self
     */
    public function setRights(string $rights)
    {
        $this->rights = $rights;
        return $this;
    }

    /**
     * To set ids. Only content with the ids will be fetched
     * The `ids` attribute doesn't support boolean operators
     * @param string $ids
     * @return self
     */
    public function setIds(string $ids)
    {
        $this->ids = $ids;
        return $this;
    }

    /**
     * To set production offices. Only content with the production offices 
     * will be fetched.
     * The `production-office` attribute supports boolean operators
     * @param string $productionOffice
     * @return self
     */
    public function setProductionOffice(string $productionOffice)
    {
        $this->productionOffice = $productionOffice;
        return $this;
    }

    /**
     * To set language(s) to return content for 
     * The `lang` attribute supports boolean operators
     * @param string $lang
     * @return self
     */
    public function setLang(string $lang)
    {
        $this->lang = $lang;
        return $this;
    }

     /**
     * To set the star-rating for contents to be retrieved.
     * The `star-rating` attribute doesn't support boolean operators
     * @param int $starRating
     * @return self
     */
    public function setStarRating(string $starRating)
    {
        $this->starRating = $starRating;
        return $this;
    }

    /**
     * Set `from-date`. Only content on or after `from-date` will be fetched
     * @param \DateTimeImmutable $fromDate
     * @return self
     */
    public function setFromDate(DateTimeImmutable $fromDate)
    {
        $this->fromDate = $fromDate->format("Y-m-d");
        return $this;
    }

    /**
     * Set `to-date`. Only content on or before `to-date` will be fetched
     * @param \DateTimeImmutable $toDate
     * @return self
     */
    public function setToDate(DateTimeImmutable $toDate)
    {
        $this->toDate = $toDate->format("Y-m-d");
        return $this;
    }

    /**
     * Set `use-date` to filter the results
     * @param string $useDate Date type to filter results. See https://open-platform.theguardian.com/documentation/search
     * @return self
     */
    public function setUseDate(string $useDate)
    {
        $this->useDate = $useDate;
        return $this;
    }

    /**
     * Set `order-by` to return results in the specified order
     * @param string $orderBy One of `newest`, `oldest`, or `relevance`. See the docs 
     * @return self
     */
    public function setOrderBy(string $orderBy)
    {
        $this->orderBy = $orderBy;
        return $this;
    }

    /**
     * Set `order-date` to choose the type of date to be used to order the results
     * @param string $orderDate One of `published`, `newspaper-edition`, or `last-modified`. See the docs 
     * @return self
     */
    public function setOrderDate(string $orderDate)
    {
        $this->orderDate = $orderDate;
        return $this;
    }

     /**
     * Set `show-fields` to choose the fields to be added to the content
     * @param string $showFields String list of desired fields. See the docs 
     * @return self
     */
    public function setShowFields(string $showFields)
    {
        $this->showFields = $showFields;
        return $this;
    }

    /**
     * Set `show-tags` to add associated metadata tags
     * @param string $showTags String list of desired metadata tags. See the docs 
     * @return self
     */
    public function setShowTags(string $showTags)
    {
        $this->showTags = $showTags;
        return $this;
    }

    /**
     * Set `show-section` to add associated metadata section
     * @param string $showSection Boolean string - 'true'. See the docs 
     * @return self
     */
    public function setShowSection(string $showSection)
    {
        $this->showSection = $showSection;
        return $this;
    }

    /**
     * Set `show-blocks` to add associated blocks
     * @param string $showBlocks String list of blocks. See the docs 
     * @return self
     */
    public function setShowBlocks(string $showBlocks)
    {
        $this->showBlocks = $showBlocks;
        return $this;
    }

    /**
     * Set `show-elements` to add media elements like images and audio.
     * Accepted elements - `audio`, `image`, `video`, `all`
     * @param string $showElements String list of elements. See the docs 
     * @return self
     */
    public function setShowElements(string $showElements)
    {
        $this->showElements = $showElements;
        return $this;
    }

    /**
     * Set `show-rights` to add associated rights.
     * Accepted values - `syndicatable`, `subscription-databases`, `all`
     * @param string $showRights String list of rights. See the docs 
     * @return self
     */
    public function setShowRights(string $showElements)
    {
        $this->showElements = $showElements;
        return $this;
    }

    protected function buildUrl()
    {
        $this->appendToBaseUrl("tag", $this->tag)
            ->appendToBaseUrl("rights", $this->rights)
            ->appendToBaseUrl("ids", $this->ids)
            ->appendToBaseUrl("production-office", $this->productionOffice)
            ->appendToBaseUrl("lang", $this->lang)
            ->appendToBaseUrl("star-rating", $this->starRating)
            ->appendToBaseUrl("from-date", $this->fromDate)
            ->appendToBaseUrl("to-date", $this->toDate)
            ->appendToBaseUrl("use-date", $this->useDate)
            ->appendToBaseUrl("order-by", $this->orderBy)
            ->appendToBaseUrl("order-date", $this->orderDate)
            ->appendToBaseUrl("show-fields", $this->showFields)
            ->appendToBaseUrl("show-tags", $this->showTags)
            ->appendToBaseUrl("show-section", $this->showSection)
            ->appendToBaseUrl("show-blocks", $this->showSection)
            ->appendToBaseUrl("show-elements", $this->showElements)
            ->appendToBaseUrl("show-rights", $this->showRights)
            ->appendToBaseUrl("page", $this->page)
            ->appendToBaseUrl("page-size", $this->pageSize)
            ->appendToBaseUrl("section", $this->section)
            ->appendToBaseUrl("reference", $this->reference)
            ->appendToBaseUrl("reference-type", $this->referenceType)
            ->appendToBaseUrl("show-references", $this->showReferences);
        return $this->baseUrl;
    }
}