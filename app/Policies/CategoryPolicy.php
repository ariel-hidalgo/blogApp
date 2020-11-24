<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Category $category)
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->role === 'manager';
    }

    public function update(User $user, Category $category)
    {
        return $user->id === $category->user->id;
    }

    public function delete(User $user, Category $category)
    {
        return $user->id === $category->user->id;
    }
}
