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
                'course_id' => 1,
                'name' => 'Lập trình hướng đối tượng',
                'abstract' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến lập trình hướng đối tượng, một phương pháp lập trình nền tảng 
                cho các ngôn ngữ lập trình phổ biến hiện nay như Java, Python, C++.... ',
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
                'pfr' => '{"1":{"4":0,"3":0.38,"2":0.31},"2":{"4":0.38,"3":0.15,"2":0.31},"3":{"4":0.38,"3":0,"2":0.46},"4":{"4":0.15,"3":0.38,"2":0.31},"5":{"4":0.15,"3":0,"2":0.54},"6":{"4":0,"3":0,"2":0.46},"7":{"4":0,"3":0.15,"2":0.46},"8":{"4":0,"3":0.38,"2":0.46},"9":{"4":0.15,"3":0.15,"2":0.54}}',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 2,
                'course_id' => 1,
                'name' => 'Lập trình hướng đối tượng',
                'abstract' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ... ',
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
                'pfr' => '{"1":{"4":0,"3":0.38,"2":0.31},"2":{"4":0.38,"3":0.15,"2":0.31},"3":{"4":0.38,"3":0,"2":0.46},"4":{"4":0.15,"3":0.38,"2":0.31},"5":{"4":0.15,"3":0,"2":0.54},"6":{"4":0,"3":0,"2":0.46},"7":{"4":0,"3":0.15,"2":0.46},"8":{"4":0,"3":0.38,"2":0.46},"9":{"4":0.15,"3":0.15,"2":0.54}}',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 3,
                'course_id' => 1,
                'name' => 'Lập trình hướng đối tượng',
                'abstract' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ... ',
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
                'pfr' => '{"1":{"4":0,"3":0.38,"2":0.31},"2":{"4":0.38,"3":0.15,"2":0.31},"3":{"4":0.38,"3":0,"2":0.46},"4":{"4":0.15,"3":0.38,"2":0.31},"5":{"4":0.15,"3":0,"2":0.54},"6":{"4":0,"3":0,"2":0.46},"7":{"4":0,"3":0.15,"2":0.46},"8":{"4":0,"3":0.38,"2":0.46},"9":{"4":0.15,"3":0.15,"2":0.54}}',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 4,
                'course_id' => 1,
                'name' => 'Lập trình hướng đối tượng',
                'abstract' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ... ',
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
                'pfr' => '{"1":{"4":0,"3":0.38,"2":0.31},"2":{"4":0.38,"3":0.15,"2":0.31},"3":{"4":0.38,"3":0,"2":0.46},"4":{"4":0.15,"3":0.38,"2":0.31},"5":{"4":0.15,"3":0,"2":0.54},"6":{"4":0,"3":0,"2":0.46},"7":{"4":0,"3":0.15,"2":0.46},"8":{"4":0,"3":0.38,"2":0.46},"9":{"4":0.15,"3":0.15,"2":0.54}}',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 5,
                'course_id' => 1,
                'name' => 'Lập trình hướng đối tượng',
                'abstract' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ... ',
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
                'pfr' => '{"1":{"4":0,"3":0.38,"2":0.31},"2":{"4":0.38,"3":0.15,"2":0.31},"3":{"4":0.38,"3":0,"2":0.46},"4":{"4":0.15,"3":0.38,"2":0.31},"5":{"4":0.15,"3":0,"2":0.54},"6":{"4":0,"3":0,"2":0.46},"7":{"4":0,"3":0.15,"2":0.46},"8":{"4":0,"3":0.38,"2":0.46},"9":{"4":0.15,"3":0.15,"2":0.54}}',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 6,
                'course_id' => 1,
                'name' => 'Lập trình hướng đối tượng',
                'abstract' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ... ',
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
                'pfr' => '{"1":{"4":0,"3":0.38,"2":0.31},"2":{"4":0.38,"3":0.15,"2":0.31},"3":{"4":0.38,"3":0,"2":0.46},"4":{"4":0.15,"3":0.38,"2":0.31},"5":{"4":0.15,"3":0,"2":0.54},"6":{"4":0,"3":0,"2":0.46},"7":{"4":0,"3":0.15,"2":0.46},"8":{"4":0,"3":0.38,"2":0.46},"9":{"4":0.15,"3":0.15,"2":0.54}}',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 7,
                'course_id' => 1,
                'name' => 'Lập trình hướng đối tượng',
                'abstract' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ... ',
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
                'pfr' => '{"1":{"4":0,"3":0.38,"2":0.31},"2":{"4":0.38,"3":0.15,"2":0.31},"3":{"4":0.38,"3":0,"2":0.46},"4":{"4":0.15,"3":0.38,"2":0.31},"5":{"4":0.15,"3":0,"2":0.54},"6":{"4":0,"3":0,"2":0.46},"7":{"4":0,"3":0.15,"2":0.46},"8":{"4":0,"3":0.38,"2":0.46},"9":{"4":0.15,"3":0.15,"2":0.54}}',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 8,
                'course_id' => 1,
                'name' => 'Lập trình hướng đối tượng',
                'abstract' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ... ',
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
                'pfr' => '{"1":{"4":0,"3":0.38,"2":0.31},"2":{"4":0.38,"3":0.15,"2":0.31},"3":{"4":0.38,"3":0,"2":0.46},"4":{"4":0.15,"3":0.38,"2":0.31},"5":{"4":0.15,"3":0,"2":0.54},"6":{"4":0,"3":0,"2":0.46},"7":{"4":0,"3":0.15,"2":0.46},"8":{"4":0,"3":0.38,"2":0.46},"9":{"4":0.15,"3":0.15,"2":0.54}}',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 9,
                'course_id' => 1,
                'name' => 'Lập trình hướng đối tượng',
                'abstract' => 'Bài giảng này sẽ giúp bạn có những kiến thức tổng quan về các phương pháp lập trình và 
                đặc biệt là những khái niệm liên quan đến kiến trúc máy tính ... ',
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
                'pfr' => '{"1":{"4":0,"3":0.38,"2":0.31},"2":{"4":0.38,"3":0.15,"2":0.31},"3":{"4":0.38,"3":0,"2":0.46},"4":{"4":0.15,"3":0.38,"2":0.31},"5":{"4":0.15,"3":0,"2":0.54},"6":{"4":0,"3":0,"2":0.46},"7":{"4":0,"3":0.15,"2":0.46},"8":{"4":0,"3":0.38,"2":0.46},"9":{"4":0.15,"3":0.15,"2":0.54}}',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
        ]);
    }
}
