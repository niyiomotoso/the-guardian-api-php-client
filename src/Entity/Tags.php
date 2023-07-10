<?php

namespace Guardian\Entity;

class Tags extends APIEntity
{
    // page options
    private $page;
    private $pageSize;
    // query term
    private $webTitle;
    // filters
    private $type;
    private $section;
    private $reference;
    private $referenceType;
    // additional information
    private $showReferences;

    public function setPage(int $page)
    {
        $this->page = $page;
        return $this;
    }

    public function setPageSize(int $pageSize)
    {
        $this->pageSize = $pageSize;
        return $this;
    }

    public function setWebTitle(string $webTitle)
    {
        $this->webTitle = $webTitle;
        return $this;
    }

    public function setType(string $type)
    {
        $this->type = $type;
        return $this;
    }

    public function setSection(string $section)
    {
        $this->section = $section;
        return $this;
    }

    public function setReference(string $reference)
    {
        $this->reference = $reference;
        return $this;
    }

    public function setReferenceType(string $referenceType)
    {
        $this->referenceType = $referenceType;
        return $this;
    }

    public function setShowReferences(string $showReferences)
    {
        $this->showReferences = $showReferences;
        return $this;
    }

    public function getUrl()
    {
    }
}
