<?php

use Illuminate\Database\Seeder;
use App\User;
use App\UserRight;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::truncate();

        $user=new User;
        $user->surname = 'Administrator';
        $user->email = 'admin@smis.com';
        $user->username = 'admin';
        $user->role = 'Superuser';
        $user->password = bcrypt('admin');
        $user->save();

        UserRight::truncate();

        for($i=1; $i<= 20; $i++)
        {
            $user_right=new UserRight;
            $user_right->user_id=$user->id;
            $user_right->module=$i;
            $user_right->can_access='Y';
            $user_right->can_edit='Y';
            $user_right->save();
        }


    }
}
