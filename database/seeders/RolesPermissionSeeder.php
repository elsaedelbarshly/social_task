<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission1 = Permission::create(['name'=>'add_react']);
        $permission2 = Permission::create(['name'=>'remove_react']);
        $permission3 = Permission::create(['name'=>'list_frind']);
        $permission4 = Permission::create(['name'=>'add_friend_to_groupe']);
        $permission5 = Permission::create(['name'=>'remove_friend_to_groupe']);

        Permission::create(['name' => 'list posts']);
        Permission::create(['name' => 'create post']);
        Permission::create(['name' => 'update post']);
        Permission::create(['name' => 'delete post']);
        Permission::create(['name' => 'delete close friend']);

        Permission::create(['name' => 'list_comment']);
        Permission::create(['name' => 'update_comment']);
        Permission::create(['name' => 'create_comment']);
        Permission::create(['name' => 'delete_comment']);

        $role1 = Role::create(['name'=>'User']);
        $role2 = Role::create(['name' => 'admin']);



        $role1->givePermissionTo( $permission1);
        $role1->givePermissionTo( $permission2);
        $role1->givePermissionTo( $permission3);
        $role1->givePermissionTo( $permission4);
        $role1->givePermissionTo( $permission5);



        $role1->givePermissionTo('list_comment');
        $role1->givePermissionTo('update_comment');
        $role1->givePermissionTo('create_comment');
        $role1->givePermissionTo('delete_comment');
        $role2->givePermissionTo('list_comment');

        $role1->givePermissionTo('list posts');
        $role1->givePermissionTo('create post');
        $role1->givePermissionTo('update post');
        $role1->givePermissionTo('delete post');
        $role1->givePermissionTo('delete close friend');
    }
}
