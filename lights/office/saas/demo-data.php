<?php

use App\Models\Transaction;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

function office_create_saas_demo_data($user)
{

    $workspace_names = [
        'Opera Inc.',
        'Alex Tutorial Home',
        'Mark Next Inc.',
        'High Space',
        'Orion Tech',
        'One Language School',
        'Save the Climate',
        'We Garden',
    ];

    $workspaces = [];

    foreach ($workspace_names as $name) {
        $workspace = new Workspace();
        $workspace->uuid = Str::uuid();
        $workspace->name = $name;
        $workspace->save();

        $workspaces[] = $workspace;

    }

    $faker = Faker\Factory::create();

    $users = [];

    foreach ($workspaces as $workspace)
    {

        $user = new User();
        $user->first_name = $faker->firstName;
        $user->last_name = $faker->lastName;
        $user->uuid = Str::uuid();
        $user->email = $faker->email;
        $user->phone = $faker->phoneNumber;
        $user->password = Hash::make('123456');
        $user->is_super_admin = 0;
        $user->workspace_id = $workspace->id;

        // created at random date in 30 days

        $user->created_at = $faker->dateTimeBetween('-30 days', 'now');

        $user->last_login_at = $faker->dateTimeBetween($user->created_at, 'now');

        $user->save();

        $workspace->owner_id = $user->id;
        $workspace->save();

        $users[] = $user;

    }

    foreach ($users as $user)
    {
        for($i = 0; $i < 2; $i++)
        {
            $transaction = new Transaction();
            $transaction->uuid = Str::uuid();
            $transaction->user_id = $user->id;
            $transaction->workspace_id = $user->workspace_id;
            $transaction->amount = $faker->randomFloat(2, 0, 1000);
            $transaction->created_at = $faker->dateTimeBetween('-30 days', 'now');
            $transaction->save();
        }
    }

}
