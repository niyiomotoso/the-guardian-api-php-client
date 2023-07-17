<?php
namespace Guardian;

use Guardian\Entity\Content;
use Guardian\Entity\SingleItem;
use Guardian\Entity\Editions;
use Guardian\Entity\Sections;
use Guardian\Entity\Tags;
use InvalidArgumentException;

/**
 * Class GuardianAPI
 * 
 * The main class for API consumption
 * 
 * @package Guardian
 */
class GuardianAPI
{
    /** @var string The guardian API key */
    private $apiKey = null;

    /** @var array The base urls for every guardian API entity */
    private $urls;

    /**
     * Creates instance of Guardian\GuardianAPI
     * @param string $apiKey The guardian API key obtained from https://open-platform.theguardian.com/access/
     * @throws InvalidArgumentException When token seems invalid
     */
    public function __construct(string $apiKey)
    {
        $this->apiKey = $this->validateApiKey($apiKey);
        $this->urls = require_once __DIR__ . '/config/urls.php';
    }

    /**
     * Object factory for class Guardian\Entity\Sections to fetch sections
     * @return Sections
     */
    public function sections()
    {
        $baseUrl = $this->urls['sections'] . "?api-key=" . $this->apiKey;
        return new Sections($baseUrl);
    }

    /**
     * Object factory for class Guardian\Entity\Content to fetch contents
     * @return Content
     */
    public function content()
    {
        $baseUrl = $this->urls['content'] . "?api-key=" . $this->apiKey;
        return new Content($baseUrl);
    }

    /**
     * Object factory for class Guardian\Entity\SingleItem to fetch single items
     * @return SingleItem
     */
    public function singleItem()
    {
        $baseUrl = $this->urls['singleItem'];
        return new SingleItem($baseUrl, $this->apiKey);
    }

    /**
     * Object factory for class Guardian\Entity\Editions to fetch editions
     * @return Editions
     */
    public function editions()
    {
        $baseUrl = $this->urls['editions'] . "?api-key=" . $this->apiKey;
        return new Editions($baseUrl);
    }

    /**
     * Object factory for class Guardian\Entity\Tags to fetch tags
     * @return Tags
     */
    public function tags()
    {
        $baseUrl = $this->urls['tags'] . "?api-key=" . $this->apiKey;
        return new Tags($baseUrl);
    }

    private function validateApiKey(string $apiKey) {
        if (strlen($apiKey) < 4) {
            throw new \InvalidArgumentException('API key "' . $apiKey . '" is too short, and thus invalid.');
        }
        return $apiKey;
    }
}
