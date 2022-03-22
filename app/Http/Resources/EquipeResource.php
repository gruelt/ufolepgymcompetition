<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EquipeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'individuel' => $this->individuel,
            'code_categorie' => $this->code_categorie,
            'slug' => $this->slug,
            'genre' => $this->whenLoaded('genre', function () {
                return $this->genre;
            }),
            'niveau' => $this->whenLoaded('niveau', function () {
                return $this->niveau->name;
            }),
            'categorie' => $this->whenLoaded('categorie', function () {
                return $this->categorie->name;
            }),
        ];
    }
}
