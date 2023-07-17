# The Guardian API PHP Client

PHP client library for the Guardian APIs. See documentation [here](https://open-platform.theguardian.com/documentation/).
All available API modules are supported - Content, Tags, Sections, Editions, and Single Item.

### Get API key

Sign up for an API key [here](https://open-platform.theguardian.com/access)

### Making Requests

The primary `Guardian\GuardianAPI` class is a factory class that creates objects for each of the API modules, allowing you to make requests to any of them with your desired request parameters. You have to first create an object for it, then access your desired API module via the object. See the code snippets below:

```php
$api = new Guardian\GuardianAPI(THE_GUARDIAN_API_KEY);
```

**For Content:**

```php
$response = $api->content()
    ->setQuery("12 years a slave")
    ->setTag("film/film,tone/reviews")
    ->setFromDate(new DateTimeImmutable("01/01/2010"))
    ->setToDate(new \DateTimeImmutable())
    ->setShowTags("contributor")
    ->setShowFields("starRating,headline,thumbnail,short-url")
    ->setOrderBy("relevance")
    ->fetch();
```

**For Tags:**

```php
$response = $api->tags()
    ->setQuery("apple")
    ->setSection("technology")
    ->setShowReferences("all")
    ->fetch();
```

**For Sections:**

```php
$response = $api->sections()
    ->setQuery("business")
    ->fetch();
```

**For Editions:**

```php
$response = $api->editions()
    ->setQuery("uk")
    ->fetch();
```

**For Single Item:**

```php
$response = $api->singleItem()
    ->setId("/sport/2022/oct/07/cricket-jos-buttler-primed-for-england-comeback-while-phil-salt-stays-focused")
    ->setShowStoryPackage(true)
    ->setShowEditorsPicks(true)
    ->setShowMostViewed(true)
    ->setShowRelated(true)
    ->fetch();
```
