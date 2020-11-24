<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Post $post)
    {
        return true;
    }

    public function create(User $user)
    {
        return $user->role === 'manager';
    }

    public function update(User $user, Post $post)
    {
        return $user->id === $post->user->id;
    }

    public function delete(User $user, Post $post)
    {
        return $user->id === $post->user->id;
    }

}
