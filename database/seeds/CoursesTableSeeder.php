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
                'user_id' => 3,
                'category_id' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Tin học đại cương',
                'description' => 'Khoá học này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan',
                'user_id' => 3,
                'category_id' => 1,
            ],
            [
                'id' => 3,
                'name' => 'Kiến trúc máy tính',
                'description' => 'Khoá học này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan',
                'user_id' => 3,
                'category_id' => 1,
            ],
        ]);
    }
}
