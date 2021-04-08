<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Airport;
use Illuminate\Http\JsonResponse;
use App\Repositories\FlightRepository;
use App\Http\Requests\Api\SearchRequest;
use App\Http\Resources\Api\FlightsSearchResponseResource;
use App\Http\Resources\Api\FlightsSearchRequestResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class FlightController extends Controller
{
    protected FlightRepository $flightRepository;

    /**
     * FlightController constructor.
     *
     * @param FlightRepository $flightRepository
     */
    public function __construct(FlightRepository $flightRepository)
    {
        $this->flightRepository = $flightRepository;
    }

    /**
     * @param SearchRequest $request
     *
     * @return JsonResponse
     */
    public function search(SearchRequest $request): JsonResponse
    {
        $departureAirport = Airport::whereCode($request->searchQuery['departureAirport'])->first();
        $arrivalAirport   = Airport::whereCode($request->searchQuery['arrivalAirport'])->first();
        $flights          = $this->flightRepository->search($departureAirport->id, $arrivalAirport->id, $request->searchQuery['departureDate']);

        if (!count($flights)) {
            return new JsonResponse(["Error" => "No flights found"]);
        }

        return new JsonResponse([
            "searchRequest" => FlightsSearchRequestResource::make($request->searchQuery),
            "searchResults" => FlightsSearchResponseResource::collection($flights),
        ]);
    }
}
