<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PapierCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'date_debut' => $this->date_debut,
            'date_fin' => $this->date_fin,
            'description' => $this->description,
            'etat' => $this->etat,
            'camion' => $this->Camion->matricule,  // This line has an issue with the camel case.
        ];
    }
}
