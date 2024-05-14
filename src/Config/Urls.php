<?php
namespace Guardian\Config;

class Urls
{
    public const BASE_URL = "https://content.guardianapis.com";

    public const URL_MAP = [ "content" => self::BASE_URL."/search",
            "tags" => self::BASE_URL."/tags",
            "sections" => self::BASE_URL."/sections",
            "singleItem" => self::BASE_URL,
            "editions" => self::BASE_URL."/editions"];
}
