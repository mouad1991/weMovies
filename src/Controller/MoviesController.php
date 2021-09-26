<?php

namespace App\Controller;

use App\Service\TheMovieDbService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    private $themoviedbService;

    public function __construct(TheMovieDbService $themoviedbService)
    {
        $this->themoviedbService = $themoviedbService;
    }

    /**
     * @Route("movies", name="movies.index")
     * @return Response
     */
    public function index(Request $request): Response
    {
        $genreIds = $request->get('genreIds');
        $page     = $request->get('page');
        $genres   = $this->themoviedbService->getListMovieGenre();
        $data     = $this->themoviedbService->getListMovie($genreIds, $page);
        return $this->render('movies/index.html.twig', compact('genreIds', 'genres', 'data'));
    }

    /**
     * @Route("movies/{id}", name="movies.show", requirements={"id": "[0-9]*"})
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $movie = $this->themoviedbService->getMovieDetails($id);
        $view  = $this->renderView('movies/details.html.twig', compact('movie'));
        return $this->json([
            'html' => $view
        ]);
    }
}
