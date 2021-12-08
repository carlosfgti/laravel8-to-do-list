<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
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
            'identify' => $this->id,
            'title' => strtolower($this->name),
            'body' => $this->description,
            'completed' => $this->completed ? 'S' : 'N',
            'date' => Carbon::create($this->created_at)->format('Y-m-d'),
        ];
    }
}
