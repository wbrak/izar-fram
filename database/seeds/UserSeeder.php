<?php

use Faker\Factory;
use IzarFramework\Http\Middleware\BCrypt;
use Phinx\Seed\AbstractSeed;

/**
 * Class UserSeeder
 */
class UserSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        {
            // Create 20 user with password 'secret'
            $faker = Factory::create();
            $bCrypt = new BCrypt;
            $data = [];
            for ($i = 0; $i < 20; $i++)
            {
                $data[] = [
                    'name'        => $faker->name,
                    'email'       => $faker->email,
                    'password'    => $bCrypt->hash_password('secret'),
                    'created_at' => date('Y-m-d H:i:s'),
                ];
            }

            $this->insert('users', $data);
        }
    }
}
