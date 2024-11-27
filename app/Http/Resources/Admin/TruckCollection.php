<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TruckCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->map(function ($truck) {
                return [
                    'id' => $truck->id,
                    'matricule' => $truck->matricule,
                    'consommation' => $truck->consommation,
                    'marque' => $truck->marque,
                    'genre' => $truck->genre,
                    'type_carburant' => $truck->type_carburant,
                ];
            }),
            // Ensure links are an array of pagination links (this is automatically generated by Laravel)
            'links' => $this->resource->links(),
            'meta' => [
                'current_page' => $this->currentPage(),
                'per_page' => $this->perPage(),
                'total' => $this->total(),
                'last_page' => $this->lastPage(),
            ],
        ];
    }
}
