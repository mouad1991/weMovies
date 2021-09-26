<?php

namespace App\Service;

use App\Entity\Genre;
use App\Entity\Movie;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class TheMovieDbService
{
    private $themoviedbClient;
    private $apiUrl;
    private $serializer;

    public function __construct(HttpClientInterface $themoviedbClient, string $apiUrl)
    {
        $this->themoviedbClient = $themoviedbClient;
        $this->apiUrl           = $apiUrl;
        $this->serializer       = new Serializer(
                                        [new ObjectNormalizer(), new ArrayDenormalizer()],
                                        [new JsonEncoder()]
                                    );
    }

    /**
     * @return Genre[]
     */
    public function getListMovieGenre(): Array
    {
        $response = $this->themoviedbClient->request('GET', $this->apiUrl.'genre/movie/list');
        $data     = json_decode($response->getContent(), true)['genres'];
        return  $this->serializer->denormalize($data, 'App\Entity\Genre[]');
    }

    /**
     * @param string|null $genreId
     * @param int|null $page
     * @return Movie[]
     */
    public function getListMovie(?string $genreId, ?int $page): array
    {
        $response = $this->themoviedbClient->request('GET', $this->apiUrl.'discover/movie',[
                    'query' => [
                        'sort_by'            => 'vote_average.desc',
                        'vote_count.gte'     => '3000',
                        'page'               => $page,
                        'with_genres'        => $genreId
                    ]
                ]
        );
        $content            = json_decode($response->getContent(), true);
        $data['movies']     = $this->serializer->denormalize($content['results'], 'App\Entity\Movie[]');
        $pupularMovies      = $this->getPopular();
        $data['popular']    = $this->getMovieDetails($pupularMovies[array_rand($pupularMovies, 1)]['id']);
        $data['pagination'] = [
            'page'        => $content['page'],
            'total_pages' => $content['total_pages']
        ];
        return  $data;
    }

    /**
     * @param int $id
     * @return Movie
     */
    public function getMovieDetails(int $id): Movie
    {
        $response = $this->themoviedbClient->request('GET', $this->apiUrl.'movie/'.$id,[
                'query' => [
                    'append_to_response' => 'videos'
                ]
            ]
        );
        $content  = json_decode($response->getContent(), true);
        $movie    = $this->serializer->denormalize($content, Movie::class, 'json');
        $movie->setGenres($this->serializer->denormalize($content['genres'], 'App\Entity\Genre[]'));
        $movie->setVideos($this->serializer->denormalize($content['videos']['results'], 'App\Entity\Video[]'));
        return $movie;
    }

    /**
     * @return array
     */
    private function getPopular(): array
    {
        $response = $this->themoviedbClient->request('GET', $this->apiUrl.'movie/popular');
        return json_decode($response->getContent(), true)['results'];
    }
}