<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    // app/Policies/PostPolicy.php

public function view(User $user, Post $post)
{
    return true; // All users can view posts
}

public function create(User $user)
{
    return $user->role === 'admin' || $user->role === 'editor';
}

public function update(User $user, Post $post)
{
    return $user->role === 'admin' || ($user->role === 'editor' && $user->id === $post->user_id);
}

public function delete(User $user, Post $post)
{
    return $user->role === 'admin';
}

}
