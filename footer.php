<footer>
        <div class="footer">
            <!-- topup -->
            <div id="page-top">
                <a href="#">
                <img src="<?php bloginfo('template_directory'); ?>/images/top_up.png" alt="トップに戻る"></a>
            </div>
            <!-- footer img -->
            <img src="<?php bloginfo('template_directory'); ?>/images/footer.png" alt="">
            <div class=copylight>
                <p class="copy">Copyright © クッピー乳児園. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
<!-- js -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/slick.min.js"></script>
    <script type="text/javascript">
        $('.slider').slick({
            autoplay:true,
            autoplaySpeed:5000,
            dots:true,
            centerMode: true,
            centerPadding: '30px',
            dots:true,
            focusOnSelect:true,
            prevArrow: '<img src="<?php echo get_template_directory_uri();?>/images/left.png" class="slick-prev slick-arrow">',//矢印部分PreviewのHTMLを変更
            nextArrow: '<img src="<?php echo get_template_directory_uri();?>/images/right.png" class="slick-next slick-arrow">',//矢印部分NextのHTMLを変更
        });
    </script>