<?php



namespace Database\Seeders;



use Illuminate\Database\Seeder;

use App\Models\User;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;


//Seeder para crear el usuario de administrador a la hora de crear el primer usuario para poder acceder a la aplicacion
class CreateAdminUserSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

        $user = User::create([

            'name' => 'Ivan',

            'email' => 'ivan@ivan.com',

            'password' => bcrypt('matanzas1')

        ]);



        $role = Role::create(['name' => 'Admin']);



        $permissions = Permission::pluck('id', 'id')->all();



        $role->syncPermissions($permissions);



        $user->assignRole([$role->id]);
    }
}
