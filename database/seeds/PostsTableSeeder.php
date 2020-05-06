<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Illuminate\Support\Facades\DB::table('posts')->insert([
            [
                'title' => 'Chia sẻ kinh nghiệm học của một sinh viên.',
                'content' => 'Sau 12 năm học hành vất vả, rất nhiều bạn học sinh quyết tâm lớn thi đỗ vào một trường đại học nào đó. Nhưng các bạn nhớ rằng “Sự thành công trên ghế nhà trường không đảm bảo cho sự thành công trong sự nghiệp” - Robert Kiyosaki tác giả của Cha giàu cha nghèo.

Ở trong đại học, chúng ta được học rất nhiều kiến thức, nhưng phần lớn lại là lý thuyết. “Lý thuyết chỉ là màu xám, còn cây đời thì sống mãi”- nhà thơ Goethe. Những kiến thức bên trong trường đại học, chúng ta có thể tìm thấy bên ngoài trường bằng cách học hỏi những người đi trước, mua sách về tự học, quá trình làm việc…

Những kiến thức tự học mang tính thực tế cao sẽ hơn lý thuyết khô khan trên giảng đường đại học. Nhiều nhà tuyển dụng hiện nay chỉ xem bạn có năng lực làm việc hay không mà không cần xem bằng cấp. Nhiều tỷ phú đã thành công mà không học đại học hoặc bỏ dở quá trình học như Billgate, Mark Zuckerberg hay Đoàn Nguyên Đức ở Việt Nam…

Bạn hoàn toàn có thể thành công mà không cần tới tấm bằng đại học. Một tấm bằng đại học không thể đảm bảo tương lai sẽ tốt đẹp. Hãy tin ở chính mình, đại học chỉ là một trong rất nhiều dẫn tới thành công. Bạn nên tìm một con đường phù hợp nhất đối với mình.

Một công nhân ngày làm việc có 8 giờ, thì học sinh sẽ học đến 10 giờ; công nhân làm việc từ thứ 2 đến thứ 6, thứ 7 và chủ nhật được nghỉ, còn với học sinh thì chủ nhật và thứ 7 vẫn đi học đều. Ngoài thời gian học chính ở trường, các bạn còn đi học thêm ở trường. Học thêm ở trường các bạn cảm thấy chưa đủ, các bạn lại đi học ở trung tâm. Học ở trung tâm cảm thấy chưa chắc chắn, phu huynh thuê hẳn gia sư về kèm cặp cho con em với mục đích duy nhất là thi đỗ đại học.',
                'thumbnail' => '/images/news.jpeg',
                'user_id' => 1,
                'view' => rand(10,100),
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'title' => 'Nam sinh trúng tuyển 15 đại học ở Mỹ',
                'content' => 'HÀ TĨNHNguyễn Bành Đức, 18 tuổi, được 15 đại học ở Mỹ cấp học bổng trị giá từ 650 triệu đồng đến gần 5 tỷ đồng cho khóa trọn gói 4 năm.

Đức là học sinh lớp 12A1 trường THPT chuyên Đại học Vinh, tỉnh Nghệ An, con đầu trong gia đình có hai anh em, bố làm công chức, mẹ là giáo viên ở huyện Nghi Xuân, Hà Tĩnh. Được bố, bạn bè khuyên nên ra nước ngoài học tập từ năm lớp 11, Đức tìm hiểu, quyết định săn học bổng du học.

Đầu năm 2019, Đức bắt đầu soạn thư giới thiệu, hồ sơ ngoại khóa, làm bài luận và tham gia thi IELTS, SAT (kỳ thi chuẩn hóa vào đại học của Mỹ). Nam sinh nhờ nhóm bạn trong lớp cùng anh Nguyễn Hùng Lâm (Lâm Python) - người từng giành 13 học bổng của đại học Mỹ vào năm 2013 tư vấn chọn trường.

Cậu sau đó nộp hồ sơ vào 19 trường ở Mỹ, trong đó có Dickinson College, xếp hạng 46 trong 223 trường đại học khai phóng của Mỹ (National Liberal Arts Colleges), theo bảng xếp hạng năm 2019 của US News & World Report.

Kỳ nghỉ hè năm 2019, Đức tập trung trau dồi kiến thức, mang sách tiếng Anh lên thư viện tự ôn luyện, đăng ký lớp học SAT của một thầy giáo trong trường. "Em học cả ngày, nghỉ vào lúc 0h. Những lúc căng thẳng, mệt mỏi, em thường nghe nhạc remix hoặc đi dạo để giải tỏa. Do từ khi học lớp 1 đến lớp 12 đã tham dự nhiều kỳ thi, nên em không cảm thấy áp lực", Đức nói. Kết quả, Đức đạt 7.5 IELTS; điểm SAT là 1.460/1.600, trong đó điểm Toán tuyệt đối (800/800).

Đức cũng sắp xếp thời gian tham gia các hoạt động tình nguyện ở huyện Nghi Xuân do Hội Chữ thập đỏ, Đoàn thanh niên tổ chức. Nam sinh trích tiền thưởng giành được ở một số kỳ thi học sinh giỏi để làm thiện nguyện, tặng quà cho các học sinh nghèo và gia đình khó khăn tại quê hương.',
                'thumbnail' => '/images/news.jpeg',
                'user_id' => 1,
                'view' => rand(10,100),
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'title' => 'Nhiều trường ĐH lên dự kiến ngày sinh viên trở lại trường.',
                'content' => 'Ngày 28/4, nhiều trường đại học lên kế hoạch cho sinh viên trở lại trường sau thời gian dài nghỉ học phòng, chống Covid-19.
TS Trần Đình Lý, Phó hiệu trưởng ĐH Nông lâm TP HCM, cho biết sau khi cân nhắc kỹ, trường đã thống nhất lịch làm việc và học tập trung sau kỳ nghỉ dài để phòng, chống đại dịch Covid-19.

Cụ thể, giảng viên, cán bộ viên chức, người lao động trở lại làm việc bình thường từ ngày 4/5. Lịch học tập trung của học viên, nghiên cứu sinh cũng bắt đầu từ ngày 4/5. Lịch học tập trung của sinh viên bắt đầu từ ngày 11/5.

ĐH Sư phạm Kỹ thuật TP.HCM, ngày 28/4, cũng ra thông báo về việc điều chỉnh kế hoạch giảng dạy và học tập trung học kỳ II năm học 2019-2020.
Tại ĐH Công nghiệp Thực phẩm TP.HCM, một số lớp đang học online, sinh viên các ngành Công nghệ Kỹ thuật và sinh viên năm 3, 4 sẽ bắt đầu học lại từ ngày 4/5.

Từ ngày 11/5, sinh viên và học viên toàn trường sẽ chính thức học tập trung trở lại.

Tại ĐH Luật TP.HCM, từ 4/5, sinh viên lớp chất lượng cao ngành Quản trị - Luật khóa 41; sinh viên lớp Chất lượng cao và Anh văn pháp lý của khóa 42, khóa 43 và khóa 44; sinh viên hệ chính quy văn bằng 2; sinh viên hệ vừa làm vừa học (gồm các lớp văn bằng 1 và văn bằng 2) đến trường.

Từ ngày 11/5, tất cả sinh viên hệ chính quy đại trà thuộc khóa 41 (ngành Quản trị - Luật), khóa 42, khóa 43 và khóa 44 đến trường.

Từ ngày 18/5, tất cả sinh viên hệ chính quy khóa 40 (ngành Quản trị - Luật) và Khóa 41 (trừ ngành Quản trị - Luật) đến trường.

Khi trở lại trường học tập trung, sinh viên học theo lịch đã được phòng đào tạo điều chỉnh; và lịch hệ thống lại kiến thức, giải đáp thắc mắc cho khoảng thời gian mà sinh viên đã tự học bằng hệ thống cơ sở dữ liệu E-learning.

ĐH Ngoại thương cũng quyết định lịch học tập trung của sinh viên cả 3 cơ sở (Hà Nội, TP HCM, Quảng Ninh) từ ngày 11/5.

ĐH Tài chính- Marketing (UFM) tập trung sinh viên đi học trở lại từ 11/5.

ĐH Công nghiệp TP.HCM cũng quyết định cho sinh viên năm 3, năm 4 đi học trở lại từ ngày 4/5; sinh viên năm 1, năm 2 đi học từ 11/5.

Trường ĐH Tôn Đức Thắng dự kiến toàn bộ sinh viên học tập trung trở lại từ ngày 4/5.',
                'thumbnail' => '/images/news.jpeg',
                'user_id' => 1,
                'view' => rand(10,100),
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
            [
                'title' => 'Trường đại học nào có kỳ thi đánh giá năng lực, bài luận riêng?',
                'content' => 'Năm 2020, nhiều trường tổ chức một kỳ thi riêng để tuyển sinh. ĐH Bách khoa Hà Nội sẽ tổ chức thi tại 3 địa điểm.
Năm 2020, ĐH Bách khoa Hà Nội có thêm phương thức một kỳ thi tuyển sinh với 50-80% chỉ tiêu.

Nhà trường cho biết thời gian thi được gói gọn trong chiều 25/7. Thí sinh có nguyện vọng vào khối ngành kỹ thuật, kinh tế sẽ thi ba môn Toán, Đọc hiểu và tổ hợp Khoa học Tự nhiên (Lý, Hóa, Sinh).

Với ngành Ngôn ngữ Anh, thí sinh thi Toán, Đọc hiểu (trên giấy) và tiếng Anh (trên máy tính). Tất cả môn thi trắc nghiệm, riêng Toán 2/3 trắc nghiệm và 1/3 tự luận. Phạm vi kiến thức ra đề được gói gọn trong phần quy định của Bộ GD&ĐT. Những phần đã tinh giản sẽ không nằm trong đề thi.

Dự kiến, tuần đầu tháng 5, trường sẽ công bố khung kiến thức từng môn thi kèm theo ví dụ mẫu. Trường sẽ tổ chức kỳ thi riêng ở 3 tỉnh thành, thay vì ở Hà Nội như công bố trước đó. Điều này để giảm thiểu tác động đến học sinh, giúp các em thuận tiện hơn trong việc đi lại.

Ngoài Hà Nội, nhà trường dự kiến tổ chức thi ở Sơn La, Thanh Hóa. Theo tính toán của trường, khi tổ chức tại 3 điểm trên, thí sinh các vùng đến dự thi đều rất gần. Nhà trường cũng đã có phương án dự phòng nếu dịch Covid-19 bùng phát trở lại, không thể tổ chức kỳ thi này.',
                'thumbnail' => '/images/news.jpeg',
                'user_id' => 1,
                'view' => rand(10,100),
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString(),
            ],
        ]);
    }
}
