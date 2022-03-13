<?php

namespace Database\Seeders;

use App\Models\showroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class showroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('showrooms')->insert([
            [
                'showroom_name'=> 'headoffice',
                'address'=>'123 Từ Liêm Hà Nội',
                'phone'=>'XXXXXXXXX',
                'region'=>1,
            ],
            [
                'showroom_name'=> 'Hoàng Hà',
                'address'=>'123 Cầu Giấy Hà Nội',
                'phone'=>'0709000292',
                'region'=>1,
            ],  
             [
                
                'showroom_name'=> 'Tôn Đức Thắng',
                'address'=>'Số nhà 12 – 14 đường Tôn Đức Thắng, P Trần Nguyên Hãn,Q Lê Chân Tp. Hải Phòng',
                'phone'=>'0709000293',
                'region'=>1,
            ],
            [
                'showroom_name'=> 'Lê Lợi-Hải Phòng',
                'address'=>' 12 Đường Lê Lợi,Quận Ngô Quyền, Thành phố Hải Phòng',
                'phone'=>'0709000294',
                'region'=>1,
            ],
            [
                'showroom_name'=> 'Hạ Long',
                'address'=>'18A Quảng Yên,Hạ Long, Quảng Ninh',
                'phone'=>'0709000295',
                'region'=>1,
            ],
            [
                'showroom_name'=> 'headoffice',
                'address'=>'12 Thanh Cao Ngọc Thanh Phúc Yên Vĩnh Phúc',
                'phone'=>'0709000296',
                'region'=>1,
            ],
            [
                'showroom_name'=> 'Nhật Tân',
                'address'=>'Tỉnh lộ 771 Nhật Tân, Kim Bảng, Hà Nam',
                'phone'=>'0709000297',
                'region'=>1,
            ],
            [
                'showroom_name'=> 'Nguyễn Văn Cừ',
                'address'=>'12 Nguyễn Văn Cừ TP Bắc Ninh Tỉnh Bắc Ninh',
                'phone'=>'0709000297',
                'region'=>1,
            ],
            [
                'showroom_name'=> 'Đội Cung',
                'address'=>'14 Đội Cung Tp Thanh Hóa Tỉnh Thanh Hóa',
                'phone'=>'0709000299',
                'region'=>3,
            ],
            [
                'showroom_name'=> 'Lê Viết Thuật',
                'address'=>'114 Lê Viết Thuật Hưng Lộc Tp Vinh Tỉnh Nghệ An',
                'phone'=>'0709000298',
                'region'=>3,
            ],
            [
                'showroom_name'=> 'Phú Thượng',
                'address'=>'QL 49 Phú Thượng Phú Vang Thừa Thiên Huế',
                'phone'=>'0709000301',
                'region'=>3,
            ],
            [
                'showroom_name'=> 'Thanh Khê',
                'address'=>'454 Lê Duẫn Thanh Khê Đà Nẵng',
                'phone'=>'0709000300',
                'region'=>3,
            ],
            [
                'showroom_name'=> 'Trần Phú',
                'address'=>'82 Trần Phú Lộc Thọ TP Nha Trang Khánh Hòa',
                'phone'=>'0709000302',
                'region'=>3,
            ],
            [
                'showroom_name'=> 'Bảo Lộc',
                'address'=>'18 Trần Quốc Toản Bảo Lộc Lâm Đồng',
                'phone'=>'0709000303',
                'region'=>3,
            ],
            [
                'showroom_name'=> 'Hàm Nghi',
                'address'=>'12 Hàm Nghi Quận 1 Tp Hồ Chí Minh',
                'phone'=>'0709000304',
                'region'=>2,
            ],
            [
                'showroom_name'=> 'CMT8',
                'address'=>'592 Cách Mạng Tháng 8, Quận 3, Thành phố Hồ Chí Minh 723564',
                'phone'=>'0709000305',
                'region'=>2,
            ],
            [
                'showroom_name'=> 'Phước Tân',
                'address'=>'12 Phước Tân Biên Hòa Đồng Nai',
                'phone'=>'0709000306',
                'region'=>2,
            ],
            [
                'showroom_name'=> 'Thuận Giao',
                'address'=>'43 Thuận Giao Thuận An Bình Dương',
                'phone'=>'0709000307',
                'region'=>2,
            ],
            [
                'showroom_name'=> 'Tân Phú',
                'address'=>'23 Tân Phú Tân Bình Đồng Xoài Bình Phước',
                'phone'=>'0709300308',
                'region'=>2,
            ],
            [
                'showroom_name'=> 'Nguyễn Văn Linh',
                'address'=>'123 Nguyễn Văn Linh An Khánh Ninh Kiều Cần Thơ',
                'phone'=>'0709000309',
                'region'=>2,
            ],
        
            ]);
       
    }
}
