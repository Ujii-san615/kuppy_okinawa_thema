
//PC memu////
jQuery(function() {
    var nav = jQuery('.g-nav-list');
            //navの位置    
            var navTop = nav.offset().top;
            //スクロールするたびに実行
            jQuery(window).scroll(function () {
                var winTop = jQuery(this).scrollTop();
                //スクロール位置がnavの位置より下だったらクラスfixedを追加
                if (winTop >= navTop) {
                    nav.addClass('fixed')
                } else if (winTop <= navTop) {
                    nav.removeClass('fixed')
                }
            });
    //SP memu////
    jQuery('.hamburger').click(function() {
        jQuery(this).toggleClass('active');

        if (jQuery(this).hasClass('active')) {
            jQuery('.globalMenuSp').addClass('active');
        } else {
            jQuery('.globalMenuSp').removeClass('active');
        } 
    });
     //メニュー内を閉じておく
    jQuery(function() {
        jQuery('.globalMenuSp a[href]').click(function() {
            jQuery('.globalMenuSp').removeClass('active');
            jQuery('.hamburger').removeClass('active');
        });
    });
});

