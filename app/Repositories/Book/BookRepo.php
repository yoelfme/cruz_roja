<?php
namespace App\Repositories\Book;

use App\Models\Book;
use App\Repositories\Base\BaseRepo;

class BookRepo extends BaseRepo
{
    public function getModel()
    {
        return new Book();
    }
}