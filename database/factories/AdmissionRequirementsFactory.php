<?php

namespace Database\Factories;

use App\Models\AdmissionRequirements;
use Faker\Generator;

use Illuminate\Database\Eloquent\Factories\Factory;

class AdmissionRequirementsFactory extends Factory
{

      /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AdmissionRequirements::class;


    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = new Generator();
        $faker->addProvider(new \Faker\Provider\Lorem($faker));

        $name_digits = $faker->numberBetween(1, 3);
        $desc_digits = $faker->numberBetween(1, 2);

        return [
            'adre_docuCode' => $faker->numerify('REQ-#######'),
            'adre_docuName' => $faker->words($name_digits, true),
            'adre_docuDescription' => $faker->optional()->sentences($desc_digits, true),
        ];
    }
}
