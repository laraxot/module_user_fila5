<?php

declare(strict_types=1);

namespace Modules\User\Models\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Modules\Comment\Models\Comment;
use Modules\Comment\Models\CommentNotificationSubscription;
use Modules\Comment\Models\Reaction;
use Modules\Comment\Support\CommentConfig;

trait HasCommentatorRelations
{
    /**
     * @return MorphMany<Comment, $this>
     */
    public function commentatorComments(): MorphMany
    {
        return $this->morphMany(CommentConfig::commentModelClass(), 'commentator');
    }

    /**
     * @return MorphMany<CommentNotificationSubscription, $this>
     */
    public function subscriberNotificationSubscriptions(): MorphMany
    {
        return $this->morphMany(CommentConfig::commentNotificationSubscriptionModelClass(), 'subscriber');
    }

    /**
     * @return MorphMany<Reaction, $this>
     */
    public function reactions(): MorphMany
    {
        return $this->morphMany(CommentConfig::reactionModelClass(), 'commentator');
    }
}
