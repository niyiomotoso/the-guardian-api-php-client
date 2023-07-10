<?php

namespace Guardian\Entity;

class Content extends APIEntity
{
    private $fromDate;
    private $toDate;
    private $page;
    private $pageSize;

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

    public function getUrl()
    {
    }
}
