<?php



namespace Database\Seeders;



use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;


//Seeder con los permisos que se le daran a los roles
class PermissionTableSeeder extends Seeder

{

    /**

     * Run the database seeds.

     *

     * @return void

     */

    public function run()

    {

        $permissions = [

            'role-list',

            'role-create',

            'role-edit',

            'role-delete',

            'alumnos-list',

            'alumnos-create',

            'alumnos-edit',

            'alumnos-delete',

            'mostrado-home'

        ];



        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);
        }
    }
}
