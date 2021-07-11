<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
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
           'view-all-requests',
           'add-blood-info',
           'request-blood-sample'
        ];
        
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}