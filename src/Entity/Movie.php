<?php

namespace App\Entity;

class Movie
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var bool
     */
    private $adult;

    /**
     * @var string
     */
    private $backdrop_path;

    /**
     * @var string
     */
    private $original_language;

    /**
     * @var string
     */
    private $original_title;

    /**
     * @var string
     */
    private $overview;

    /**
     * @var float
     */
    private $popularity;

    /**
     * @var string
     */
    private $poster_path;

    /**
     * @var string
     */
    private $release_date;

    /**
     * @var string
     */
    private $title;

    /**
     * @var bool
     */
    private $video;

    /**
     * @var float
     */
    private $vote_average;

    /**
     * @var int
     */
    private $vote_count;

    /**
     * @var array
     */
    private $genre_ids;

    /**
     * @var Genre[]
     */
    private $genres;

    /**
     * @var Video[]
     */
    private $videos;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Movie
     */
    public function setId(int $id): Movie
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return bool
     */
    public function isAdult(): bool
    {
        return $this->adult;
    }

    /**
     * @param bool $adult
     * @return Movie
     */
    public function setAdult(bool $adult): Movie
    {
        $this->adult = $adult;
        return $this;
    }

    /**
     * @return string
     */
    public function getBackdropPath(): string
    {
        return $this->backdrop_path;
    }

    /**
     * @param string $backdrop_path
     * @return Movie
     */
    public function setBackdropPath(string $backdrop_path): Movie
    {
        $this->backdrop_path = $backdrop_path;
        return $this;
    }

    /**
     * @return string
     */
    public function getOriginalLanguage(): string
    {
        return $this->original_language;
    }

    /**
     * @param string $original_language
     * @return Movie
     */
    public function setOriginalLanguage(string $original_language): Movie
    {
        $this->original_language = $original_language;
        return $this;
    }

    /**
     * @return string
     */
    public function getOriginalTitle(): string
    {
        return $this->original_title;
    }

    /**
     * @param string $original_title
     * @return Movie
     */
    public function setOriginalTitle(string $original_title): Movie
    {
        $this->original_title = $original_title;
        return $this;
    }

    /**
     * @return string
     */
    public function getOverview(): string
    {
        return $this->overview;
    }

    /**
     * @param string $overview
     * @return Movie
     */
    public function setOverview(string $overview): Movie
    {
        $this->overview = $overview;
        return $this;
    }

    /**
     * @return float
     */
    public function getPopularity(): float
    {
        return $this->popularity;
    }

    /**
     * @param float $popularity
     * @return Movie
     */
    public function setPopularity(float $popularity): Movie
    {
        $this->popularity = $popularity;
        return $this;
    }

    /**
     * @return string
     */
    public function getPosterPath(): string
    {
        return $this->poster_path;
    }

    /**
     * @param string $poster_path
     * @return Movie
     */
    public function setPosterPath(string $poster_path): Movie
    {
        $this->poster_path = $poster_path;
        return $this;
    }

    /**
     * @return string
     */
    public function getReleaseDate(): string
    {
        return $this->release_date;
    }

    /**
     * @param string $release_date
     * @return Movie
     */
    public function setReleaseDate(string $release_date): Movie
    {
        $this->release_date = $release_date;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Movie
     */
    public function setTitle(string $title): Movie
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return bool
     */
    public function isVideo(): bool
    {
        return $this->video;
    }

    /**
     * @param bool $video
     * @return Movie
     */
    public function setVideo(bool $video): Movie
    {
        $this->video = $video;
        return $this;
    }

    /**
     * @return float
     */
    public function getVoteAverage(): float
    {
        return $this->vote_average;
    }

    /**
     * @param float $vote_average
     * @return Movie
     */
    public function setVoteAverage(float $vote_average): Movie
    {
        $this->vote_average = $vote_average;
        return $this;
    }

    /**
     * @return int
     */
    public function getVoteCount(): int
    {
        return $this->vote_count;
    }

    /**
     * @param int $vote_count
     * @return Movie
     */
    public function setVoteCount(int $vote_count): Movie
    {
        $this->vote_count = $vote_count;
        return $this;
    }

    /**
     * @return array
     */
    public function getGenreIds(): array
    {
        return $this->genre_ids;
    }

    /**
     * @param array $genre_ids
     * @return Movie
     */
    public function setGenreIds(array $genre_ids): Movie
    {
        $this->genre_ids = $genre_ids;
        return $this;
    }

    /**
     * @return string
     */
    public function getPosterUrl(): string
    {
        return $_ENV['IMAGE_URL'] . 'w200' . $this->poster_path;
    }

    /**
     * @return Genre[]
     */
    public function getGenres(): array
    {
        return $this->genres;
    }

    /**
     * @param Genre[] $genres
     * @return Movie
     */
    public function setGenres(array $genres): Movie
    {
        $this->genres = $genres;
        return $this;
    }

    /**
     * @return Video[]
     */
    public function getVideos(): array
    {
        return $this->videos;
    }

    /**
     * @param Video[] $videos
     * @return Movie
     */
    public function setVideos(array $videos): Movie
    {
        $this->videos = $videos;
        return $this;
    }

}