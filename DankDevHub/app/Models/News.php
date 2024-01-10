<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'cover_image', 'content', 'publishing_date'];

    public function addNews($data)
    {
        return $this->create($data);
    }

    public function editNews($id, $data)
    {
        return $this->where('id', $id)->update($data);
    }

    public function deleteNews($id)
    {
        return $this->where('id', $id)->delete();
    }

    public function getAllNews()
    {
        return $this->orderBy('publishing_date', 'desc')->get();
    }
}
