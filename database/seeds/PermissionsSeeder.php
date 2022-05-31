<?php

    use Illuminate\Database\Seeder;
    use Spatie\Permission\Models\Permission;
    use Spatie\Permission\Models\Role;
    use Spatie\Permission\PermissionRegistrar;

    /* @var $factory \Illuminate\Database\Eloquent\Factory */
    class PermissionsSeeder extends Seeder {

        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            // Reset cached roles and permissions
            app()[PermissionRegistrar::class]->forgetCachedPermissions();

//        Status Permissions
            $permission = Permission::create(['name' => 'view today sale']);
            $permission = Permission::create(['name' => 'view month sale']);
            $permission = Permission::create(['name' => 'view days sale chart']);
            $permission = Permission::create(['name' => 'view months sale chart']);


            // Queries
            $permission = Permission::create(['name' => 'view queries']);
            $permission = Permission::create(['name' => 'create query']);
            $permission = Permission::create(['name' => 'edit query']);
            $permission = Permission::create(['name' => 'delete query']);

            // Courses
            $permission = Permission::create(['name' => 'view courses']);
            $permission = Permission::create(['name' => 'create course']);
            $permission = Permission::create(['name' => 'edit course']);
            $permission = Permission::create(['name' => 'delete course']);

            // Batches
            $permission = Permission::create(['name' => 'view batches']);
            $permission = Permission::create(['name' => 'create batch']);
            $permission = Permission::create(['name' => 'edit batch']);
            $permission = Permission::create(['name' => 'delete batch']);

            //Admissions
            $permission = Permission::create(['name' => 'view admissions']);
            $permission = Permission::create(['name' => 'create admission']);
            $permission = Permission::create(['name' => 'edit admission']);
            $permission = Permission::create(['name' => 'delete admission']);

            // Finance Recoveries
            $permission = Permission::create(['name' => 'view recoveries']);
            $permission = Permission::create(['name' => 'create recovery']);
            $permission = Permission::create(['name' => 'edit recovery']);
            $permission = Permission::create(['name' => 'delete recovery']);

            // Create Roles & Users
            $permission = Permission::create(['name' => 'view staffUsers']);
            $permission = Permission::create(['name' => 'create staffUser']);
            $permission = Permission::create(['name' => 'edit staffUser']);
            $permission = Permission::create(['name' => 'delete staffUser']);

            $permission = Permission::create(['name' => 'view roles']);
            $permission = Permission::create(['name' => 'create role']);
            $permission = Permission::create(['name' => 'edit role']);
            $permission = Permission::create(['name' => 'delete role']);


            // create roles and assign existing permissions
            $role1 = Role::create(['name' => 'Instructor']);
            $role1->givePermissionTo('view admissions');

            $role2 = Role::create(['name' => 'Admin']);
            $role2->givePermissionTo('view queries', 'create query', 'edit query', 'delete query', 'view today sale', 'view month sale', 'view days sale chart', 'view months sale chart');

            $role3 = Role::create(['name' => 'super-admin']);
            // gets all permissions via Gate::before rule; see AuthServiceProvider

            // create demo users
            $user = factory(\App\User::class)->create([
                                                          'name'  => 'Instructor',
                                                          'email' => 'instructor@mail.com',
                                                      ]);
            $user->assignRole($role1);

            $user = factory(\App\User::class)->create([
                                                          'name'  => 'Admin',
                                                          'email' => 'admin@mail.com',
                                                      ]);
            $user->assignRole($role2);

            $user = factory(\App\User::class)->create([
                                                          'name'  => 'Example Super-Admin User',
                                                          'email' => 'superadmin@mail.com',
                                                      ]);
            $user->assignRole($role3);
        }
    }
