@extends('layout')

@section('content')
  <div class="container-fluid py-5"
    style="position: relative;
    background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url(/img/dieukhoan.jpg);
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    margin-top: 152px;">
    <h1 class="text-center text-white display-6">Điều khoản</h1>
  </div>

  <div class="container-fluid mt-5">
    <pre class="text-dark" style="font-family: Roboto,Helvetica, sans-serif; font-size: 20px;">
        ĐIỀU 1. ĐỐI TƯỢNG CỦA HỢP ĐỒNG
        1.1. Đối tượng của hợp đồng này là ngôi nhà số: .....
        - Địa chỉ: ..................................................
        - Tổng diện tích sử dụng: ........................ m2
        - Trang thiết bị chủ yếu gắn liền với nhà (nếu có): ........
        1.2. Các thực trạng khác bao gồm: ...........

        ĐIỀU 2. GIÁ CHO THUÊ NHÀ Ở VÀ PHƯƠNG THỨC THANH TOÁN (4)
        2.1. Giá cho thuê nhà ở là .............. đồng/ tháng (Bằng chữ: ......... )
        Giá cho thuê này đã bao gồm các chi phí về quản lý, bảo trì và vận hành nhà ở.
        2.2. Các chi phí sử dụng điện, nước, điện thoại và các dịch vụ khác do bên B thanh toán cho bên cung cấp điện,
        nước, điện thoại và các cơ quan quản lý dịch vụ.
        2.3. Phương thức thanh toán: Tiền mặt hoặc chuyển khoản, trả vào ngày .......... hàng tháng.

        ĐIỀU 3. THỜI HẠN THUÊ, THỜI ĐIỂM GIAO NHẬN NHÀ Ở, MỤC ĐÍCH THUÊ (5)
        3.1. Thời hạn thuê ngôi nhà nêu trên là ....... Kể từ ngày .... tháng .... năm .....
        3.2. Thời điểm giao nhận nhà ở là ngày ..... tháng ... năm .....
        3.2. Mục đích thuê: làm trụ sở chính của công ty, .....

        ĐIỀU 4. NGHĨA VỤ VÀ QUYỀN CỦA BÊN A
        4.1. Nghĩa vụ của bên A:
        a) Giao nhà ở và trang thiết bị gắn liền với nhà ở (nếu có) cho bên B theo đúng hợp đồng.
        b) Bảo đảm cho bên B sử dụng ổn định nhà trong thời hạn thuê;
        c) Bảo dưỡng, sửa chữa nhà theo định kỳ hoặc theo thỏa thuận; nếu bên A không bảo dưỡng, sửa chữa nhà mà gây thiệt
        hại cho bên B, thì phải bồi thường;
        d) Tạo điều kiện cho bên B sử dụng thuận tiện diện tích thuê;
        e) Nộp các khoản thuế về nhà và đất (nếu có); Xuất hoá đơn giá trị gia tăng theo yêu cầu của bên thuê (nếu có).

        4.2. Quyền của bên A:
        a) Yêu cầu bên B trả đủ tiền thuê nhà đúng kỳ hạn như đã thỏa thuận;
        b) Yêu cầu bên B có trách nhiệm trong việc sửa chữa phần hư hỏng, bồi thường thiệt hại do lỗi của bên B gây ra khi
        kết thúc hợp đồng.
        c) Đơn phương chấm dứt thực hiện hợp đồng thuê nhà nhưng phải báo cho bên B biết trước ít nhất 30 ngày nếu không
        có thỏa thuận khác và yêu cầu bồi thường thiệt hại nếu bên B có một trong các hành vi sau đây:
        (i) Không trả tiền thuê nhà liên tiếp trong ba tháng trở lên mà không có lý do chính đáng;
        (ii) Sử dụng nhà không đúng mục đích thuê như đã thỏa thuận trong hợp đồng;
        (iii) Bên B tự ý đục phá, cơi nới, cải tạo, phá dỡ nhà ở đang thuê;
        (iv) Bên B chuyển đổi, cho mượn, cho thuê lại nhà ở đang thuê mà không có sự đồng ý của bên A;
        (v) Bên B làm mất trật tự, vệ sinh môi trường, ảnh hưởng nghiêm trọng đến sinh hoạt của những người xung quanh đã
        được bên A hoặc tổ trưởng tổ dân phố, công an phường lập biên bản đến lần thứ ba mà vẫn không khắc phục;

        ĐIỀU 5. NGHĨA VỤ VÀ QUYỀN CỦA BÊN B:
        5.1. Nghĩa vụ của bên B:
        a) Sử dụng nhà đúng mục đích đã thỏa thuận, giữ gìn nhà ở và có trách nhiệm trong việc sửa chữa những hư hỏng do
        mình gây ra;
        b) Trả đủ tiền thuê nhà đúng kỳ hạn đã thỏa thuận;
        c) Trả tiền điện, nước, điện thoại, vệ sinh và các chi phí phát sinh khác trong thời gian thuê nhà;
        d) Trả nhà cho bên A theo đúng thỏa thuận.
        e) Chấp hành đầy đủ những quy định về quản lý sử dụng nhà ở;
        f) Không được chuyển nhượng hợp đồng thuê nhà hoặc cho người khác thuê lại trừ trường hợp được bên A đồng ý bằng
        văn bản;
        g) Chấp hành các quy định về giữ gìn vệ sinh môi trường và an ninh trật tự trong khu vực cư trú;
        h) Giao lại nhà cho bên A trong các trường hợp chấm dứt hợp đồng quy định tại hợp đồng này.

        5.2. Quyền của bên B:
        a) Nhận nhà ở và trang thiết bị gắn liền (nếu có) theo đúng thoả thuận;
        b) Được cho thuê lại nhà đang thuê, nếu được bên cho thuê đồng ý bằng văn bản;
        c) Yêu cầu bên A sửa chữa nhà đang cho thuê trong trường hợp nhà bị hư hỏng nặng;
        d) Được tiếp tục thuê theo các điều kiện đã thỏa thuận với bên A trong trường hợp thay đổi chủ sở hữu nhà;
        e) Được ưu tiên ký hợp đồng thuê tiếp, nếu đã hết hạn thuê mà nhà vẫn dùng để cho thuê;
        f) Đơn phương chấm dứt thực hiện hợp đồng thuê nhà nhưng phải báo cho bên A biết trước ít nhất 30 ngày nếu không
        có thỏa thuận khác và yêu cầu bồi thường thiệt hại nếu bên A có một trong các hành vi sau đây:
        (i) Không sửa chữa nhà ở khi có hư hỏng nặng mặc dù bên B đã yêu cầu bằng văn bản;
        (ii) Tăng giá thuê nhà ở bất hợp lý hoặc tăng giá thuê mà không thông báo cho bên thuê nhà ở biết trước theo thỏa
        thuận;
        (iii) Quyền sử dụng nhà ở bị hạn chế do lợi ích của người thứ ba.

        ĐIỀU 6. QUYỀN TIẾP TỤC THUÊ NHÀ
        1. Trường hợp chủ sở hữu nhà ở chết mà thời hạn thuê nhà ở vẫn còn thì bên B được tiếp tục thuê đến hết hạn hợp
        đồng. Người thừa kế có trách nhiệm tiếp tục thực hiện hợp đồng thuê nhà ở đã ký kết trước đó, trừ trường hợp các
        bên có thỏa thuận khác. Trường hợp chủ sở hữu không có người thừa kế hợp pháp theo quy định của pháp luật thì nhà
        ở đó thuộc quyền sở hữu của Nhà nước và người đang thuê nhà ở được tiếp tục thuê theo quy định về quản lý, sử dụng
        nhà ở thuộc sở hữu nhà nước.
        2. Trường hợp chủ sở hữu nhà ở chuyển quyền sở hữu nhà ở đang cho thuê cho người khác mà thời hạn thuê nhà ở vẫn
        còn thì bên B được tiếp tục thuê đến hết hạn hợp đồng; chủ sở hữu nhà ở mới có trách nhiệm tiếp tục thực hiện hợp
        đồng thuê nhà ở đã ký kết trước đó, trừ trường hợp các bên có thỏa thuận khác.

        ĐIỀU 7. TRÁCH NHIỆM DO VI PHẠM HỢP ĐỒNG
        Trong quá trình thực hiện hợp đồng mà phát sinh tranh chấp, các bên cùng nhau thương lượng giải quyết; trong
        trường hợp không tự giải quyết được, cần phải thực hiện bằng cách hòa giải; nếu hòa giải không thành thì đưa ra
        Tòa án có thẩm quyền theo quy định của pháp luật.

        ĐIỀU 8. CÁC THỎA THUẬN KHÁC
        8.1. Việc sửa đổi, bổ sung hoặc hủy bỏ hợp đồng này phải được lập thành văn bản và có chữ ký của hai bên.
        8.2. Hợp đồng thuê nhà này sẽ chỉ chấm dứt trong những trường hợp sau:
        a) Khi hết thời hạn mà không có thoả thuận gia hạn hợp đồng thuê theo quy định tại Điều 3.1 hợp đồng này;
        b) Tài sản thuê bị phá huỷ và hoàn toàn không thể sử dụng được;
        c) Bên thuê bị phá sản;
        d) Nếu Bên cho thuê quyết định chấm dứt Hợp đồng thuê trong trường hợp Bên Thuê vi phạm hợp đồng theo khoản c điều
        4.2 hợp đồng này.
        e) Trong trường hợp bất khả kháng theo quy định của pháp luật.

        ĐIỀU 9. CAM KẾT CỦA CÁC BÊN
        Bên A và bên B chịu trách nhiệm trước pháp luật về những lời cùng cam kết sau đây:
        1. Đã khai đúng sự thật và tự chịu trách nhiệm về tính chính xác của những thông tin về nhân thân đã ghi trong hợp
        đồng này.
        2. Thực hiện đúng và đầy đủ tất cả những thỏa thuận đã ghi trong hợp đồng này; nếu bên nào vi phạm mà gây thiệt
        hại, thì phải bồi thường cho bên kia hoặc cho người thứ ba (nếu có).
        3. Trong quá trình thực hiện nếu phát hiện thấy những vấn đề cần thoả thuận thì hai bên có thể lập thêm Phụ lục
        hợp đồng. Nội dung Phụ lục Hợp đồng có giá trị pháp lý như hợp đồng chính.
        4. Hợp đồng này có giá trị kể từ ngày hai bên ký kết (trường hợp là cá nhân cho thuê nhà ở từ 06 tháng trở lên thì
        Hợp đồng có hiệu lực kể từ ngày Hợp đồng được công chứng hoặc chứng thực)./.

        ĐIỀU 10. ĐIỀU KHOẢN SỬA CHỮA, CẢI TẠO
        Vì mục đích là để kinh doanh nên bên kinh doanh thường có nhu cầu chỉnh sửa
        lại ngôi nhà cho phù hợp với mục đích kinh doanh của mình như: Treo biển quảng cáo bên ngoài căn nhà, chỉnh sửa
        lại các phòng chức năng trong căn nhà ... Do vậy, cần đặc biệt lưu ý cần soạn thảo một điều khoản riêng biệt dựa
        trên nguyên tắc việc chỉnh sửa, cải tạo căn nhà không được phép làm thay đổi kết cấu của ngôi nhà.
      
        ĐIỀU 11. ĐIỀU KHOẢN VỀ THUẾ
        Thông thường việc cho thuê nhà để kinh doanh giá cho thuê sẽ tốt hơn việc cho thuê để ở. Bên
        cho thuê cần thỏa thuận rõ với bên thuê giá cho thuê đã bao gồm các khoản thuế thu nhập cá nhân chưa ? Ai có nghĩa
        vụ đi kê khai khoản thuế thu nhập cá nhân này ? ... Đa phần bên thuê nhà vào mục đích kinh doanh đều mong muốn kê
        khai, nộp thuế với khoản chi tiền thuê nhà để hạch toán thuế cho doanh nghiệp, tổ chức của mình (trừ các công ty
        nhỏ hoặc hộ gia đình kinh doanh nhỏ lẻ). Vì vậy, việc thỏa thuận tiền thuế, nghĩa vụ kê khai nộp thuế là rất quan
        trọng trong trường hợp này.

        ĐIỀU 12. ĐIỀU KHOẢN CUỐI CÙNG
        1. Hai bên đã hiểu rõ quyền, nghĩa vụ và lợi ích hợp pháp của mình, ý nghĩa và hậu quả pháp lý của việc công chứng
        (chứng thực) này, sau khi đã được nghe lời giải thích của người có thẩm quyền công chứng hoặc chứng thực dưới đây.
        2. Hai bên đã tự đọc lại hợp đồng này, đã hiểu và đồng ý tất cả các điều khoản ghi trong hợp đồng này.
        Hợp đồng được lập thành .......... (...........) bản, mỗi bên giữ một bản và có giá trị như nhau.
      </pre>
  </div>
@endsection
