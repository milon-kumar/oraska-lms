<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $super_admin = Role::create(['name'=>'Super_Admin']);
        Role::create(['name'=>'Teacher']);
        Role::create(['name'=>'Official']);

        $all_permissions =[
          [
            'module'=>'Dashboard',
            'permissions'=>[
                'Dashboard.View',
            ]
          ],
          [
            'module'=>'Category',
            'permissions'=>[
                'Category.List',
                'Category.Create',
                'Category.Show',
                'Category.Edit',
                'Category.Delete'
            ]
          ],
          [
            'module'=>'Course',
            'permissions'=>[
                'Course.List',
                'Course.Create',
                'Course.Copy',
                'Course.Show',
                'Course.Edit_Content',
                'Course.Delete',
                'Course.Status',
                'Course.Price'
            ]
          ],
          [
            'module'=>'Course Details',
            'permissions'=>[
                'CourseDetails.Create',
                'CourseDetails.Edit',
                'CourseDetails.Show'
            ]
          ],
          [
            'module'=>'Classes',
            'permissions'=>[
                'Class.List',
                'Class.Create',
                'Class.Edit',
                'Class.View',
                'Class.Delete',
                'Class.Attendance',
            ]
          ],
          [
            'module'=>'Videos',
            'permissions'=>[
                'Videos.List',
                'Videos.Create',
                'Videos.Edit',
                'Videos.View',
                'Videos.Delete'
            ]
          ],
          [
            'module'=>'Exam',
            'permissions'=>[
                'Exam.Dashboard',
                'Exam.List',
                'Exam.Create',
                'Exam.Edit',
                'Exam.Delete',
                'Exam.Free_Result',
            ]
          ],
          [
            'module'=>'Class Attendance',
            'permissions'=>[
                'ClassAttendance.List',
            ]
          ],
          [
            'module'=>'Comment',
            'permissions'=>[
                'Comment.List',
                'Comment.Show',
                'Comment.Create',
                'Comment.Delete',
                'Comment.Status',
            ]
          ],
          [
            'module'=>'Community Post',
            'permissions'=>[
                'Post.List',
                'Post.Show',
                'Post.Create',
                'Post.Delete',
                'Post.Status',
            ]
          ],
          [
            'module'=>'Complain Box',
            'permissions'=>[
                'Complain.List',
                'Complain.Show',
                'Complain.Create',
                'Complain.Delete',
                'Complain.Status',
            ]
          ],
          [
            'module'=>'Student',
            'permissions'=>[
                'Student.List',
                'Student.Show',
                'Student.Create',
                'Student.Delete',
                'Student.Status',
                'Student.Dashboard_Download',
            ]
          ],
          [
            'module'=>'Enrolment ',
            'permissions'=>[
                'Enroll.List',
                'Enroll.Create',
                'Enroll.Status',
            ]
          ],
          [
            'module'=>'Role Management ',
            'permissions'=>[
                'Role.List',
                'Role.Create',
                'Role.Edit',
                'Role.Delete',
            ]
          ],
          [
            'module'=>'User Management ',
            'permissions'=>[
                'User.List',
                'User.Create',
                'User.Edit',
                'User.Delete',
            ]
          ],
          [
            'module'=>'Teacher Management ',
            'permissions'=>[
                'Teacher.List',
                'Teacher.Create',
                'Teacher.Edit',
                'Teacher.Delete',
            ]
          ],
          [
            'module'=>'Live Management ',
            'permissions'=>[
                'Live.Go_To_Live',
                'Live.Set_Live_Timing',
                'FB_Group_Live',
                'FB_Group_Access_Code',
                'Push_Notifaction',
            ]
          ],
          [
            'module'=>'Slider Management ',
            'permissions'=>[
                'Slider.List',
                'Slider.Create',
                'Slider.Edit',
                'Slider.Delete',
            ]
          ],
          [
            'module'=>'Student Opinion',
            'permissions'=>[
                'Opinion.List',
                'Opinion.Create',
                'Opinion.Edit',
                'Opinion.Delete',
            ]
          ],
          [
            'module'=>'Settings',
            'permissions'=>[
                'Our_Talk',
                'Setting',
                'Setting.Account',
                'Setting.Basic',
            ]
          ],
        ];

        foreach ($all_permissions as $permissions){
            $module = $permissions['module'];
            foreach ($permissions['permissions'] as $permission){
                $storePermission = Permission::create([
                    'name'=>$permission,
                    'module'=>$module,
                ]);
                $super_admin->givePermissionTo($storePermission);
                $storePermission->assignRole($super_admin);
            }
        }
        $admin = User::where('type','super_admin')->first();
        $admin->assignRole($super_admin);
    }
}
