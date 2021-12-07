<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('permissions')->delete();
        DB::statement("ALTER TABLE permissions AUTO_INCREMENT =  1");
        DB::table('permissions')->insert([
            [
                'name'         => 'Quản Lý Danh Mục',
                'display_name' => 'Quản Lý Danh Mục',
                'parent_id'    => '0',
                'key_code'     => ''
            ],
            [
                'name'         => 'Danh sách danh mục',
                'display_name' => 'Danh sách danh mục',
                'parent_id'    => '1',
                'key_code'     => 'view-categories'
            ],
            [
                'name'         => 'Thêm danh mục',
                'display_name' => 'Thêm danh mục',
                'parent_id'    => '1',
                'key_code'     => 'create-categories'
            ],
            [
                'name'         => 'Sửa danh mục',
                'display_name' => 'Sửa danh mục',
                'parent_id'    => '1',
                'key_code'     => 'edit-categories'
            ],
            [
                'name'         => 'Xóa danh mục',
                'display_name' => 'Xóa danh mục',
                'parent_id'    => '1',
                'key_code'     => 'delete-categories'

            ],
            [
                'name'         => 'Quản Lý Banner',
                'display_name' => 'Quản Lý Banner',
                'parent_id'    => '0',
                'key_code'     => ''
            ],
            [
                'name'         => 'Danh sách banner',
                'display_name' => 'Danh sách banner',
                'parent_id'    => '6',
                'key_code'     => 'view-banners'
            ],
            [
                'name'         => 'Thêm banner',
                'display_name' => 'Thêm banner',
                'parent_id'    => '6',
                'key_code'     => 'create-banners'
            ],
            [
                'name'         => 'Sửa banner',
                'display_name' => 'Sửa banner',
                'parent_id'    => '6',
                'key_code'     => 'edit-banners'
            ],
            [
                'name'         => 'Xóa banner',
                'display_name' => 'Xóa banner',
                'parent_id'    => '6',
                'key_code'     => 'delete-banners'
            ],
            [
                'name'         => 'Quản Lý Nhà Cung Cấp',
                'display_name' => 'Quản Lý Nhà Cung Cấp',
                'parent_id'    => '0',
                'key_code'     => ''
            ],
            [
                'name'         => 'Danh sách nhà cung cấp',
                'display_name' => 'Danh sách nhà cung cấp',
                'parent_id'    => '11',
                'key_code'     => 'view-vendors'
            ],
            [
                'name'         => 'Thêm nhà cung cấp',
                'display_name' => 'Thêm nhà cung cấp',
                'parent_id'    => '11',
                'key_code'     => 'create-vendors'
            ],
            [
                'name'         => 'Sửa nhà cung cấp',
                'display_name' => 'Sửa nhà cung cấp',
                'parent_id'    => '11',
                'key_code'     => 'edit-vendors'
            ],
            [
                'name'         => 'Xóa nhà cung cấp',
                'display_name' => 'Xóa nhà cung cấp',
                'parent_id'    => '11',
                'key_code'     => 'delete-vendors'
            ],
            [
                'name'         => 'Quản Lý Thương Hiệu',
                'display_name' => 'Quản Lý Thương Hiệu',
                'parent_id'    => '0',
                'key_code'     => ''
            ],
            [
                'name'         => 'Danh sách thương hiệu',
                'display_name' => 'Danh sách thương hiệu',
                'parent_id'    => '16',
                'key_code'     => 'view-brands'
            ],
            [
                'name'         => 'Thêm thương hiệu',
                'display_name' => 'Thêm thương hiệu',
                'parent_id'    => '16',
                'key_code'     => 'create-brands'
            ],
            [
                'name'         => 'Sửa thương hiệu',
                'display_name' => 'Sửa thương hiệu',
                'parent_id'    => '16',
                'key_code'     => 'edit-brands'
            ],
            [
                'name'         => 'Xóa thương hiệu',
                'display_name' => 'Xóa thương hiệu',
                'parent_id'    => '16',
                'key_code'     => 'delete-brands'
            ],
            [
                'name'         => 'Quản Lý Tin Tức',
                'display_name' => 'Quản Lý Tin Tức',
                'parent_id'    => '0',
                'key_code'     => ''
            ],
            [
                'name'         => 'Danh sách tin tức',
                'display_name' => 'Danh sách tin tức',
                'parent_id'    => '21',
                'key_code'     => 'view-articles'
            ],
            [
                'name'         => 'Thêm tin tức',
                'display_name' => 'Thêm tin tức',
                'parent_id'    => '21',
                'key_code'     => 'create-articles'
            ],
            [
                'name'         => 'Sửa tin tức',
                'display_name' => 'Sửa tin tức',
                'parent_id'    => '21',
                'key_code'     => 'edit-articles'
            ],
            [
                'name'         => 'Xóa tin tức',
                'display_name' => 'Xóa tin tức',
                'parent_id'    => '21',
                'key_code'     => 'delete-articles'

            ],
            [
                'name'         => 'Quản Lý Sản Phẩm',
                'display_name' => 'Quản Lý Sản Phẩm',
                'parent_id'    => '0',
                'key_code'     => ''
            ],
            [
                'name'         => 'Danh sách sản phẩm',
                'display_name' => 'Danh sách sản phẩm',
                'parent_id'    => '26',
                'key_code'     => 'view-products'
            ],
            [
                'name'         => 'Thêm sản phẩm',
                'display_name' => 'Thêm sản phẩm',
                'parent_id'    => '26',
                'key_code'     => 'create-products'
            ],
            [
                'name'         => 'Sửa sản phẩm',
                'display_name' => 'Sửa sản phẩm',
                'parent_id'    => '26',
                'key_code'     => 'edit-products'
            ],
            [
                'name'         => 'Xóa sản phẩm',
                'display_name' => 'Xóa sản phẩm',
                'parent_id'    => '26',
                'key_code'     => 'delete-products'

            ],
            

            [
                'name'         => 'Quản Lý Khuyến Mãi',
                'display_name' => 'Quản Lý Sản Phẩm',
                'parent_id'    => '0',
                'key_code'     => ''
            ],
            [
                'name'         => 'Danh sách khuyến mãi',
                'display_name' => 'Danh sách khuyến mãi',
                'parent_id'    => '31',
                'key_code'     => 'view-coupons'
            ],
            [
                'name'         => 'Thêm khuyến mãi',
                'display_name' => 'Thêm khuyến mãi',
                'parent_id'    => '31',
                'key_code'     => 'create-coupons'
            ],
            [
                'name'         => 'Sửa khuyến mãi',
                'display_name' => 'Sửa khuyến mãi',
                'parent_id'    => '31',
                'key_code'     => 'edit-coupons'
            ],
            [
                'name'         => 'Xóa khuyến mãi',
                'display_name' => 'Xóa khuyến mãi',
                'parent_id'    => '31',
                'key_code'     => 'delete-coupons'

            ],

            [
                'name'         => 'Quản Lý Tài Khoản',
                'display_name' => 'Quản Lý Tài Khoản',
                'parent_id'    => '0',
                'key_code'     => ''
            ],
            [
                'name'         => 'Danh sách tài khoản',
                'display_name' => 'Danh sách tài khoản',
                'parent_id'    => '36',
                'key_code'     => 'view-users'
            ],
            [
                'name'         => 'Thêm tài khoản',
                'display_name' => 'Thêm tài khoản',
                'parent_id'    => '36',
                'key_code'     => 'create-users'
            ],
            [
                'name'         => 'Sửa tài khoản',
                'display_name' => 'Sửa tài khoản',
                'parent_id'    => '36',
                'key_code'     => 'edit-users'
            ],
            [
                'name'         => 'Xóa tài khoản',
                'display_name' => 'Xóa tài khoản',
                'parent_id'    => '36',
                'key_code'     => 'delete-users'
            ],
            [
                'name'         => 'Quản Lý Quyền Quản Trị',
                'display_name' => 'Quản Lý Quyền Quản Trị',
                'parent_id'    => '0',
                'key_code'     => ''
            ],
            [
                'name'         => 'Danh sách quyền quản trị',
                'display_name' => 'Danh sách quyền quản trị',
                'parent_id'    => '41',
                'key_code'     => 'view-roles'
            ],
            [
                'name'         => 'Thêm quyền quản trị',
                'display_name' => 'Thêm quyền quản trị',
                'parent_id'    => '41',
                'key_code'     => 'create-roles'
            ],
            [
                'name'         => 'Sửa quyền quản trị',
                'display_name' => 'Sửa quyền quản trị',
                'parent_id'    => '41',
                'key_code'     => 'edit-roles'
            ],
            [
                'name'         => 'Xóa quyền quản trị',
                'display_name' => 'Xóa quyền quản trị',
                'parent_id'    => '41',
                'key_code'     => 'delete-roles'

            ],
            [
                'name'         => 'Quản Lý Hóa Đơn && Setting Website',
                'display_name' => 'Quản Lý Hóa Đơn && Setting Website',
                'parent_id'    => '0',
                'key_code'     => ''
            ],
            [
                'name'         => 'Danh sách hóa đơn ',
                'display_name' => 'Danh sách hóa đơn',
                'parent_id'    => '46',
                'key_code'     => 'view-orders'
            ],
            [
                'name'         => 'Sửa hóa đơn',
                'display_name' => 'Sửa hóa đơn',
                'parent_id'    => '46',
                'key_code'     => 'edit-orders'
            ],
            [
                'name'         => 'Xóa hóa đơn',
                'display_name' => 'Xóa hóa đơn',
                'parent_id'    => '46',
                'key_code'     => 'delete-orders'
            ],
            [
                'name'         => 'Setting Website',
                'display_name' => 'Setting Website',
                'parent_id'    => '46',
                'key_code'     => 'setting-website'
            ]
        ]);
    }
}
