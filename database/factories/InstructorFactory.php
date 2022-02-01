<?php

namespace Database\Factories;
use App\Models\Instructor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator;


class InstructorFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Instructor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = new Generator();
        $faker->addProvider(new \Faker\Provider\en_US\Person($faker));

        $gender = $faker->randomElements(['male', 'female']);

        return [
            'inst_empNo' => $faker->numerify('EMP-#######-####'),
            'inst_prefix' => $faker->optional()->title($gender),
            'inst_firstName' => $faker->firstName($gender),
            'inst_middleName' => $faker->optional()->lastName($gender),
            'inst_lastName' => $faker->lastName($gender),
            'inst_suffix' => $faker->optional()->suffix()
        ];
    }
}
