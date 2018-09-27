<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Upload::class, function (Faker $faker) {
    $extension = $faker->fileExtension;

    return [
        'filename' => $faker->sha1 . '.' . $extension,
        'extension' => $extension,
        'original_filename' => $faker->bs . '.' . $extension,
        'mimetype' => $faker->mimeType,
        'size' => $faker->numberBetween(10, 1024 * 1024 * 8)
    ];
});
