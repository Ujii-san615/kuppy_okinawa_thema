<?php include ( dirname(__FILE__) . '/header.php' ); ?>
<?php wp_header(); ?>

<main>
        <!-- slider -->        
        <div class="top_slider">
        <?php
            echo do_shortcode('[smartslider3 slider="2"]');
            ?>
        </div>
        <!-- section1 -->
        <section>
            <div class="section_01">
                <h1 class="title_01">
                    <img src="<?php bloginfo('template_directory'); ?>/images/title_news.png" alt="お知らせ">
                </h1>

                <div id="posts" class="news_table">
                    
                    <ul>
                        <?php
                            global $post;
                            $tmp_post = $post; // このPHPコードを実行する前の記事データを退避。
                            $category_slugs = array(
                                'infomation',
                            );
                            // カテゴリスラッグを配列で指定。
                            $this_categories = get_the_category();
                                if ( $this_categories ) {
                                    $this_category_color = get_field( 'color', 'category_' . $this_categories[0]->term_id );
                                    $this_category_name  = $this_categories[0]->name;
                                }
                            $category_ids = array();
                            foreach ( $category_slugs as $category_slug ) {
                                $idObj = get_category_by_slug( $category_slug ); // 指定したカテゴリスラッグから、get_category_by_slug 関数でカテゴリIDを取得。
                                $category_id = $idObj->term_id;
                                array_push( $category_ids, $category_id ); // カテゴリIDを配列に格納。
                            }
                            $numberposts = '4'; // 取得する最大投稿記事数を指定。
                            foreach ( $category_ids as $category_id ) { // 指定したカテゴリスラッグの数だけ繰り返す。
                        
                            $postslist = get_posts( "category=$category_id&numberposts=$numberposts&order=DESC&orderby=date" );
                            // get_posts 関数で、投稿記事データを取得し、配列に格納
                            foreach ( $postslist as $post ) {
                            // 取得した投稿記事データを1つづつ表示
                        ?>

                            <a href="<?php echo get_permalink(); ?>">
                                <li class="li_box">
                                    <div class="day"><?php the_time('Y/n/j'); ?>&nbsp;&nbsp;</div>
                                    <div class="lavel"><?php echo '<span class="entry-label" style="' . esc_attr( 'background:' . $this_category_color ) . ';">' . esc_html( $this_category_name ) . '</span>'; ?></div>
                                    <div class="text"><?php the_title(); ?></div>
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
                <div class="more_button">
                    <a href="<?php echo get_permalink( get_page_by_path( 'news' )->ID ); ?>">もっと見る </a>
                </div>
            </div>
        </section>
        <!-- section1 -->
        <section>
            <div class="section_01">
                <h1 class="title_01">
                    <img src="<?php bloginfo('template_directory'); ?>/images/title_omoi.png" alt="クッピー乳児園の想い">
                </h1>
                <div class="omoi_box">
                    <div class="omoi_photo">
                        <img src="<?php bloginfo('template_directory'); ?>/images/index04.jpg" alt="">
                    </div>
                    <div class="omoi_main">
                        <img src="<?php bloginfo('template_directory'); ?>/images/omoi.png" alt="">
                    </div>
                </div>
            </div>
            <div class="more_button">
                <a href="<?php echo get_permalink( get_page_by_path( 'schedule' )->ID ); ?>">園の生活について</a>
            </div>
        </section>
        <!-- section2 -->
        <section>
            <div class="section">
                <div class="section_line">
                    <img src="<?php bloginfo('template_directory'); ?>/images/line_flower.png" alt="">
                </div>
                <h1 class="title_01">
                    <img src="<?php bloginfo('template_directory'); ?>/images/title_syoukibo.png" alt="小規模保育園とは？">
                </h1>
                <div class="section_box">
                    <div class="section_square" id="square1">
                        <img src="<?php bloginfo('template_directory'); ?>/images/icon1.png" alt="０〜３歳未満対象">
                        <p class="square">０〜３歳未満対象</p>
                    </div>
                    <div class="section_square" id="square2">
                        <img src="<?php bloginfo('template_directory'); ?>/images/icon2.png" alt="定員数19人以下の小規模保育">
                        <p class="square">定員数19人以下の<br>
                            小規模保育</p>
                    </div>
                    <div class="section_square" id="square3">
                        <img src="<?php bloginfo('template_directory'); ?>/images/icon3.png" alt="２歳児常クラス卒園後、認可保育園へ進級">
                        <p class="square">２歳児常クラス卒園後、<br>
                            認可保育園へ進級</p>
                    </div>
                </div>
                
                <p class="section_text">クッピー乳児園では、通の保育士の配置基準より保育士を1名多く配置しており、<br>
                    個々の発達に応じた丁寧な保育を行うことができます。</p>
                
                <div class="section_small">
                    <h2>＜連携施設一覧＞</h2>
                    <p class="section_small_text">
                        ①どんぐりの里保育園　②赤道あおぞら保育園　<br>③ポケット保育園　④ぎのわんおひさま保育園
                    </p>
                </div>
                <div class="more_button">
                    <a href="<?php echo get_permalink( get_page_by_path( 'hoiku' )->ID ); ?>">保育内容詳細はこちら </a>
                </div>
                <div class="section_line">
                    <img src="<?php bloginfo('template_directory'); ?>/images/line_flower.png" alt="">
                </div>
            </div>
        </section>
        
        <section>
            <div class="section section_wrap">
                <div class="section_half">
                    <h1 class="title_01">
                        <img src="<?php bloginfo('template_directory'); ?>/images/title_en.png" alt="園について">
                    </h1>
                    <div class="section_table">
                        <h2 class="h2_box">定員状況</h2>
                        <p class="table_text">※現在空きはございません。（８月１日時点）</p>
                        <table class="syousai_table">
                            <tr>
                                <th>年齢</th>
                                    <td>0歳児</td>
                                    <td>1歳児</td>
                                    <td>2歳児</td>
                            </tr>
                            <tr>
                                <th>定員</th>
                                    <td>6名</td>
                                    <td>6名</td>
                                    <td>7名</td>
                            </tr>
                            <tr>
                                <th>現員</th>
                                    <td>6名</td>
                                    <td>6名</td>
                                    <td>7名</td>
                            </tr>
                        </table>
                    </div>
                    <div class="section_table">
                        <h2 class="h2_box">保育時間</h2>
                        <h3 class="h3_left"><span class="table_subtitle">《通常保育》</span></h3>
                            <table class="syousai_table">
                                <tr>
                                    <th>保育時間</th>
                                        <td class="td_left">7：00～18：00</td>
                                </tr>
                                <tr>
                                    <th>延長保育</th>
                                    <td class="td_left">18：00～19：00（利用料 300円 / 1日 2500円 / 月額）</td>
                                </tr>
                            </table>
                        <h3 class="h3_left"><span class="table_subtitle">《土曜保育》</span></h3>
                            <table class="syousai_table">
                                <tr>
                                    <th>保育時間</th>
                                    <td class="td_left">7：00～18：00</td>
                                </tr>
                            </table>
                    </div>
                    <div class="section_table">
                        <h2 class="h2_box">概要</h2>
                        <table class="syousai_table">
                            <tr>
                                <th>事業所名</th>
                                <td class="td_left">クッピー乳児園</td>
                            </tr>
                            <tr>
                                <th>電話番号</th>
                                <td class="td_left">098-898-5657</td>
                            </tr>
                            <tr>
                                <th>住所</th>
                                <td class="td_left">〒901-2214　沖縄県宜野湾市我如古1-55-13-2F</td>
                            </tr>
                            <tr>
                                <th>開園日</th>
                                <td class="td_left">月曜〜土曜</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="section_half">
                    <h1 class="title_01">
                        <img src="<?php bloginfo('template_directory'); ?>/images/title_accses.png" alt="アクセス">
                    </h1>
                    <div class="map pc">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d28624.863267331!2d127.757005!3d26.258161!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfdf388e35d023df7!2z44Kv44OD44OU44O85Lmz5YWQ5ZyS!5e0!3m2!1sja!2sjp!4v1637250734732!5m2!1sja!2sjp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>                </div>
                    <div class="map sp">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d28624.863267331!2d127.757005!3d26.258161!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xfdf388e35d023df7!2z44Kv44OD44OU44O85Lmz5YWQ5ZyS!5e0!3m2!1sja!2sjp!4v1637250734732!5m2!1sja!2sjp" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>                </div>
                    </div>
                </div>
        </section>
    </main>
    <?php wp_footer(); ?>
    <?php include ( dirname(__FILE__) . '/footer.php' ); ?>


