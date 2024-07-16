<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /** @mixin \App\Models\Blog */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'date' => $this->date,
            'content' => $this->content,
        ];
    }
}
