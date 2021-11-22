<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Company::class;

    public function definition()
    {

        return [
            'name' => $this->faker->company,
            'email' => $this->faker->unique()->safeEmail,
            'website' => $this->faker->url,
            'logo_file_path' =>  ltrim($this->faker->image('storage/app/public', 256,256,null), 'storage/app/public')
        ];
    }
}
