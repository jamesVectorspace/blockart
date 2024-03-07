<?php

namespace Modules\OpenAI\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\OpenAI\Entities\{
    Image
};

class ImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'parent_id' => $this->parent_id,
            'user' => optional($this->user)->name,
            'originalName' => $this->original_name,
            'imageUrl' => $this->groupImagesByCreatedAt(),
            'name' => $this->name,
            'slug' => $this->slug,
            'size' => $this->size,
            'artStyle' => $this->art_style,
            'lightingStyle' => $this->lighting_style,
            'created_at' => $this->created_at,
            'libraries' => $this->libraries,
        ];
    }
    
    /**
     * check multiple object or a single attribute
     * @return array|string
     */
    protected function groupImagesByCreatedAt()
    {
        $query = Image::where('created_at', $this->created_at);
        $images = $query->get();

        $response = $images->count() > 1
            ? $images->map(fn ($item) => ['id' => $item->id, 'url' => $item->imageUrl()])
            : $images->first()->imageUrl();

        return $response;
    }
}
