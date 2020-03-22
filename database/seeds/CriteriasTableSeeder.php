<?php

use Illuminate\Database\Seeder;

class CriteriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('criterias')->insert([
            [
                'id' => 1,
                'description' => 'Lớp học theo hình thức học hỗn hợp có chất lượng tương tự lớp học dạy giáp mặt?',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 2,
                'description' => 'Học liệu điện tử (video, e-book, slides etc.) trong khóa học phù hợp với nội dung và mục tiêu đào tạo của môn học và đem lại hiệu quả tốt trong học tập?',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 3,
                'description' => 'Tỷ lệ phân phối cho các hoạt động học trên lớp, trực tuyến được sắp xếp hợp lý, hỗ trợ tốt quá trình học tập',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 4,
                'description' => 'Hình thức đào tạo hỗn hợp tác động tích cực đến kết quả học tập: khối lượng kiến thức tăng nhiều hơn và kiến thức được tổ chức tốt hơn và có thể dễ dàng xem lại bài học',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 5,
                'description' => 'Các thầy/ cô dạy các lớp học hỗn hợp thường xuyên tương tác, trả lời thắc mắc, hỏi đáp với sinh viên trên hệ thống LMS?',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 6,
                'description' => 'Các bài kiểm tra/ đánh giá/ bài tập được sử dụng bởi các thầy cô trên hệ thống LMS mang lại hiệu quả tích cực?',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 7,
                'description' => 'Dễ dàng tìm kiếm các tài liệu phù hợp với nhu cầu (bài tập, sách, tài liệu tham khảo) thông qua lớp học hỗn hợp hơn so với lớp học truyền thống',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 8,
                'description' => 'Tốc độ tải của trang web nhanh, dễ dàng xem và tải các tài nguyên học tập',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 9,
                'description' => 'Tổ chức lớp học trên phần LMS logic, trực quan, giúp việc chuyển tiếp giữa các khóa học, bài học dễ dàng',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'id' => 10,
                'description' => 'Anh (Chị)  hài lòng với hình thức đào tạo hỗn hợp và sẽ tiếp tục tham gia các lớp học dạy theo hình thức hỗn hợp trong thời gian tới (nếu có)',
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
        ]);
    }
}
