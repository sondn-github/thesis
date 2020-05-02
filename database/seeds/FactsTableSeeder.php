<?php

use Illuminate\Database\Seeder;

class FactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('facts')->insert([
            [
                'id' => 1,
                'code' => 'F11',
                'description' => 'Bài giảng ít có cơ hội để học sinh tương tác với giáo viên.',
                'type' => 1,
            ],
            [
                'id' => 2,
                'code' => 'F12',
                'description' => 'Bài giảng có ít hoạt động thực hành.',
                'type' => 1,
            ],
            [
                'id' => 3,
                'code' => 'F13',
                'description' => 'Bài giảng có ít các hoạt động nhóm để các học sinh tương tác.',
                'type' => 1,
            ],
            [
                'id' => 4,
                'code' => 'F14',
                'description' => 'Bài giảng khó tiếp thu bởi các học sinh khuyết tật.',
                'type' => 1,
            ],
            [
                'id' => 5,
                'code' => 'F15',
                'description' => 'Bài giảng không có ý nghĩa thực tiễn.',
                'type' => 1,
            ],
            [
                'id' => 6,
                'code' => 'F16',
                'description' => 'Bài giảng không cho học viên có cơ hội sáng tạo.',
                'type' => 1,
            ],
            [
                'id' => 7,
                'code' => 'F17',
                'description' => 'Bài giảng khô khan nhiều kiến thức.',
                'type' => 1,
            ],
            [
                'id' => 8,
                'code' => 'F18',
                'description' => 'Bài giảng ít hình ảnh.',
                'type' => 1,
            ],
            [
                'id' => 9,
                'code' => 'F19',
                'description' => 'Bài giảng có ít bài tập.',
                'type' => 1,
            ],
            [
                'id' => 10,
                'code' => 'F110',
                'description' => 'Bài giảng có ít trò chơi.',
                'type' => 1,
            ],
            [
                'id' => 11,
                'code' => 'F111',
                'description' => 'Bài giảng có ít công cụ tư duy bậc cao, còn nhiều công cụ tư duy bậc thấp.',
                'type' => 1,
            ],
            [
                'id' => 12,
                'code' => 'F112',
                'description' => 'Cung cấp thang đo cho các kĩ năng tư duy bậc cao chưa tốt.',
                'type' => 1,
            ],
            [
                'id' => 13,
                'code' => 'F113',
                'description' => 'Bài giảng không giúp học viên có thể tự học, vẫn cần đến lớp.',
                'type' => 1,
            ],
            [
                'id' => 14,
                'code' => 'F114',
                'description' => 'Bài giảng không tạo ra động lực để học viên nâng cao kĩ năng làm việc nhóm.',
                'type' => 1,
            ],
            [
                'id' => 15,
                'code' => 'F115',
                'description' => 'Nên tạo ra các hoạt động, trò chơi để tạo cảm hứng học tập và giúp người học hiểu bài hơn.',
                'type' => 1,
            ],
            [
                'id' => 16,
                'code' => 'F116',
                'description' => 'Bài giảng có đầy đủ bài tập để học sinh hứng thú hơn.',
                'type' => 1,
            ],
            [
                'id' => 17,
                'code' => 'F117',
                'description' => 'Bài giảng có nhiều trò chơi.',
                'type' => 1,
            ],
            [
                'id' => 18,
                'code' => 'F118',
                'description' => 'Cung cấp thang đo cho các kĩ năng tư duy bậc cao tốt.',
                'type' => 1,
            ],
            [
                'id' => 19,
                'code' => 'F119',
                'description' => 'Bài giảng giúp học viên có thể học tập độc lập.',
                'type' => 1,
            ],
            [
                'id' => 20,
                'code' => 'F120',
                'description' => 'Bài giảng tạo ra được sự liên kết giữa các học viên.',
                'type' => 1,
            ],
            [
                'id' => 21,
                'code' => 'F21',
                'description' => 'Cần tiếp tục phát huy về nội dung.',
                'type' => 2,
            ],
            [
                'id' => 22,
                'code' => 'F22',
                'description' => 'Nên tạo ra sự liên lạc giữa giáo viên và học sinh qua email.',
                'type' => 2,
            ],
            [
                'id' => 23,
                'code' => 'F23',
                'description' => 'Nên sử dụng forum để các học sinh có thể trao đổi kết quả bài tập với nhau và thảo luận nhóm.',
                'type' => 2,
            ],
            [
                'id' => 24,
                'code' => 'F24',
                'description' => 'Nên đánh giá kết quả buổi học qua những hoạt động trong buổi học, kết quả nên lấy ý kiến từ tất cả học sinh tham gia buổi học.',
                'type' => 2,
            ],
            [
                'id' => 25,
                'code' => 'F25',
                'description' => 'Bài giảng nên hỗ trợ về âm thanh cho những học sinh khiếm thị.',
                'type' => 2,
            ],
            [
                'id' => 26,
                'code' => 'F26',
                'description' => 'Việc tương tác với bài giảng nên được thực hiện toàn bộ bàn phím để hỗ trợ học sinh khiếm thị.',
                'type' => 2,
            ],
            [
                'id' => 27,
                'code' => 'F27',
                'description' => 'Tương tác đa chiều.',
                'type' => 2,
            ],
            [
                'id' => 28,
                'code' => 'F28',
                'description' => 'Nên đặt ra nhiều bài tập trong bài giảng để thách thức các em.',
                'type' => 2,
            ],
            [
                'id' => 29,
                'code' => 'F29',
                'description' => 'Nên tạo ra các hoạt động, trò chơi để tạo cảm hứng học tập và giúp người học hiểu bài hơn.',
                'type' => 2,
            ],
            [
                'id' => 30,
                'code' => 'F210',
                'description' => 'Nên sử dụng các công cụ hỗ trợ tư duy bậc cao, ví dụ như các chương trình máy tính, biểu đồ.',
                'type' => 2,
            ],
            [
                'id' => 31,
                'code' => 'F211',
                'description' => 'Sử dụng các phần mềm máy tính để nâng cao khả năng phân tích, tổng hợp của học viên.',
                'type' => 2,
            ],
            [
                'id' => 32,
                'code' => 'F212',
                'description' => 'Phân ra các chủ đề để tiện lợi cho việc tự học của sinh viên.',
                'type' => 2,
            ],
            [
                'id' => 33,
                'code' => 'F213',
                'description' => 'Cần thêm các công cụ tự chấm điểm giúp học viên dễ dàng học tập độc lập.',
                'type' => 2,
            ],
            [
                'id' => 34,
                'code' => 'F214',
                'description' => 'Nên tạo ra các bài tập tình huống cần sự giải quyết của nhiều người.',
                'type' => 2,
            ],
            [
                'id' => 35,
                'code' => 'F215',
                'description' => 'Đáp ứng đầy đủ các yêu cầu chung của một bài giảng điện tử tốt.',
                'type' => 2,
            ],
            [
                'id' => 36,
                'code' => 'F121',
                'description' => 'Nội dung liệu điện tử chưa phù với mục tiêu đào tạo môn học',
                'type' => 1,
            ],
            [
                'id' => 37,
                'code' => 'F122',
                'description' => 'Kiến thức chưa được tổ chức một cách rõ ràng.',
                'type' => 1,
            ],
            [
                'id' => 38,
                'code' => 'F123',
                'description' => 'Thời lượng khoá học chưa phù hợp',
                'type' => 1,
            ],
            [
                'id' => 39,
                'code' => 'F124',
                'description' => 'Thời lượng cho các bài tập thực hành, tham gia tình huống tương tác chưa phù hợp với sinh viên',
                'type' => 1,
            ],
            [
                'id' => 40,
                'code' => 'F125',
                'description' => 'Bài tập trong các chủ đề là chưa bám sát nội dung bài học',
                'type' => 1,
            ],
            [
                'id' => 41,
                'code' => 'F126',
                'description' => 'Chưa cung cấp đủ tài liệu tham khảo cho sinh viên',
                'type' => 1,
            ],
            [
                'id' => 42,
                'code' => 'F216',
                'description' => 'Nên cung cấp thêm tài liệu tham khảo cho sinh viên',
                'type' => 2,
            ],
            [
                'id' => 43,
                'code' => 'F217',
                'description' => 'Bài tập trong các chủ đề nên bám sát nội dụng bài học',
                'type' => 2,
            ],
            [
                'id' => 44,
                'code' => 'F218',
                'description' => 'Nên cải thiện nội dung bài tập thực hành, tình huống.',
                'type' => 2,
            ],
            [
                'id' => 45,
                'code' => 'F219',
                'description' => 'Nên tối ưu lại thời lượng khoá học.',
                'type' => 2,
            ],
            [
                'id' => 46,
                'code' => 'F220',
                'description' => 'Nên tổ chức lại kiến thức trong bài học một cách rõ ràng.',
                'type' => 2,
            ],
            [
                'id' => 47,
                'code' => 'F221',
                'description' => 'Nên chọn lọc lại nội dung sao cho phù hợp với mục đích đào tạo của khoá học.',
                'type' => 2,
            ],
        ]);
    }
}
