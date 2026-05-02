<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      /*  return [
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];*/

        // Generar un nombre de usuario único de al menos 6 caracteres
        $username = $this->faker->unique()->userName();

        // Asegurar que el nombre de usuario tenga al menos 6 caracteres
        while (strlen($username) < 6) {
            $username = $this->faker->unique()->userName();
        }

        return [
            'name' => $this->faker->name(),
            // Genera un email único con el dominio @leo.com
            'email' => 'iam'.$username /*$this->faker->unique()->userName()*//* . '@gmail.com'*/,
            'email_verified_at' => now(),
            'password' => bcrypt('casa1234'), // puedes ajustar la contraseña según tus necesidades
           // 'remember_token' => Str::random(10),
        ];
    }
}
