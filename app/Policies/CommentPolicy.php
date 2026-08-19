<?php

namespace App\Policies;

use App\Models\Comment;
use App\Models\User;

class CommentPolicy
{
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Comment $comment): bool
    {
        return $user->getKey() === $comment->commenter_id
            && $user->getMorphClass() === $comment->commenter_type;
    }

    public function delete(User $user, Comment $comment): bool
    {
        return $user->getKey() === $comment->commenter_id
            && $user->getMorphClass() === $comment->commenter_type;
    }

    public function reply(User $user, Comment $comment): bool
    {
        return $comment->canReply();
    }

    public function pin(User $user, Comment $comment): bool
    {
        return false;
    }

    public function moderate(User $user, Comment $comment): bool
    {
        return $user->admin();
    }
}
