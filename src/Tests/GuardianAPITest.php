<?php

namespace Guardian\Tests;

use Guardian\GuardianAPI;
use Guardian\Entity\Sections;
use Guardian\Entity\Content;
use Guardian\Entity\SingleItem;
use Guardian\Entity\Editions;
use Guardian\Entity\Tags;
use PHPUnit\Framework\TestCase;

class GuardianAPITest extends TestCase
{
    private string $apiKey = 'test';

    public function testSectionsMethodReturnsInstanceOfSections()
    {
        $guardianApi = new GuardianAPI($this->apiKey);
        $sections = $guardianApi->sections();
        $this->assertInstanceOf(Sections::class, $sections);
    }

    public function testContentMethodReturnsInstanceOfContent()
    {
        $guardianApi = new GuardianAPI($this->apiKey);
        $content = $guardianApi->content();
        $this->assertInstanceOf(Content::class, $content);
    }

    public function testSingleItemMethodReturnsInstanceOfSingleItem()
    {
        $guardianApi = new GuardianAPI($this->apiKey);
        $singleItem = $guardianApi->singleItem();
        $this->assertInstanceOf(SingleItem::class, $singleItem);
    }

    public function testEditionsMethodReturnsInstanceOfEditions()
    {
        $guardianApi = new GuardianAPI($this->apiKey);
        $editions = $guardianApi->editions();
        $this->assertInstanceOf(Editions::class, $editions);
    }

    public function testTagsMethodReturnsInstanceOfTags()
    {
        $guardianApi = new GuardianAPI($this->apiKey);
        $tags = $guardianApi->tags();
        $this->assertInstanceOf(Tags::class, $tags);
    }

    public function testValidateApiKeyThrowsExceptionForShortApiKey()
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('API key "abc" is too short, and thus invalid.');

        $invalidApiKey = 'abc';
        $guardianApi = new GuardianAPI($invalidApiKey);
    }

    public function testValidApiKey()
    {
        $guardianApi = new GuardianAPI($this->apiKey);
        // No exception should be thrown for a valid API key
        $this->assertTrue(true);
    }
}
