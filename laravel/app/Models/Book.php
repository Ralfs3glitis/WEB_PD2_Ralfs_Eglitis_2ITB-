<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'author_id',
        'genre_id',
        'description',
        'price',
        'year',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class);
    }
    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }
    public function jsonSerialize(): array
{
    return [
        'id' => intval($this->id),
        'name' => $this->name,
        'description' => $this->description,
        'author' => $this->author->name,
        'genre' => $this->genre->name,
        'price' => number_format($this->price, 2),
        'year' => intval($this->year),
        'image' => asset('images/' . $this->image),
    ];
}

}
