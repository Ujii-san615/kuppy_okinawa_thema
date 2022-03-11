<?php

/*

Template Name: ニュース
Template Post Type: page,post

*/

?>

<?php include ( dirname(__FILE__) . '/header.php' ); ?>

<body>
<main>
    <section>
        <div id="page-title">
            <img src="<?php bloginfo('template_directory'); ?>/images/title_news_main.png" alt="お知らせ">
        </div>
    </section>
    <section>
            <div class="section_01 news_title">
                <div class="title_small">
                    <img src="<?php bloginfo('template_directory'); ?>/images/title_news_small.png" alt="園からのお便り">
                </div>
                <div class="news_wrap">
                    <div class="news_box">
                        <ul>
                        <?php
                            global $post;
                            $tmp_post = $post; // このPHPコードを実行する前の記事データを退避。
                            $category_slugs = array(
                                'schedule',
                            ); // カテゴリスラッグを配列で指定。
                            $category_ids = array();
                            foreach ( $category_slugs as $category_slug ) {
                                $idObj = get_category_by_slug( $category_slug ); // 指定したカテゴリスラッグから、get_category_by_slug 関数でカテゴリIDを取得。
                                $category_id = $idObj->term_id;
                                array_push( $category_ids, $category_id ); // カテゴリIDを配列に格納。
                            }
                            $numberposts = '4'; // 取得する最大投稿記事数を指定。
                            foreach ( $category_ids as $category_id ) { // 指定したカテゴリスラッグの数だけ繰り返す。
                        ?>

                        <?php
                            $postslist = get_posts( "category=$category_id&numberposts=$numberposts&order=DESC&orderby=date" );
                            // get_posts 関数で、投稿記事データを取得し、配列に格納
                            foreach ( $postslist as $post ) {
                            // 取得した投稿記事データを1つづつ表示
                        ?>

                            <a href="<?php echo get_permalink(); ?>">
                                <li class="li_box">
                                    <div class="thumbnail"><img src="<?php the_post_thumbnail_url() ?>" alt=""></div>
                                    <div class="li_text_box">
                                        <div class="day"><?php the_time('Y年n月j日'); ?>&nbsp;&nbsp;</div>
                                        <div class="lavel"><?php echo '<span class="entry-label" style="' . esc_attr( 'background:' . $this_category_color ) . ';">' . esc_html( $this_category_name ) . '</span>'; ?></div>
                                        <div class="text"><?php the_title(); ?></div>
                                    </div>
                                </li>
                            </a>
                            <?php
                                    }
                            ?>
                                    
                            <?php
                                }
                                $post = $tmp_post; // このPHPコードを実行する前の記事データを復活。
                            ?>
                        </ul>
                    </div>
                    <!-- <div class="more_button">
                        <a href="">もっと見る </a>
                    </div> -->
                </div>
            </div>
            <div class="section_01 news_title">
                <div class="title_small">
                    <img src="<?php bloginfo('template_directory'); ?>/images/title_kondate.png" alt="献立表">
                </div>
                <div class="news_wrap">
                    <div class="news_box">
                        <ul>
                        <?php
                            global $post;
                            $tmp_post = $post; // このPHPコードを実行する前の記事データを退避。
                            $category_slugs = array(
                                'kondate',
                            ); // カテゴリスラッグを配列で指定。
                            $category_ids = array();
                            foreach ( $category_slugs as $category_slug ) {
                                $idObj = get_category_by_slug( $category_slug ); // 指定したカテゴリスラッグから、get_category_by_slug 関数でカテゴリIDを取得。
                                $category_id = $idObj->term_id;
                                array_push( $category_ids, $category_id ); // カテゴリIDを配列に格納。
                            }
                            $numberposts = '10'; // 取得する最大投稿記事数を指定。
                            foreach ( $category_ids as $category_id ) { // 指定したカテゴリスラッグの数だけ繰り返す。
                        ?>

                        <?php
                            $postslist = get_posts( "category=$category_id&numberposts=$numberposts&order=DESC&orderby=date" );
                            // get_posts 関数で、投稿記事データを取得し、配列に格納
                            foreach ( $postslist as $post ) {
                            // 取得した投稿記事データを1つづつ表示
                        ?>
                            <a href="<?php echo get_permalink(); ?>">
                                <li class="li_box">
                                    <div class="thumbnail"><img src="<?php the_post_thumbnail_url() ?>" alt=""></div>
                                    <div class="li_text_box">
                                        <div class="day"><?php the_time('Y年n月j日'); ?>&nbsp;&nbsp;</div>
                                        <div class="lavel"><?php echo '<span class="entry-label" style="' . esc_attr( 'background:' . $this_category_color ) . ';">' . esc_html( $this_category_name ) . '</span>'; ?></div>
                                        <div class="text"><?php the_title(); ?></div>
                                    </div>
                                </li>
                            </a>
                                    <?php
                                            }
                                    ?>
                                    
                                    <?php
                                        }
                                        $post = $tmp_post; // このPHPコードを実行する前の記事データを復活。
                                    ?>
                        </ul>
                    </div>
                    <!-- <div class="more_button">
                        <a href="">もっと見る </a>
                    </div> -->
                </div>
            </div>
        </div> 
        </section>


        <section>
            <div id="recruit">
            <div id="second_pagetitle">
                <img src="<?php bloginfo('template_directory'); ?>/images/title_recruit.png" alt="採用情報">
            </div>
        </section>
        <section>
            <div class="recruit_wrap">
                <div class="recruit_title">
                    <img src="<?php bloginfo('template_directory'); ?>/images/recruit_small_title.png" alt="私たちが行っている保育は、こんな保育です">
                </div>
                <div class="recruit_01">
                    <img class="recruit_textimg" src="<?php bloginfo('template_directory'); ?>/images/recruit_01.png" alt="子どもの幸せを1番に願い、心身共に健康で、自己肯定感と生きる力を育む保育を行っていきます。オーガニック給食とリトミックや遊道体操等の活動で健康な心と体を作ります。">
                    <img src="<?php bloginfo('template_directory'); ?>/images/re_01.jpeg" alt="">
                </div>
                <div class="recruit_02">
                    <img src="<?php bloginfo('template_directory'); ?>/images/slider1.jpg" alt="">
                    <img class="recruit_textimg"  src="<?php bloginfo('template_directory'); ?>/images/recruit_02.png" alt="余裕のある職員形成で、一人一人丁寧な保育ができ、やりがいがあります。">
                </div>
                <div class="recruit_03">
                    <img class="recruit_textimg"  src="<?php bloginfo('template_directory'); ?>/images/recruit_03.png" alt="園長紹介、気さくで明るい園長です。より良い環境を常に考え、楽しく仕事をすることを大切にしています。">
                    <img class="recruit_encho"  src="<?php bloginfo('template_directory'); ?>/images/recruit_encho.jpeg" alt="">
                </div>
                <div class="recruit_04">
                    <img class="recruit_pr"  src="<?php bloginfo('template_directory'); ?>/images/recruit_pr.png" alt="優しくて面白い先輩がいっぱいいます">
                    <img class="recruit_text"  src="<?php bloginfo('template_directory'); ?>/images/recruit_text.png" alt="笑いの溢れる職場です！楽しく、やりがいのある保育園を共に作りませんか？">
                </div>
            </div>

            <div class="section_03">
                <div class="title_01">
                    <img class="recruit_pr"  src="<?php bloginfo('template_directory'); ?>/images/title_en.png" alt="園について">
                </div>
                <div class="tabs">
                    <input id="fulltime" type="radio" name="tab_item" checked>
                    <label class="tab_item" for="fulltime">フルタイム</label>
                    <input id="parttime" type="radio" name="tab_item">
                    <label class="tab_item" for="parttime">パートタイム</label>

                    <div class="tab_content" id="fulltime_content">
                        <div class="tab_content_description">
                            <div class="section_table">
                                <div class="h2_box">フルタイム</div>
                                <table class="syousai_table">
                                    <tr>
                                        <th>雇用形態</th>
                                        <td class="td_left">フルタイム</td>
                                    </tr>
                                    <tr>
                                        <th>求人数</th>
                                        <td class="td_left">2人</td>
                                    </tr>
                                    <tr>
                                        <th>職種</th>
                                        <td class="td_left">保育士</td>
                                    </tr>
                                    <tr>
                                        <th>業務内容</th>
                                        <td class="td_left">・0～2歳児クラスの担任を受け持ちます。<br>
                                            ・日誌、お便り帳等の事務作業、保護者対応、行事担当等</td>
                                    </tr>
                                    <tr>
                                        <th>勤務時間</th>
                                        <td class="td_left">7：00～19：00 <br>
                                            残業：なし<br>
                                            休憩時間60分</td>
                                    </tr>
                                    <tr>
                                        <th>休日</th>
                                        <td class="td_left">土、日、祝、年末年始、慰霊の日</td>
                                    </tr>
                                    <tr>
                                        <th>給与</th>
                                        <td class="td_left">月給180,000円～193,000円</td>
                                    </tr>
                                    <tr>
                                        <th>通勤手当</th>
                                        <td class="td_left">2,000～9,000円／月</td>
                                    </tr>
                                    <tr>
                                        <th>住宅手当</th>
                                        <td class="td_left">20,000円／月</td>
                                    </tr>
                                    <tr>
                                        <th>試用期間</th>
                                        <td class="td_left">あり（3ヶ月）</td>
                                    </tr>
                                    <tr>
                                        <th>昇給</th>
                                        <td class="td_left">あり（定期）</td>
                                    </tr>
                                    <tr>
                                        <th>賞与</th>
                                        <td class="td_left">あり（年2回・前年度実績2ヶ月）</td>
                                    </tr>
                                    <tr>
                                        <th>別途徴収金</th>
                                        <td class="td_left">給食費4,500円</td>
                                    </tr>
                                    <tr>
                                        <th>福利厚生</th>
                                        <td class="td_left">・健康保険<br>
                                            ・厚生年金<br>
                                            ・雇用保険<br>
                                            ・労災保険<br>
                                            ・有給休暇（6ヶ月経過後）</td>
                                    </tr>
                                    <tr>
                                        <th>雇用期間</th>
                                        <td class="td_left">定めなし</td>
                                    </tr>
                                    <tr>
                                        <th>備考</th>
                                        <td class="td_left">マイカー通勤可（駐車場有・無料）<br>
                                            経験豊富な保育士が手厚くサポートします！</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="tab_content" id="parttime_content">
                        <div class="tab_content_description">
                            <div class="section_table">
                                <div class="h2_box">パートタイム</div>
                                <table class="syousai_table">
                                    <tr>
                                        <th>雇用形態</th>
                                        <td class="td_left">パート</td>
                                    </tr>
                                    <tr>
                                        <th>求人数</th>
                                        <td class="td_left">1人</td>
                                    </tr>
                                    <tr>
                                        <th>職種</th>
                                        <td class="td_left">保育士</td>
                                    </tr>
                                    <tr>
                                        <th>業務内容</th>
                                        <td class="td_left">・0～2歳児クラスの担任を受け持ちます。<br>
                                            ・日誌、お便り帳等の事務作業、保護者対応、行事担当等</td>
                                    </tr>
                                    <tr>
                                        <th>勤務時間</th>
                                        <td class="td_left">7：00～13：00 <br>
                                            残業：なし<br>
                                            休憩時間30分</td>
                                    </tr>
                                    <tr>
                                        <th>休日</th>
                                        <td class="td_left">土、日、祝、年末年始、慰霊の日</td>
                                    </tr>
                                    <tr>
                                        <th>給与</th>
                                        <td class="td_left">時給1,000円</td>
                                    </tr>
                                    <tr>
                                        <th>通勤手当</th>
                                        <td class="td_left">150～450円日額（往復）</td>
                                    </tr>
                                    <!-- <tr>
                                        <th>住宅手当</th>
                                        <td class="td_left">なし</td>
                                    </tr> -->
                                    <tr>
                                        <th>試用期間</th>
                                        <td class="td_left">あり（3ヶ月）</td>
                                    </tr>
                                    <tr>
                                        <th>昇給</th>
                                        <td class="td_left">あり（定期）</td>
                                    </tr>
                                    <tr>
                                        <th>賞与</th>
                                        <td class="td_left">あり（年2回）</td>
                                    </tr>
                                
                                    <tr>
                                        <th>福利厚生	</th>
                                        <td class="td_left">
                                            ・雇用保険<br>
                                            ・労災保険<br>
                                            ・有給休暇（6ヶ月経過後）</td>
                                    </tr>
                                    <tr>
                                        <th>雇用期間</th>
                                        <td class="td_left">2022年4月～2023年3月（※契約更新有り）</td>
                                    </tr>
                                    <tr>
                                        <th>備考</th>
                                        <td class="td_left">マイカー通勤可（駐車場有・無料）<br>
                                            経験豊富な保育士が手厚くサポートします！</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="more_button">
                    <a href="<?php echo get_permalink( get_page_by_path( 'introduce' )->ID ); ?>">園の紹介をもっと見る </a>
                </div>
            </div>
        </section>
        </main>
    <?php wp_footer(); ?>
    <?php include ( dirname(__FILE__) . '/footer.php' ); ?>
