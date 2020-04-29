<?php

use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('courses')->insert([
            [
                'id' => 1,
                'name' => 'Lập trình hướng đối tượng',
                'description' => 'Khoá học này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và
                đặc biệt là những khái niệm liên quan',
                'thumbnail' => '/images/course_1.jpg',
                'user_id' => 3,
                'category_id' => 1,
                'pfr' => '{"1": {"2": 0, "3": 0.06, "4": 0}, "2": {"2": 0, "3": 0, "4": 0.06}, "3": {"2": 0, "3": 0, "4": 0.06}, "4": {"2": 0, "3": 0.06, "4": 0}, "5": {"2": 0, "3": 0, "4": 0.06}, "6": {"2": 0, "3": 0, "4": 0}, "7": {"2": 0.06, "3": 0, "4": 0}, "8": {"2": 0, "3": 0.06, "4": 0}, "9": {"2": 0, "3": 0, "4": 0.06}, "10": {"2": 1, "3": 0, "4": 0}, "11": {"2": 0, "3": 0.5, "4": 0.5}, "12": {"2": 0, "3": 1, "4": 0}, "13": {"2": 0, "3": 1, "4": 0}, "14": {"2": 0, "3": 1, "4": 0}, "15": {"2": 0, "3": 1, "4": 0}, "16": {"2": 1, "3": 0, "4": 0}, "17": {"2": 0, "3": 0.5, "4": 0}, "18": {"2": 0.5, "3": 0.5, "4": 0}, "19": {"2": 0.5, "3": 0.5, "4": 0}, "20": {"2": 0, "3": 0, "4": 1}, "21": {"2": 0, "3": 0, "4": 1}, "22": {"2": 0, "3": 0, "4": 1}, "23": {"2": 0, "3": 0, "4": 1}, "24": {"2": 0, "3": 1, "4": 0}, "25": {"2": 0, "3": 1, "4": 0}, "26": {"2": 0, "3": 1, "4": 0}, "27": {"2": 0, "3": 1, "4": 0}, "28": {"2": 0, "3": 1, "4": 0}, "29": {"2": 0, "3": 1, "4": 0}, "30": {"2": 0, "3": 1, "4": 0}, "31": {"2": 0, "3": 1, "4": 0}, "32": {"2": 0, "3": 1, "4": 0}, "33": {"2": 0, "3": 1, "4": 0}, "34": {"2": 0, "3": 0, "4": 1}, "35": {"2": 0, "3": 0, "4": 0}, "36": {"2": 0, "3": 0, "4": 0}, "37": {"2": 0, "3": 0, "4": 0}, "38": {"2": 0, "3": 0, "4": 0}, "39": {"2": 0, "3": 0, "4": 0}, "40": {"2": 0, "3": 0, "4": 1}, "41": {"2": 0, "3": 0, "4": 1}, "42": {"2": 0, "3": 0, "4": 1}, "43": {"2": 0.33, "3": 0, "4": 0.67}, "44": {"2": 0.33, "3": 0, "4": 0.67}, "45": {"2": 0, "3": 0.33, "4": 0.67}, "46": {"2": 0, "3": 0.33, "4": 0.67}, "47": {"2": 0, "3": 0, "4": 1}, "48": {"2": 0, "3": 0, "4": 0.67}, "49": {"2": 0, "3": 0.33, "4": 0.67}}',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 2,
                'name' => 'Tin học đại cương',
                'description' => 'Khoá học này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và
                đặc biệt là những khái niệm liên quan',
                'thumbnail' => '/images/course_2.jpg',
                'user_id' => 3,
                'category_id' => 2,
                'pfr' => '{"10": {"2": 0.5, "3": 0, "4": 0}, "11": {"2": 0.5, "3": 0.5, "4": 0}, "12": {"2": 0.5, "3": 0, "4": 0}, "13": {"2": 0.5, "3": 0, "4": 0.5}, "14": {"2": 0.5, "3": 0, "4": 0.5}, "15": {"2": 0.5, "3": 0, "4": 0.5}, "16": {"2": 0, "3": 0.5, "4": 0.5}, "17": {"2": 0.5, "3": 0, "4": 0.5}, "18": {"2": 0, "3": 0, "4": 1}, "19": {"2": 0.5, "3": 0, "4": 0.5}, "40": {"2": 0, "3": 0, "4": 1}, "41": {"2": 0, "3": 0, "4": 1}, "42": {"2": 0, "3": 1, "4": 0}, "43": {"2": 1, "3": 0, "4": 0}, "44": {"2": 1, "3": 0, "4": 0}, "45": {"2": 0, "3": 0, "4": 0}, "46": {"2": 0, "3": 1, "4": 0}, "47": {"2": 0, "3": 0, "4": 1}, "48": {"2": 0, "3": 1, "4": 0}, "49": {"2": 1, "3": 0, "4": 0}}',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 3,
                'name' => 'Kiến trúc máy tính',
                'description' => 'Khoá học này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và
                đặc biệt là những khái niệm liên quan',
                'thumbnail' => '/images/course_3.jpg',
                'user_id' => 3,
                'category_id' => 1,
                'pfr' => '{"10": {"2": 0, "3": 0.5, "4": 0.5}, "11": {"2": 0, "3": 0, "4": 1}, "12": {"2": 0, "3": 0, "4": 1}, "13": {"2": 0, "3": 0, "4": 1}, "14": {"2": 0, "3": 0, "4": 1}, "15": {"2": 0, "3": 0, "4": 1}, "16": {"2": 0, "3": 0, "4": 1}, "17": {"2": 0, "3": 1, "4": 0}, "18": {"2": 0, "3": 0, "4": 1}, "19": {"2": 0, "3": 0, "4": 1}, "40": {"2": 0, "3": 0, "4": 1}, "41": {"2": 0, "3": 1, "4": 0}, "42": {"2": 0, "3": 0, "4": 1}, "43": {"2": 1, "3": 0, "4": 0}, "44": {"2": 0, "3": 1, "4": 0}, "45": {"2": 0, "3": 0, "4": 0}, "46": {"2": 0, "3": 1, "4": 0}, "47": {"2": 0, "3": 0, "4": 1}, "48": {"2": 1, "3": 0, "4": 0}, "49": {"2": 0, "3": 1, "4": 0}}',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 4,
                'name' => 'Cơ sở dữ liệu',
                'description' => 'Khoá học này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và
                đặc biệt là những khái niệm liên quan',
                'thumbnail' => '/images/course_4.jpg',
                'user_id' => 3,
                'category_id' => 1,
                'pfr' => '{"10": {"2": 0, "3": 0.5, "4": 0.5}, "11": {"2": 0, "3": 0, "4": 1}, "12": {"2": 0.5, "3": 0, "4": 0.5}, "13": {"2": 0, "3": 1, "4": 0}, "14": {"2": 0, "3": 0.5, "4": 0}, "15": {"2": 0, "3": 0.5, "4": 0}, "16": {"2": 0, "3": 0.5, "4": 0}, "17": {"2": 0, "3": 0, "4": 0}, "18": {"2": 0.5, "3": 0.5, "4": 0}, "19": {"2": 1, "3": 0, "4": 0}, "40": {"2": 0, "3": 0, "4": 1}, "41": {"2": 0, "3": 1, "4": 0}, "42": {"2": 0, "3": 0, "4": 1}, "43": {"2": 0, "3": 1, "4": 0}, "44": {"2": 1, "3": 0, "4": 0}, "45": {"2": 0, "3": 0, "4": 0}, "46": {"2": 1, "3": 0, "4": 0}, "47": {"2": 0, "3": 1, "4": 0}, "48": {"2": 1, "3": 0, "4": 0}, "49": {"2": 0, "3": 0, "4": 1}}',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 5,
                'name' => 'Tiếng nhật chuyên ngành ITSS',
                'description' => 'Khoá học này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và
                đặc biệt là những khái niệm liên quan',
                'thumbnail' => '/images/course_5.jpg',
                'user_id' => 3,
                'category_id' => 1,
                'pfr' => '{"10": {"2": 0.5, "3": 0, "4": 0.5}, "11": {"2": 0.5, "3": 0, "4": 0.5}, "12": {"2": 0, "3": 1, "4": 0}, "13": {"2": 0.5, "3": 0.5, "4": 0}, "14": {"2": 0, "3": 1, "4": 0}, "15": {"2": 0, "3": 0, "4": 0}, "16": {"2": 0.5, "3": 0, "4": 0.5}, "17": {"2": 0.5, "3": 0, "4": 0.5}, "18": {"2": 0, "3": 1, "4": 0}, "19": {"2": 0, "3": 1, "4": 0}, "40": {"2": 0, "3": 1, "4": 0}, "41": {"2": 0, "3": 1, "4": 0}, "42": {"2": 0, "3": 0, "4": 1}, "43": {"2": 0, "3": 1, "4": 0}, "44": {"2": 0, "3": 1, "4": 0}, "45": {"2": 0, "3": 1, "4": 0}, "46": {"2": 1, "3": 0, "4": 0}, "47": {"2": 0, "3": 1, "4": 0}, "48": {"2": 0, "3": 0, "4": 1}, "49": {"2": 1, "3": 0, "4": 0}}',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 6,
                'name' => 'Mạng máy tính',
                'description' => 'Khoá học này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và
                đặc biệt là những khái niệm liên quan',
                'thumbnail' => '/images/course_6.jpg',
                'user_id' => 3,
                'category_id' => 2,
                'pfr' => '{"10": {"2": 0, "3": 0.5, "4": 0.5}, "11": {"2": 0, "3": 0, "4": 1}, "12": {"2": 0, "3": 0, "4": 1}, "13": {"2": 0, "3": 0, "4": 1}, "14": {"2": 0.5, "3": 0.5, "4": 0}, "15": {"2": 0, "3": 1, "4": 0}, "16": {"2": 0, "3": 0.5, "4": 0}, "17": {"2": 0, "3": 1, "4": 0}, "18": {"2": 0, "3": 0, "4": 1}, "19": {"2": 0, "3": 0.5, "4": 0.5}, "40": {"2": 1, "3": 0, "4": 0}, "41": {"2": 1, "3": 0, "4": 0}, "42": {"2": 0, "3": 1, "4": 0}, "43": {"2": 1, "3": 0, "4": 0}, "44": {"2": 1, "3": 0, "4": 0}, "45": {"2": 1, "3": 0, "4": 0}, "46": {"2": 1, "3": 0, "4": 0}, "47": {"2": 0, "3": 1, "4": 0}, "48": {"2": 1, "3": 0, "4": 0}, "49": {"2": 0, "3": 1, "4": 0}}',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 7,
                'name' => 'Hệ điều hành',
                'description' => 'Khoá học này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và
                đặc biệt là những khái niệm liên quan',
                'thumbnail' => '/images/course_6.jpg',
                'user_id' => 3,
                'category_id' => 2,
                'pfr' => '{"1":{"4":0,"3":0,"2":0}}',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
        ]);
    }
}
