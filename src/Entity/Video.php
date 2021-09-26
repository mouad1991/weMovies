<?php

namespace App\Entity;

class Video
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $key;

    /**
     * @var string
     */
    private $site;

    /**
     * @var string
     */
    private $type;

    /**
     * @var bool
     */
    private $official;

    /**
     * @var string
     */
    private $published_at;

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Video
     */
    public function setName(string $name): Video
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param string $key
     * @return Video
     */
    public function setKey(string $key): Video
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return string
     */
    public function getSite(): string
    {
        return $this->site;
    }

    /**
     * @param string $site
     * @return Video
     */
    public function setSite(string $site): Video
    {
        $this->site = $site;
        return $this;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Video
     */
    public function setType(string $type): Video
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return bool
     */
    public function isOfficial(): bool
    {
        return $this->official;
    }

    /**
     * @param bool $official
     * @return Video
     */
    public function setOfficial(bool $official): Video
    {
        $this->official = $official;
        return $this;
    }

    /**
     * @return string
     */
    public function getPublishedAt(): string
    {
        return $this->published_at;
    }

    /**
     * @param string $published_at
     * @return Video
     */
    public function setPublishedAt(string $published_at): Video
    {
        $this->published_at = $published_at;
        return $this;
    }


}