<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use BalajiDharma\LaravelMenu\Models\Menu;
use Spatie\Permission\Models\Permission;
use BalajiDharma\LaravelCategory\Models\CategoryType;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class BasicAdminPermissionSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permissions = [
            'permission list',
            'permission create',
            'permission edit',
            'permission delete',
            'role list',
            'role create',
            'role edit',
            'role delete',
            'user list',
            'user create',
            'user edit',
            'user delete',
            'menu list',
            'menu create',
            'menu edit',
            'menu delete',
            'menu.item list',
            'menu.item create',
            'menu.item edit',
            'menu.item delete',
            'category list',
            'category create',
            'category edit',
            'category delete',
            'category.type list',
            'category.type create',
            'category.type edit',
            'category.type delete',
            'category-blog list',
            'category-blog create',
            'category-blog edit',
            'category-blog delete',
            'blog create',
            'blog edit',
            'blog delete',
            'permohonan create',
            'permohonan edit',
            'permohonan delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'pemohon']);
        $role1->givePermissionTo('permission list');
        $role1->givePermissionTo('role list');
        $role1->givePermissionTo('user list');
        $role1->givePermissionTo('menu list');
        $role1->givePermissionTo('menu.item list');

        $role2 = Role::create(['name' => 'admin']);
        foreach ($permissions as $permission) {
            $role2->givePermissionTo($permission);
        }

        // $role3 = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        // $user = \App\Models\User::factory()->create([
        //     'name' => 'Super Admin',
        //     'email' => 'superadmin@example.com',
        // ]);
        // $user->assignRole($role3);

        $user = \App\Models\User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'Pemohon User',
            'email' => 'pemohon@example.com',
        ]);
        $user->assignRole($role1);

        // create menu
        $menu = Menu::create([
            'name' => 'Admin',
            'machine_name' => 'admin',
            'description' => 'Admin Menu',
        ]);

        $menu2 = Menu::create([
            'name' => 'Pemohon',
            'machine_name' => 'pemohon',
            'description' => 'Pemohon Menu',
        ]);

        $menu_items = [
            [
                'name'      => 'Dashboard',
                'uri'       => '/dashboard',
                'enabled'   => 1,
                'weight'    => 0,
            ],
            [
                'name'      => 'Permissions',
                'uri'       => '/<admin>/permission',
                'enabled'   => 1,
                'weight'    => 1,
            ],
            [
                'name'      => 'Roles',
                'uri'       => '/<admin>/role',
                'enabled'   => 1,
                'weight'    => 2,
            ],
            [
                'name'      => 'Users',
                'uri'       => '/<admin>/user',
                'enabled'   => 1,
                'weight'    => 3,
            ],
            [
                'name'      => 'Menus',
                'uri'       => '/<admin>/menu',
                'enabled'   => 1,
                'weight'    => 4,
            ],
            [
                'name'      => 'Categories',
                'uri'       => '/<admin>/category/type',
                'enabled'   => 1,
                'weight'    => 5,
            ],
            [
                'name'      => 'Kategori Pengumuman',
                'uri'       => '/admin/category-blog',
                'enabled'   => 1,
                'weight'    => 6,
            ],
            [
                'name'      => 'Pengumuman',
                'uri'       => '/admin/blog',
                'enabled'   => 1,
                'weight'    => 7,
            ],
            [
                'name'      => 'Permohonan Merek',
                'uri'       => '/admin/permohonan',
                'enabled'   => 1,
                'weight'    => 8,
            ]
        ];

        $menu_items2 = [
            [
                'name'      => 'Dashboard',
                'uri'       => '/<admin>',
                'enabled'   => 1,
                'weight'    => 0,
            ],
            [
                'name'      => 'Pengumuman',
                'uri'       => '/blog',
                'enabled'   => 1,
                'weight'    => 1,
            ],
            [
                'name'      => 'Permohonan Merek',
                'uri'       => '/admin/permohonan',
                'enabled'   => 1,
                'weight'    => 2,
            ]
        ];

        $menu->menuItems()->createMany($menu_items);
        $menu2->menuItems()->createMany($menu_items2);

        CategoryType::create([
            'name' => 'Category',
            'machine_name' => 'category',
            'description' => 'Main Category',
        ]);

        CategoryType::create([
            'name' => 'Tag',
            'machine_name' => 'tag',
            'description' => 'Site Tags',
            'is_flat' => true,
        ]);
    }
}
