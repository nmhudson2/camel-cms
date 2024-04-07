<?php

namespace App\Http\Resources;

use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'author' => $this->author,
            'slug' => $this->page_slug,
            'contents' => json_decode($this->text_contents, true)
        ];
    }
}
