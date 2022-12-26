<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Image;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Image::class;
    public function definition()
    {
                    //

            $faker_images = [
                        '1.jpg',
                        '2.jpg',
                        '3.jpg',
                        '4.jpg',
                        '5.jpg',
                        '6.jpg',
                        '7.jpg',
                        '8.jpg',
                        '9.jpg',
                        '10.jpg',
        ];

        return [


            'name' => $this->faker->word(),
            'extension' => 'jpg',
            'path' => 'images/' . $this->faker->randomElement($faker_images),
            // 'path' => '/public/images/' . $this->faker->word() . '.' . 'jpg',
            // 'imageable_id' => 1,
            // 'imageable_type' => 'App\Models\Post'

        ];
    }
}
