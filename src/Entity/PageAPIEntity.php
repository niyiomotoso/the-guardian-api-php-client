<?php
namespace Guardian\Entity;

use InvalidArgumentException;
/**
 * Class PageAPIEntity
 * 
 * Base class for guardian API entities that have page attributes
 * 
 * @package Guardian\Entity
 */
abstract class PageAPIEntity extends APIEntity {

    // page options
    protected $page = 1;
    protected $pageSize = 20;
    
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
}