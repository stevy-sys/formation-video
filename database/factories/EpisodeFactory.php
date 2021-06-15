<?php

namespace Database\Factories;

use Faker\Factory as FactoryYoutube;
use App\Models\Course;
use App\Models\Episode;
use Illuminate\Database\Eloquent\Factories\Factory;

class EpisodeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Episode::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = FactoryYoutube::create();
        $faker->addProvider(new \Faker\Provider\Youtube($faker));

        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraphs(3,true),
            'video_url' => $faker->youtubeUri(), /*'mavideo.com'.rand(10,255)*/
            'course_id' => Course::all()->random()->id //recuperer des id user par defaut
        ];
    }
}
