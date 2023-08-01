<?php
namespace Guardian\Entity;

class SingleItem extends ContentAPIEntity
{
    // query term
    /** @var string */
    private $id;
    // additional information
    /** @var bool */
    private $showStoryPackage;
    /** @var bool */
    private $showEditorsPicks;
    /** @var bool */
    private $showMostViewed;
    /** @var bool */
    private $showRelated;
    /** @var string */
    private $apiKey;

    public function __construct(string $baseUrl, string $apiKey)
    {
        parent::__construct($baseUrl);
        $this->apiKey = $apiKey;
    }
    /**
     * Set the ID for the content to fetch.
     * The ID for an item, such as a piece of content, is the path to
     * that item on the guardian site.
     * @param string $id Item ID string of relative path to the item on the website including the initial `/`
     * valid value: `/sport/2022/oct/07/cricket-jos-buttler-primed-for-england-comeback-while-phil-salt-stays-focused`
     * @return self
     */
    public function setId(string $id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Choose to show story package
     * When `true` display a list of content that has been identified as being
     * about the same story as the requested content item.
     * @param bool $showStoryPackage
     * @return self
     */
    public function setShowStoryPackage(bool $showStoryPackage)
    {
        $this->showStoryPackage = $showStoryPackage ? 'true' : 'false';
        return $this;
    }

    /**
     * Choose to show editors' picks
     * When `true` display a list of content that is chosen by editors on tags,
     * sections and the home page.
     * @param bool $showEditorsPicks
     * @return self
     */
    public function setShowEditorsPicks(bool $showEditorsPicks)
    {
        $this->showEditorsPicks = $showEditorsPicks ? 'true' : 'false';
        return $this;
    }

    /**
     * Choose to show most viewed
     * When `true` display most viewed content.
     * @param bool $showMostViewed
     * @return self
     */
    public function setShowMostViewed(bool $showMostViewed)
    {
        $this->showMostViewed = $showMostViewed ? 'true' : 'false';
        return $this;
    }

    /**
     * Choose to show related content
     * Content items can show a set of 'related' content.
     * When `true`, returns content items related to the main content item
     * @param bool $showRelated
     * @return self
     */
    public function setShowRelated(bool $showRelated)
    {
        $this->showRelated = $showRelated ? 'true' : 'false';
        return $this;
    }

    protected function buildUrl()
    {
        $this->baseUrl = "{$this->baseUrl}{$this->id}?api-key={$this->apiKey}";
        parent::buildUrl();
        $this->appendToBaseUrl("show-story-package", $this->showStoryPackage)
            ->appendToBaseUrl("show-editors-picks", $this->showEditorsPicks)
            ->appendToBaseUrl("show-most-viewed", $this->showMostViewed)
            ->appendToBaseUrl("show-related", $this->showRelated);
        return $this->baseUrl;
    }
}
