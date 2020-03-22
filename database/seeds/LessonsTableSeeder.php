<?php

use Illuminate\Database\Seeder;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('lessons')->insert([
            [
                'id' => 1,
                'category_id' => 1,
                'name' => 'Lập trình hướng đối tượng',
                'abstract' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến lập trình hướng đối tượng, một phương pháp lập trình nền tảng 
                cho các ngôn ngữ lập trình phổ biến hiện nay như Java, Python, C++.... ',
                'user_id' => 3,
                'file' => '/files/Lecture 01 - Introduction to Object Orientation.pdf',
                'thumbnail' => '/images/course_2.jpg',
                'view' => rand(10,100),
                'description' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 2,
                'category_id' => 1,
                'name' => 'Lập trình hướng đối tượng',
                'abstract' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ... ',
                'user_id' => 3,
                'file' => '/files/CA-HEDSPI2016.pdf',
                'thumbnail' => '/images/course_2.jpg',
                'view' => rand(10,100),
                'description' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 3,
                'category_id' => 1,
                'name' => 'Lập trình hướng đối tượng',
                'abstract' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ... ',
                'user_id' => 3,
                'file' => '/files/CA-HEDSPI2016.pdf',
                'thumbnail' => '/images/course_2.jpg',
                'view' => rand(10,100),
                'description' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 4,
                'category_id' => 1,
                'name' => 'Lập trình hướng đối tượng',
                'abstract' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ... ',
                'user_id' => 3,
                'file' => '/files/CA-HEDSPI2016.pdf',
                'thumbnail' => '/images/course_2.jpg',
                'view' => rand(10,100),
                'description' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 5,
                'category_id' => 1,
                'name' => 'Lập trình hướng đối tượng',
                'abstract' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ... ',
                'user_id' => 3,
                'file' => '/files/CA-HEDSPI2016.pdf',
                'thumbnail' => '/images/course_2.jpg',
                'view' => rand(10,100),
                'description' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 6,
                'category_id' => 1,
                'name' => 'Lập trình hướng đối tượng',
                'abstract' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ... ',
                'user_id' => 3,
                'file' => '/files/CA-HEDSPI2016.pdf',
                'thumbnail' => '/images/course_2.jpg',
                'view' => rand(10,100),
                'description' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 7,
                'category_id' => 1,
                'name' => 'Lập trình hướng đối tượng',
                'abstract' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ... ',
                'user_id' => 3,
                'file' => '/files/CA-HEDSPI2016.pdf',
                'thumbnail' => '/images/course_2.jpg',
                'view' => rand(10,100),
                'description' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 8,
                'category_id' => 1,
                'name' => 'Lập trình hướng đối tượng',
                'abstract' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ... ',
                'user_id' => 3,
                'file' => '/files/CA-HEDSPI2016.pdf',
                'thumbnail' => '/images/course_2.jpg',
                'view' => rand(10,100),
                'description' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 9,
                'category_id' => 1,
                'name' => 'Lập trình hướng đối tượng',
                'abstract' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ... ',
                'user_id' => 3,
                'file' => '/files/CA-HEDSPI2016.pdf',
                'thumbnail' => '/images/course_2.jpg',
                'view' => rand(10,100),
                'description' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ...',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
        ]);
    }
}
