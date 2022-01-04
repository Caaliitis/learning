<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property User $user_id
 * @property Carbon $published_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Post extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    public $table = 'posts';

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @param string $title
     * @param string $body
     * @param User $user
     * @return Post
     */
    public function create(string $title, string $body, User $user): Post {
        $post = new Post();
        $post->title = $title;
        $post->body = $body;
        $post->user_id = $user->id;
        $post->published_at = Carbon::now();
        $post->save();

        return $post;
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
