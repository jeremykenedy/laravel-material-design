<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tags';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * Fillable fields for a Profile.
     *
     * @var array
     */
    protected $fillable = [
        'tag',
        'title',
        'subtitle',
        'page_image',
        'meta_description',
        'reverse_direction',
    ];

    /**
     * The many-to-many relationship between tags and font end pages.
     *
     * @return BelongsToMany
     */
    public function pages()
    {
        return $this->belongsToMany('App\Models\FrontEndPage', 'front_end_page_tag_pivot');
    }

    /**
     * Add any tags needed from the list
     *
     * @param array $tags List of tags to check/add
     */
    public static function addNeededTags(array $tags)
    {
        if (count($tags) === 0) {
          return;
        }

        $found = static::whereIn('tag', $tags)->pluck('tag')->all();

        foreach (array_diff($tags, $found) as $tag) {
            static::create([
                'tag' => $tag,
                'title' => $tag,
                'subtitle' => 'Articles tagged: '.$tag,
                'page_image' => '',
                'meta_description' => '',
                'reverse_direction' => false,
            ]);
        }
    }

    /**
     * Return the index layout to use for a tag
     *
     * @param string $tag
     * @param string $default
     *
     * @return string
     */
    public static function layout($tag, $default = 'front-end.pages.page-dynamic')
    {
        $layout = static::whereTag($tag)->pluck('layout');

        return $layout ?: $default;
    }

}
