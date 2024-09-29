<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class permissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'عرض المستخدمين',
            'اضافة مستخدم',
            'تعديل مستخدم',
            'حذف مستخدم',

            'عرض الصلاحيات',
            'اضافة صلاحية',
            'تعديل صلاحية',
            'حذف صلاحية',

            'عرض الرحلات',
            'اضافة رحلة',
            'تعديل رحلة',
            'حذف رحلة',
            'عرض حجوزات الرحلة',


            'عرض الحجاج',
            'اضافة حاج',
            'تعديل حاج',
            'حذف حاج',
            'عرض حجوزات الحاج',


            'عرض المكاتب',
            'اضافة مكتب',
            'تعديل مكتب',
            'حذف مكتب',


            'عرض الحجوزات',
            'اضافة حجز',
            'تعديل حجز',
            'حذف حجز',
            'قبول ورفض حجز',
            'عرض مدفوعات الحجز',


            'عرض المدفوعات',
            'اضافة دفع',
            'تعديل دفع',
            'حذف دفع',

            'عرض الاحصائيات',


        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}

// php artisan db:seed --class=PermissionTableSeeder