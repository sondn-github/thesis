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
                'pfr' => '{"C1": {"2": 0, "3": 0.06, "4": 0}, "C2": {"2": 0, "3": 0, "4": 0.06}, "C3": {"2": 0, "3": 0, "4": 0.06}, "C4": {"2": 0, "3": 0.06, "4": 0}, "C5": {"2": 0, "3": 0, "4": 0.06}, "C6": {"2": 0, "3": 0, "4": 0}, "C7": {"2": 0.06, "3": 0, "4": 0}, "C8": {"2": 0, "3": 0.06, "4": 0}, "C9": {"2": 0, "3": 0, "4": 0.06}, "C10": {"2": 1, "3": 0, "4": 0}, "C11": {"2": 0, "3": 0.5, "4": 0.5}, "C12": {"2": 0, "3": 1, "4": 0}, "C13": {"2": 0, "3": 1, "4": 0}, "C14": {"2": 0, "3": 1, "4": 0}, "C15": {"2": 0, "3": 1, "4": 0}, "C16": {"2": 1, "3": 0, "4": 0}, "C17": {"2": 0, "3": 0.5, "4": 0}, "C18": {"2": 0.5, "3": 0.5, "4": 0}, "C19": {"2": 0.5, "3": 0.5, "4": 0}, "C20": {"2": 0, "3": 0, "4": 1}, "C21": {"2": 0, "3": 0, "4": 1}, "C22": {"2": 0, "3": 0, "4": 1}, "C23": {"2": 0, "3": 0, "4": 1}, "C24": {"2": 0, "3": 1, "4": 0}, "C25": {"2": 0, "3": 1, "4": 0}, "C26": {"2": 0, "3": 1, "4": 0}, "C27": {"2": 0, "3": 1, "4": 0}, "C28": {"2": 0, "3": 1, "4": 0}, "C29": {"2": 0, "3": 1, "4": 0}, "C30": {"2": 0, "3": 1, "4": 0}, "C31": {"2": 0, "3": 1, "4": 0}, "C32": {"2": 0, "3": 1, "4": 0}, "C33": {"2": 0, "3": 1, "4": 0}, "C34": {"2": 0, "3": 0, "4": 1}, "C35": {"2": 0, "3": 0, "4": 0}, "C36": {"2": 0, "3": 0, "4": 0}, "C37": {"2": 0, "3": 0, "4": 0}, "C38": {"2": 0, "3": 0, "4": 0}, "C39": {"2": 0, "3": 0, "4": 0}, "C40": {"2": 0, "3": 0, "4": 1}, "C41": {"2": 0, "3": 0, "4": 1}, "C42": {"2": 0, "3": 0, "4": 1}, "C43": {"2": 0.33, "3": 0, "4": 0.67}, "C44": {"2": 0.33, "3": 0, "4": 0.67}, "C45": {"2": 0, "3": 0.33, "4": 0.67}, "C46": {"2": 0, "3": 0.33, "4": 0.67}, "C47": {"2": 0, "3": 0, "4": 1}, "C48": {"2": 0, "3": 0, "4": 0.67}, "C49": {"2": 0, "3": 0.33, "4": 0.67}}',
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
                'pfr' => '{"C10": {"2": 0.5, "3": 0, "4": 0}, "C11": {"2": 0.5, "3": 0.5, "4": 0}, "C12": {"2": 0.5, "3": 0, "4": 0}, "C13": {"2": 0.5, "3": 0, "4": 0.5}, "C14": {"2": 0.5, "3": 0, "4": 0.5}, "C15": {"2": 0.5, "3": 0, "4": 0.5}, "C16": {"2": 0, "3": 0.5, "4": 0.5}, "C17": {"2": 0.5, "3": 0, "4": 0.5}, "C18": {"2": 0, "3": 0, "4": 1}, "C19": {"2": 0.5, "3": 0, "4": 0.5}, "C40": {"2": 0, "3": 0, "4": 1}, "C41": {"2": 0, "3": 0, "4": 1}, "C42": {"2": 0, "3": 1, "4": 0}, "C43": {"2": 1, "3": 0, "4": 0}, "C44": {"2": 1, "3": 0, "4": 0}, "C45": {"2": 0, "3": 0, "4": 0}, "C46": {"2": 0, "3": 1, "4": 0}, "C47": {"2": 0, "3": 0, "4": 1}, "C48": {"2": 0, "3": 1, "4": 0}, "C49": {"2": 1, "3": 0, "4": 0}}',
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
                'pfr' => '{"C10": {"2": 0, "3": 0.5, "4": 0.5}, "C11": {"2": 0, "3": 0, "4": 1}, "C12": {"2": 0, "3": 0, "4": 1}, "C13": {"2": 0, "3": 0, "4": 1}, "C14": {"2": 0, "3": 0, "4": 1}, "C15": {"2": 0, "3": 0, "4": 1}, "C16": {"2": 0, "3": 0, "4": 1}, "C17": {"2": 0, "3": 1, "4": 0}, "C18": {"2": 0, "3": 0, "4": 1}, "19": {"2": 0, "3": 0, "4": 1}, "C40": {"2": 0, "3": 0, "4": 1}, "C41": {"2": 0, "3": 1, "4": 0}, "C42": {"2": 0, "3": 0, "4": 1}, "C43": {"2": 1, "3": 0, "4": 0}, "C44": {"2": 0, "3": 1, "4": 0}, "C45": {"2": 0, "3": 0, "4": 0}, "C46": {"2": 0, "3": 1, "4": 0}, "C47": {"2": 0, "3": 0, "4": 1}, "C48": {"2": 1, "3": 0, "4": 0}, "C49": {"2": 0, "3": 1, "4": 0}}',
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
                'pfr' => '{"C10": {"2": 0, "3": 0.5, "4": 0.5}, "C11": {"2": 0, "3": 0, "4": 1}, "C12": {"2": 0.5, "3": 0, "4": 0.5}, "C13": {"2": 0, "3": 1, "4": 0}, "C14": {"2": 0, "3": 0.5, "4": 0}, "C15": {"2": 0, "3": 0.5, "4": 0}, "C16": {"2": 0, "3": 0.5, "4": 0}, "C17": {"2": 0, "3": 0, "4": 0}, "C18": {"2": 0.5, "3": 0.5, "4": 0}, "C19": {"2": 1, "3": 0, "4": 0}, "C40": {"2": 0, "3": 0, "4": 1}, "C41": {"2": 0, "3": 1, "4": 0}, "C42": {"2": 0, "3": 0, "4": 1}, "C43": {"2": 0, "3": 1, "4": 0}, "C44": {"2": 1, "3": 0, "4": 0}, "C45": {"2": 0, "3": 0, "4": 0}, "C46": {"2": 1, "3": 0, "4": 0}, "C47": {"2": 0, "3": 1, "4": 0}, "C48": {"2": 1, "3": 0, "4": 0}, "C49": {"2": 0, "3": 0, "4": 1}}',
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
                'pfr' => '{"C10": {"2": 0.5, "3": 0, "4": 0.5}, "C11": {"2": 0.5, "3": 0, "4": 0.5}, "C12": {"2": 0, "3": 1, "4": 0}, "C13": {"2": 0.5, "3": 0.5, "4": 0}, "C14": {"2": 0, "3": 1, "4": 0}, "C15": {"2": 0, "3": 0, "4": 0}, "C16": {"2": 0.5, "3": 0, "4": 0.5}, "C17": {"2": 0.5, "3": 0, "4": 0.5}, "C18": {"2": 0, "3": 1, "4": 0}, "C19": {"2": 0, "3": 1, "4": 0}, "C40": {"2": 0, "3": 1, "4": 0}, "C41": {"2": 0, "3": 1, "4": 0}, "C42": {"2": 0, "3": 0, "4": 1}, "C43": {"2": 0, "3": 1, "4": 0}, "C44": {"2": 0, "3": 1, "4": 0}, "C45": {"2": 0, "3": 1, "4": 0}, "C46": {"2": 1, "3": 0, "4": 0}, "C47": {"2": 0, "3": 1, "4": 0}, "C48": {"2": 0, "3": 0, "4": 1}, "C49": {"2": 1, "3": 0, "4": 0}}',
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
                'pfr' => '{"C10": {"2": 0, "3": 0.5, "4": 0.5}, "C11": {"2": 0, "3": 0, "4": 1}, "C12": {"2": 0, "3": 0, "4": 1}, "C13": {"2": 0, "3": 0, "4": 1}, "C14": {"2": 0.5, "3": 0.5, "4": 0}, "C15": {"2": 0, "3": 1, "4": 0}, "C16": {"2": 0, "3": 0.5, "4": 0}, "C17": {"2": 0, "3": 1, "4": 0}, "C18": {"2": 0, "3": 0, "4": 1}, "C19": {"2": 0, "3": 0.5, "4": 0.5}, "C40": {"2": 1, "3": 0, "4": 0}, "C41": {"2": 1, "3": 0, "4": 0}, "C42": {"2": 0, "3": 1, "4": 0}, "C43": {"2": 1, "3": 0, "4": 0}, "C44": {"2": 1, "3": 0, "4": 0}, "C45": {"2": 1, "3": 0, "4": 0}, "C46": {"2": 1, "3": 0, "4": 0}, "C47": {"2": 0, "3": 1, "4": 0}, "C48": {"2": 1, "3": 0, "4": 0}, "C49": {"2": 0, "3": 1, "4": 0}}',
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
                'pfr' => '{"C1":{"4":0,"3":0,"2":0}}',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
        ]);
    }
}
