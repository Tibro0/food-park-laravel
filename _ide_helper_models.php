<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category query()
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $key
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SectionTitle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SectionTitle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SectionTitle query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SectionTitle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SectionTitle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SectionTitle whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SectionTitle whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|SectionTitle whereValue($value)
 */
	class SectionTitle extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $image
 * @property string|null $offer
 * @property string $title
 * @property string $sub_title
 * @property string $short_description
 * @property string|null $button_link
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereButtonLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereOffer($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereSubTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Slider whereUpdatedAt($value)
 */
	class Slider extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $avatar
 * @property string $name
 * @property string $email
 * @property string $role
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $icon
 * @property string $title
 * @property string $short_description
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WhyChooseUs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WhyChooseUs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WhyChooseUs query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WhyChooseUs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WhyChooseUs whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WhyChooseUs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WhyChooseUs whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WhyChooseUs whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WhyChooseUs whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|WhyChooseUs whereUpdatedAt($value)
 */
	class WhyChooseUs extends \Eloquent {}
}

