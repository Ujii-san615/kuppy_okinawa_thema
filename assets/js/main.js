
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

//-----  TOP up  -------//
//スクロールした際の動きを関数でまとめる
function PageTopAnime() {
    var scroll = $(window).scrollTop();
    if (scroll >= 200){//上から200pxスクロールしたら
        $('#page-top').removeClass('RightMove');//#page-topについているRightMoveというクラス名を除く
        $('#page-top').addClass('LeftMove');//#page-topについているLeftMoveというクラス名を付与
    }else{
        if(
        $('#page-top').hasClass('LeftMove')){//すでに#page-topにLeftMoveというクラス名がついていたら
        $('#page-top').removeClass('LeftMove');//LeftMoveというクラス名を除き
        $('#page-top').addClass('RightMove');//RightMoveというクラス名を#page-topに付与
        }
    }
}

// 画面をスクロールをしたら動かしたい場合の記述
$(window).scroll(function () {
    PageTopAnime();/* スクロールした際の動きの関数を呼ぶ*/
});

// ページが読み込まれたらすぐに動かしたい場合の記述
$(window).on('load', function () {
    PageTopAnime();/* スクロールした際の動きの関数を呼ぶ*/
});


// #page-topをクリックした際の設定
$('#page-top').click(function () {
    $('body,html').animate({
        scrollTop: 0//ページトップまでスクロール
    }, 500);//ページトップスクロールの速さ。数字が大きいほど遅くなる
    return false;//リンク自体の無効化
});
