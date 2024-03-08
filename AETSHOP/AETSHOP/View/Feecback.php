<title>AETSHOP - Phản hồi</title>
<section id="contact" class="contact">
    <div class="container">

        <div class="section-title">
            <h2>Phản hồi</h2>
            <p>Chúng tôi luôn lắng nghe và đánh giá cao mọi ý kiến phản hồi từ bạn! Hãy cùng chia sẻ những trải nghiệm
                của bạn và giúp chúng tôi phát triển mỗi ngày. Hãy là phần không thể thiếu trong hành trình của chúng
                tôi - vì cùng nhau, chúng ta làm nên sự khác biệt</p>
        </div>

        <div class="row">

            <div class="col-lg-5 d-flex align-items-stretch">
                <div class="info">
                    <div class="address">
                        <i class="bi bi-geo-alt"></i>
                        <h4>Địa chỉ:</h4>
                        <p>12 Trịnh Đình Thảo, Hòa Thạnh, Tân Phú, Thành Phố Hồ Chí Minh</p>
                    </div>

                    <div class="email">
                        <i class="bi bi-envelope"></i>
                        <h4>Email:</h4>
                        <p>aetshop@gmail.com</p>
                    </div>

                    <div class="phone">
                        <i class="bi bi-phone"></i>
                        <h4>Số điện thoại:</h4>
                        <p>0343157340</p>
                    </div>

                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3110.8903266550924!2d106.63612367250477!3d10.774809100098913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ea144839ef1%3A0x798819bdcd0522b0!2zVHLGsOG7nW5nIENhbyDEkOG6s25nIEPDtG5nIE5naOG7hyBUaMO0bmcgVGluIFRwLkjhu5MgQ2jDrSBNaW5o!5e0!3m2!1svi!2s!4v1671629729293!5m2!1svi!2s"
                        frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                </div>

            </div>

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                <form action="\forms\contact.php" method="post" role="form" class="php-email-form">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="name">Tên của bạn</label>
                            <input type="text" name="name" class="form-control" id="name" required>
                        </div>
                        <div class="form-group col-md-6 mt-3 mt-md-0">
                            <label for="name">Email</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="name">Tiêu đề phản hồi</label>
                        <input type="text" class="form-control" name="subject" id="subject" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="name">Nội dung phản hồi</label>
                        <textarea class="form-control" name="message" rows="10" required></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">Vui lòng chờ</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Tin nhắn của bạn đã được gửi. Cảm ơn!
                        </div>
                    </div>
                    <div class="text-center"><button type="submit">Gửi phản hồi</button></div>
                </form>
            </div>

        </div>

    </div>
</section>