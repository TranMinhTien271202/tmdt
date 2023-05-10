<?php

namespace App\Repositories\Repository;

use App\Models\Category;
use App\Repositories\BaseRepository;
use App\Repositories\interface\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository extends BaseRepository implements CategoryRepositoryInterface
{
    public function __construct(Category $category)
    {
        parent::__construct($category);
    }
    //mỗi lần querybuilder phải viết thêm 1 hàm ở đây
    public function abc(): Collection
    {
        return $this->model->where('id', 1)
        ->get();
    }
}
