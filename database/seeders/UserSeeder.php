<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'first user',
            'email' => 'firstuser@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $permissions = ['job-divisi', 'job-category', 'users', 'access'];
        
        foreach ($permissions as $key => $value) {
            Permission::create(['guard_name' => 'api', 'name' => $value]);
        }

        $role = Role::create(['guard_name' => 'api', 'name' => 'super user']);
        $role->syncPermissions($permissions);
        
        $user = User::find(1);
        $user->guard(['api'])->assignRole($role);
    }
}