<?php

if (!defined('ABSPATH')) {
    exit;
}
?>
<div class="navbar">
    <nav aria-label="منوی اصلی">
        <ul class="megamenu cmb-list">
            <!-- platfom menu -->
            <li class="dropdown-menu platform menu-item has-mega">
                <div class="mega-toggle dropdown-header">
                    <p>پلتفرم‌ها</p>
                    <svg width="8" height="8"><use href="#icon-arrow-down"></use></svg>
                </div>
                <div class="dropdown-content" style="opacity: 0; visibility: hidden;">
                    <ul class="title-sidebar-tab cmb-list">
                        <li class="cmb-contents"><div class="tab-item active" data-target="tab-broker">
                            <p>بروکر</p>
                            <svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg>
                        </div></li>
                        <li class="cmb-contents"><div class="tab-item" data-target="tab-exchange">
                            <p>صرافی</p>
                            <svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg>
                        </div></li>
                        <li class="cmb-contents"><div class="tab-item" data-target="tab-prop">
                            <p>پراپ</p>
                            <svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg>
                        </div></li>
                        <li class="cmb-contents"><div class="tab-item" data-target="tab-gold">
                            <p>پلتفرم‌های طلا</p>
                            <svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg>
                        </div></li>
                        <li class="cmb-contents"><div class="tab-item" data-target="tab-etf">
                            <p>صندوق‌های بورسی</p>
                            <svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg>
                        </div></li>
                        <li class="cmb-contents"><div class="tab-item" data-target="tab-burse">
                            <p>کارگزاری بورس</p>
                            <svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg>
                        </div></li>
                    </ul>
                    <div class="tab-content-item tabs-wrapper">
                        <div class="tab-content active" id="tab-broker">
                            <div class="category-content-sec">
                                <div class="category-content-title">
                                    <p>بروکرهای منتخب</p>
                                </div>
                                <ul class="choice-item cart-section important-content-sec cmb-list">
                                    <?php
                                    cmb_render_card_grid(cmb_query_args('brokers', 5, ['broker-tag', 'import-menu-broker']), ['show_tick' => true, 'title_class' => 'item-title', 'title_meta' => 'title']);
                                    ?>
                                </ul>
                            </div>
                            <div class="category-content-sec">
                                <div class="category-content-title">
                                    <p>بروکرهای فارکس</p>
                                </div>
                                <ul class="choice-item cart-section cmb-list">
                                    <?php
                                        cmb_render_card_grid(cmb_query_args('brokers', 10, ['broker-tag', 'menu-broker']), [ 'title_class' => 'item-title', 'title_meta' => 'title']);
                                    ?>
                                </ul>
                            </div>
                            <ul class="link-sec-content cmb-list">
                                <li class="cmb-contents"><a href="https://kodambroker.com/broker/" class="btn-landing" target="_blank">
                                    مشاهده همه بروکرها
                                    <svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg>
                                </a></li>
                            </ul>
                        </div>
                        <div class="tab-content content-item" id="tab-exchange">
                            <div class="category-content-sec">
                                <div class="category-content-title">
                                    <p>صرافی‌های منتخب</p>
                                </div>
                                <ul class="choice-item cart-section cmb-list">
                                    <?php
                                        cmb_render_card_grid(cmb_query_args('post', 5, ['post_tag', 'import-menu-exchange']), ['show_tick' => true, 'title_class' => 'item-title', 'title_meta' => 'short-title-of-the-article']);
                                    ?>
                                </ul>
                            </div>
                            <div class="category-content-sec">
                                <div class="category-content-title">
                                    <p>صرافی‌های ارز دیجیتال</p>
                                </div>
                                <ul class="choice-item cart-section cmb-list">
                                    <?php
                                        cmb_render_card_grid(cmb_query_args('post', 10, ['post_tag', 'menu-exchange']), ['title_class' => 'item-title', 'title_meta' => 'short-title-of-the-article']);
                                    ?>
                                </ul>
                            </div>
                            <ul class="link-sec-content cmb-list">
                                <li class="cmb-contents"><a href="https://kodambroker.com/exchange/" class="btn-landing" target="_blank">
                                    مشاهده همه صرافی‌ها
                                    <svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg>
                                </a></li>
                            </ul>
                        </div>
                        <div class="tab-content content-item" id="tab-prop">
                            <div class="category-content-sec">
                                <div class="category-content-title">
                                    <p>پراپ‌های منتخب</p>
                                </div>
                                <ul class="choice-item cart-section cmb-list">
                                    <?php
                                        cmb_render_card_grid(cmb_query_args('post', 4, ['post_tag', 'import-menu-prop']), ['show_tick' => true, 'title_class' => 'item-title', 'title_meta' => 'short-title-of-the-article']);
                                    ?>
                                </ul>
                            </div>
                            <div class="category-content-sec">
                                <div class="category-content-title">
                                    <p>پراپ‌ها</p>
                                </div>
                                <ul class="choice-item cart-section cmb-list">
                                    <?php
                                        cmb_render_card_grid(cmb_query_args('post', 8, ['post_tag', 'menu-prop']), [ 'title_class' => 'item-title', 'title_meta' => 'short-title-of-the-article']);
                                    ?>
                                </ul>
                            </div>
                            <ul class="link-sec-content cmb-list">
                                <li class="cmb-contents"><a href="https://kodambroker.com/prop-trading/" class="btn-landing" target="_blank">
                                    مشاهده همه پراپ‌ها
                                    <svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg>
                                </a></li>
                            </ul>
                        </div>
                        <div class="tab-content content-item" id="tab-gold">
                            <div class="category-content-sec">
                                <div class="category-content-title">
                                    <p>پلتفرم‌های منتخب</p>
                                </div>
                                <ul class="choice-item cart-section cmb-list">
                                    <?php
                                        cmb_render_card_grid(cmb_query_args('post', 4, ['post_tag', 'import-menu-gold']), ['show_tick' => true, 'title_class' => 'item-title', 'title_meta' => 'short-title-of-the-article']);
                                    ?>
                                </ul>
                            </div>
                            <div class="category-content-sec">
                                <div class="category-content-title">
                                    <p>پلتفرم‌های طلا</p>
                                </div>
                                <ul class="choice-item cart-section cmb-list">
                                    <?php
                                        cmb_render_card_grid(cmb_query_args('post', 8, ['post_tag', 'menu-gold']), ['title_class' => 'item-title', 'title_meta' => 'short-title-of-the-article']);
                                    ?>
                                </ul>
                            </div>
                            <ul class="link-sec-content cmb-list">
                                <li class="cmb-contents"><a href="https://kodambroker.com/gold-platforms/" class="btn-landing" target="_blank">
                                    مشاهده همه پلتفرم‌ها
                                    <svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg>
                                </a></li>
                            </ul>
                        </div>
                        <div class="tab-content content-item" id="tab-etf">
                            <div class="category-content-sec">
                                <div class="category-content-title">
                                    <p>صندوق‌های منتخب</p>
                                </div>
                                <ul class="choice-item cart-section cmb-list">
                                    <?php
                                        cmb_render_card_grid(cmb_query_args('post', 4, ['post_tag', 'import-menu-etf']), ['show_tick' => true, 'title_class' => 'item-title', 'title_meta' => 'short-title-of-the-article']);
                                    ?>
                                </ul>
                            </div>
                            <div class="category-content-sec">
                                <div class="category-content-title">
                                    <p>صندوق‌های بورسی</p>
                                </div>
                                <ul class="choice-item cart-section cmb-list">
                                    <?php
                                        cmb_render_card_grid(cmb_query_args('post', 8, ['post_tag', 'menu-etf']), ['title_class' => 'item-title', 'title_meta' => 'short-title-of-the-article']);
                                    ?>
                                </ul>
                            </div>
                            <ul class="link-sec-content cmb-list">
                                <li class="cmb-contents"><a href="https://kodambroker.com/etf/" class="btn-landing" target="_blank">
                                    مشاهده همه صندوق‌ها
                                    <svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg>
                                </a></li>
                            </ul>
                        </div>
                        <div class="tab-content content-item" id="tab-burse">
                            <div class="category-content-sec">
                                <div class="category-content-title">
                                    <p>کارگزاری‌های منتخب</p>
                                </div>
                                <ul class="choice-item cart-section cmb-list">
                                    <?php
                                        cmb_render_card_grid(cmb_query_args('post', 4, ['post_tag', 'import-menu-bourse']), ['show_tick' => true, 'title_class' => 'item-title', 'title_meta' => 'short-title-of-the-article']);
                                    ?>
                                </ul>
                            </div>
                            <div class="category-content-sec">
                                <div class="category-content-title">
                                    <p>کارگزاری‌های بورسی</p>
                                </div>
                                <ul class="choice-item cart-section cmb-list">
                                    <?php
                                        cmb_render_card_grid(cmb_query_args('post', 8, ['post_tag', 'menu-bourse']), [ 'title_class' => 'item-title', 'title_meta' => 'short-title-of-the-article']);
                                    ?>
                                </ul>
                            </div>
                            <ul class="link-sec-content cmb-list">
                                <li class="cmb-contents"><a href="https://kodambroker.com/bourse/" class="btn-landing" target="_blank">
                                    مشاهده همه کارگزاری‌ها
                                    <svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg>
                                </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </li>
            <!-- End platfom menu -->
            <!-- quick select menu -->
            <li class="dropdown-menu quick-select menu-item has-mega">
                <div class="mega-toggle dropdown-header">
                    <p>انتخاب سریع</p>
                    <svg width="8" height="8"><use href="#icon-arrow-down"></use></svg>
                </div>
                <div class="dropdown-content" style="opacity: 0; visibility: hidden;">
                    <ul class="title-sidebar-tab cmb-list">
                        <li class="cmb-contents"><div class="tab-item active" data-target="tab-quickselect-broker">
                            <p>انتخاب سریع بروکر</p>
                            <svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg>
                        </div></li>
                        <li class="cmb-contents"><div class="tab-item" data-target="tab-quickselect-exchange">
                            <p>انتخاب سریع صرافی</p>
                            <svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg>
                        </div></li>
                        <li class="cmb-contents"><div class="tab-item" data-target="tab-quickselect-prop">
                            <p>انتخاب سریع پراپ</p>
                            <svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg>
                        </div></li>
                    </ul>
                    <div class="tab-content-item tabs-wrapper">
                        <div class="tab-content active" id="tab-quickselect-broker">
                            <div class="category-content-sec">
                                <div class="category-content-title">
                                    <p>انتخاب سریع بروکر</p>
                                </div>
                                <div class="sec-content">
                                    <ul class="choice-item cart-section tab-quickselect-content cmb-list">
                                        <li class="cmb-contents"><a class="cart-item quickselect-broker" href="https://kodambroker.com/blog/best-broker-scalp/" target="_blank">
                                            <div class="d-flex">
                                                <svg width="6" height="6"><use href="#icon-cricle"></use></svg>
                                                بهترین بروکر برای اسکالپ
                                            </div>
                                        </a></li>
                                        <li class="cmb-contents"><a class="cart-item quickselect-broker" href="https://kodambroker.com/blog/broker-with-minimum-deposit/" target="_blank">
                                            <div class="d-flex">
                                                <svg width="6" height="6"><use href="#icon-cricle"></use></svg>
                                                بهترین بروکر با حداقل واریز
                                            </div>
                                        </a></li>
                                        <li class="cmb-contents"><a class="cart-item quickselect-broker" href="https://kodambroker.com/blog/best-broker-swap/" target="_blank">
                                            <div class="d-flex">
                                                <svg width="6" height="6"><use href="#icon-cricle"></use></svg>
                                                بهترین بروکر از نظر سواپ
                                            </div>
                                        </a></li>
                                        <li class="cmb-contents"><a class="cart-item quickselect-broker" href="https://kodambroker.com/blog/best-brokers-with-islamic-account/" target="_blank">
                                            <div class="d-flex">
                                                <svg width="6" height="6"><use href="#icon-cricle"></use></svg>
                                                بهترین بروکر با حساب اسلامی
                                            </div>
                                        </a></li>
                                        <li class="cmb-contents"><a class="cart-item quickselect-broker" href="https://kodambroker.com/blog/the-best-broker-in-terms-of-leverage/" target="_blank">
                                            <div class="d-flex">
                                                <svg width="6" height="6"><use href="#icon-cricle"></use></svg>
                                                بهترین بروکر از نظر لوریج
                                            </div>
                                        </a></li>
                                        <li class="cmb-contents"><a class="cart-item quickselect-broker"href="https://kodambroker.com/blog/copy-trading-platforms/" target="_blank">
                                            <div class="d-flex">
                                                <svg width="6" height="6"><use href="#icon-cricle"></use></svg>
                                                بهترین بروکر برای کپی ترید
                                            </div>
                                        </a></li>
                                        <li class="cmb-contents"><a class="cart-item quickselect-broker" href="https://kodambroker.com/blog/best-brokers-for-demo-account/" target="_blank">
                                            <div class="d-flex">
                                                <svg width="6" height="6"><use href="#icon-cricle"></use></svg>
                                                بهترین بروکر برای حساب دمو
                                            </div>
                                        </a></li>
                                        <li class="cmb-contents"><a class="cart-item quickselect-broker" href="https://kodambroker.com/blog/the-best-broker-for-gold-trading/" target="_blank">
                                            <div class="d-flex">
                                                <svg width="6" height="6"><use href="#icon-cricle"></use></svg>
                                                بهترین بروکر برای معاملات طلا
                                            </div>
                                        </a></li>
                                        <li class="cmb-contents"><a class="cart-item quickselect-broker" href="https://kodambroker.com/blog/best-broker-for-pamm-accounts/" target="_blank">
                                            <div class="d-flex">
                                                <svg width="6" height="6"><use href="#icon-cricle"></use></svg>
                                                بهترین بروکر برای حساب پم
                                            </div>
                                        </a></li>
                                        <li class="cmb-contents"><a class="cart-item quickselect-broker" href="https://kodambroker.com/blog/best-broker-tradingview/" target="_blank">
                                            <div class="d-flex">
                                                <svg width="6" height="6"><use href="#icon-cricle"></use></svg>
                                                بهترین بروکر تریدینگ ویو
                                            </div>
                                        </a></li>
                                    </ul>
                                    <div class="side-image">
                                        <img  src="<?php echo CMB_URL . 'assets/image/quick-select-broker.webp'; ?>" width="320" height="312" alt="انتخاب سریع بروکر فارکس"/>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="tab-content" id="tab-quickselect-exchange">
                            <div class="category-content-sec">
                                <div class="category-content-title">
                                    <p>انتخاب سریع صرافی</p>
                                </div>
                                <div class="sec-content">
                                    <ul class="choice-item cart-section tab-quickselect-content cmb-list">
                                        <li class="cmb-contents"><a class="cart-item quickselect-exchange" href="https://kodambroker.com/blog/exchange-without-age-restrictions/" target="_blank">
                                            <div class="d-flex">
                                                <svg width="6" height="6"><use href="#icon-cricle"></use></svg>
                                                صرافی بدون محدودیت سنی
                                            </div>
                                        </a></li>
                                        <li class="cmb-contents"><a class="cart-item quickselect-exchange" href="https://kodambroker.com/blog/exchange-without-authentication/" target="_blank">
                                            <div class="d-flex">
                                                <svg width="6" height="6"><use href="#icon-cricle"></use></svg>
                                                صرافی بدون اهراز هویت
                                            </div>
                                        </a></li>
                                        <li class="cmb-contents"><a class="cart-item quickselect-exchange" href="https://kodambroker.com/blog/best-decentralized-exchanges-for-iranians/" target="_blank">
                                            <div class="d-flex">
                                                <svg width="6" height="6"><use href="#icon-cricle"></use></svg>
                                                صرافی غیر متمرکز
                                            </div>
                                        </a></li>
                                        <li class="cmb-contents"><a class="cart-item quickselect-exchange" href="https://kodambroker.com/blog/exchanges-regulated-by-central-banks/" target="_blank">
                                            <div class="d-flex">
                                                <svg width="6" height="6"><use href="#icon-cricle"></use></svg>
                                                صرافی مورد تایید بانک مرکزی
                                            </div>
                                        </a></li>
                                        <li class="cmb-contents"><a class="cart-item quickselect-exchange" href="https://kodambroker.com/blog/exchanges-approved-by-fata-police/" target="_blank">
                                            <div class="d-flex">
                                                <svg width="6" height="6"><use href="#icon-cricle"></use></svg>
                                                صرافی مورد تایید پلیس فتا
                                            </div>
                                        </a></li>
                                        <li class="cmb-contents"><a class="cart-item quickselect-exchange" href="https://kodambroker.com/blog/crypto-exchanges-with-most-coins/" target="_blank">
                                            <div class="d-flex">
                                                <svg width="6" height="6"><use href="#icon-cricle"></use></svg>
                                                صرافی با بیشترین ارز دیجیتال
                                            </div>
                                        </a></li>
                                    </ul>
                                    <div class="side-image">
                                        <img  src="<?php echo CMB_URL . 'assets/image/quick-select-exchange.webp'; ?>" width="320" height="312" alt="انتخاب سریع صرافی ارز دیجیتال"/>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="tab-content" id="tab-quickselect-prop">
                            <div class="category-content-sec">
                                <div class="category-content-title">
                                    <p>انتخاب سریع پراپ</p>
                                </div>
                                <div class="sec-content">
                                    <ul class="choice-item cart-section tab-quickselect-content cmb-list">
                                        <li class="cmb-contents"><a class="cart-item quickselect-prop" href="https://kodambroker.com/blog/global-prop-firm/" target="_blank">
                                            <div class="d-flex">
                                                <svg width="6" height="6"><use href="#icon-cricle"></use></svg>
                                                بهترین پراپ خارجی
                                            </div>
                                        </a></li>
                                        <li class="cmb-contents"><a class="cart-item quickselect-prop" href="https://kodambroker.com/blog/crypto-prop/" target="_blank">
                                            <div class="d-flex">
                                                <svg width="6" height="6"><use href="#icon-cricle"></use></svg>
                                                بهترین پراپ کریپتو
                                            </div>
                                        </a></li>
                                        <li class="cmb-contents"><a class="cart-item quickselect-prop" href="https://kodambroker.com/blog/free-prop-trading/" target="_blank">
                                            <div class="d-flex">
                                                <svg width="6" height="6"><use href="#icon-cricle"></use></svg>
                                                بهترین پراپ رایگان
                                            </div>
                                        </a></li>
                                        <li class="cmb-contents"><a class="cart-item quickselect-prop" href="https://kodambroker.com/blog/review-of-the-1k-prop/" target="_blank">
                                            <div class="d-flex">
                                                <svg width="6" height="6"><use href="#icon-cricle"></use></svg>
                                                پراپ 1000 دلاری
                                            </div>
                                        </a></li>
                                        <li class="cmb-contents"><a class="cart-item quickselect-prop" href="https://kodambroker.com/blog/prop-100-thousand-dollars/" target="_blank">
                                            <div class="d-flex">
                                                <svg width="6" height="6"><use href="#icon-cricle"></use></svg>
                                                پراپ 100 هزار دلاری
                                            </div>
                                        </a></li>
                                        <li class="cmb-contents"><a class="cart-item quickselect-prop" href="https://kodambroker.com/blog/prop-200-thousand-dollars/" target="_blank">
                                            <div class="d-flex">
                                                <svg width="6" height="6"><use href="#icon-cricle"></use></svg>
                                                پراپ 200 هزار دلاری
                                            </div>
                                        </a></li>
                                    </ul>
                                    <div class="side-image">
                                        <img  src="<?php echo CMB_URL . 'assets/image/quick-select-prop.webp'; ?>" width="320" height="312" alt="انتخاب سریع پراپ فرم"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <!-- End quick select menu -->
            <!-- services menu -->
            <li class="dropdown-menu tools-and-services menu-item has-mega">
                <div class="mega-toggle dropdown-header">
                    <p>ابزار و خدمات</p>
                    <svg width="8" height="8"><use href="#icon-arrow-down"></use></svg>
                </div>
                <div class="dropdown-content"  style="opacity: 0; visibility: hidden;">
                    <ul class="title-sidebar-tab cmb-list">
                        <li class="cmb-contents"><div class="tab-item active" data-target="tab-bonus-forex">
                            <p>بونوس فارکس</p>
                            <svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg>
                        </div></li>
                        <li class="cmb-contents"><div class="tab-item" data-target="tab-bonus-crypto">
                            <p>بونوس کریپتو</p>
                            <svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg>
                        </div></li>
                        <li class="cmb-contents"><div class="tab-item" data-target="tab-discount">
                            <p>کد تخفیف</p>
                            <svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg>
                        </div></li>
                        <li class="cmb-contents"><div class="tab-item" data-target="tab-rebate">
                            <p>ریبیت</p>
                            <svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg>
                        </div></li>
                        <li class="cmb-contents"><div class="tab-item" data-target="tab-calculator">
                            <p>ماشین حساب</p>
                            <svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg>
                        </div></li>
                        <li class="cmb-contents"><div class="tab-item" data-target="tab-indicator">
                            <p>اندیکاتور</p>
                            <svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg>
                        </div></li>
                        <li class="cmb-contents"><a class="tab-item" href="https://kodambroker.com/economic_calendar/" target="_blank">
                            <p>تقویم اقتصادی</p>
                            <svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg>
                        </a></li>
                    </ul>
                    <div class="tab-content-item tabs-wrapper">
                        <div class="tab-content active" id="tab-bonus-forex">
                            <div class="category-content-sec">
                                <div class="category-content-title">
                                    <p>بونوس فارکس</p>
                                </div>
                                <div class="sec-content">
                                    <div class="serv-contents-sec">
                                        <ul class="choice-item spcontent-section cmb-list">
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/blog/alpari-bonus/" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>بونوس آلپاری</a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/best-brokers-bonus/#trendo-bonus" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>بونوس ترندو </a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/blog/litefinance-bonus/" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>بونوس لایت فایننس</a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/best-brokers-bonus/#wmmarkets-bonus" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>بونوس دبلیو ام مارکتس</a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/blog/capitalxtend-bonus/" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>بونوس کپیتال اکستند</a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/best-brokers-bonus/#mondfx-bonus" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>بونوس موند اف ایکس</a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/blog/amarkets-bonus/" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>بونوس آمارکتس</a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/best-brokers-bonus/#errante-bonus" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>بونوس ارانته</a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services"  href="https://kodambroker.com/best-brokers-bonus/#stp-bonus" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>بونوس اس تی پی تریدینگ</a></li>
                                        </ul>
                                        <ul class="link-sec-content cmb-list">
                                            <li class="cmb-contents"><a href="https://kodambroker.com/best-brokers-bonus/" class="btn-landing" target="_blank">
                                                مشاهده همه بونوس‌ها                                  
                                                <svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg>
                                            </a></li>
                                        </ul>
                                    </div>
                                    <div class="side-image">
                                        <img  src="<?php echo CMB_URL . 'assets/image/bonus-forex.webp'; ?>" width="320" height="312" alt="بونوس بروکرهای فارکس"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content" id="tab-bonus-crypto">
                            <div class="category-content-sec">
                                <div class="category-content-title">
                                    <p>بونوس کریپتو</p>
                                </div>
                                <div class="sec-content">
                                    <div class="serv-contents-sec">
                                        <ul class="choice-item spcontent-section cmb-list">
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/blog/lbank-bonus/" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>بونوس ال بانک</a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/blog/bonus-toobit/" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>بونوس توبیت</a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/blog/bonus-coinex/" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>بونوس کوینکس </a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/blog/bonus-kcex/" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>بونوس کی سی ایکس</a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/blog/bonus-at-bitunix/" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>بونوس بیت یونیکس</a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services"  href="https://kodambroker.com/blog/bonus-versland/" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>بونوس ورسلند</a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/bonus-exchange/#bingx-bonus" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>بونوس بینگ ایکس</a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/blog/bonus-xt/" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>بونوس ایکس تی</a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/bonus-exchange/#bybit-bonus" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>بونوس بای‌بیت</a></li>
                                        </ul>
                                        <ul class="link-sec-content cmb-list">
                                            <li class="cmb-contents"><a href="https://kodambroker.com/bonus-exchange/" class="btn-landing" target="_blank">
                                                مشاهده همه بونوس‌ها                                  
                                                <svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg>
                                            </a></li>
                                        </ul>
                                    </div>
                                    <div class="side-image">
                                        <img  src="<?php echo CMB_URL . 'assets/image/bonus-crypto.webp'; ?>" width="320" height="312" alt="بونوس صرافی‌های ارز دیجیتال"/>
                                    </div>
                                </div>
                            </div> 
                        </div>
                        <div class="tab-content" id="tab-discount">
                            <div class="category-content-sec">
                                <div class="category-content-title">
                                    <p>کد تخفیف</p>
                                </div>
                                <div class="sec-content">
                                    <div class="serv-contents-sec">
                                        <ul class="choice-item spcontent-section cmb-list">
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/prop-discount/#divabon-discount" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>کد تخفیف پراپ دیوابون</a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/prop-discount/#zorafx-discount" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>کد تخفیف پراپ زورا اف ایکس  </a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/prop-discount/#propco-discount" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>کد تخفیف پراپ پراپکو</a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/prop-discount/#sgb-discount" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>کد تخفیف پراپ سرمایه‌گذار برتر</a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/prop-discount/#sdf-discount" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>کد تخفیف پراپ کریپتو اس دی اف</a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/prop-discount/#myprop-discount" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>کد تخفیف پراپ مای پراپ</a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/prop-discount/#fenefx-discount"  target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>کد تخفیف پراپ فنفیکس</a></li>
                                        </ul>
                                        <ul class="link-sec-content cmb-list">
                                            <li class="cmb-contents"><a href="https://kodambroker.com/prop-discount/" class="btn-landing" target="_blank">
                                                مشاهده همه کد تخفیف‌ها
                                                <svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg>
                                            </a></li>
                                        </ul>
                                    </div>
                                    <div class="side-image">
                                        <img  src="<?php echo CMB_URL . 'assets/image/discount-prop.webp'; ?>" width="320" height="312" alt="کد تخفیف پراپ فرم‌ها"/>
                                    </div>
                                </div>   
                            </div>
                        </div>
                        <div class="tab-content" id="tab-rebate">
                            <div class="category-content-sec">
                                <div class="category-content-title">
                                    <p>ریبیت</p>
                                </div>
                                <div class="sec-content">
                                    <div class="serv-contents-sec">
                                        <ul class="choice-item spcontent-section cmb-list">
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/receive-rebate/#errante-rebate" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>ریبیت بروکر ارانته</a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/receive-rebate/#litefinance-rebate" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>ریبیت بروکر لایت فایننس</a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/receive-rebate/#amarkets-rebate" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>ریبیت بروکر آمارکتس</a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/receive-rebate/#alpari-rebate" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>ریبیت بروکر آلپاری  </a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/receive-rebate/#capital-rebate" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>ریبیت بروکر کپیتال اکستند</a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services"  href="https://kodambroker.com/receive-rebate/#opofinance-rebate" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>ریبیت بروکر اپوفایننس  </a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/receive-rebate/#wmmarkets-rebate" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>ریبیت بروکر دبلیو ام مارکتس</a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/receive-rebate/#fibo-rebate" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>ریبیت بروکر فیبوگروپ</a></li>
                                            <li class="cmb-contents"><a class="cart-item-link content-services" href="https://kodambroker.com/receive-rebate/#vittaverse-rebate" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>ریبیت بروکر ویتاورس  </a></li>
                                        </ul>
                                        <ul class="link-sec-content cmb-list">
                                            <li class="cmb-contents"><a href="https://kodambroker.com/receive-rebate/" class="btn-landing" target="_blank">
                                                مشاهده همه ریبیت‌ها                                 
                                                <svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg>
                                            </a></li>
                                        </ul>
                                    </div>
                                    <div class="side-image">
                                        <img  src="<?php echo CMB_URL . 'assets/image/rebate.webp'; ?>" width="320" height="312" alt="ریبیت بروکرهای فارکس"/>
                                    </div>
                                </div>
                            </div>    
                        </div>
                        <div class="tab-content" id="tab-calculator">
                            <div class="category-content-sec">
                                <div class="category-content-title">
                                    <p>ماشین‌ حساب‌های فارکس</p>
                                </div>
                                <div class="sec-content">
                                    <ul class="choice-item spcontent-section cmb-list">
                                        <li class="cmb-contents"><a class="cart-item-link" href="https://kodambroker.com/calculators/pip-calculator/"  target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>ماشین حساب پیپ</a></li>
                                        <li class="cmb-contents"><a class="cart-item-link" href="https://kodambroker.com/calculators/pivot-calculator/" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>ماشین حساب پیووت</a></li>
                                        <li class="cmb-contents"><a class="cart-item-link" href="https://kodambroker.com/calculators/profit-calculator/"  target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>ماشین حساب سود و زیان</a></li>
                                        <li class="cmb-contents"><a class="cart-item-link" href="https://kodambroker.com/calculators/lot-calculator/" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>ماشین حساب لات</a></li>
                                        <li class="cmb-contents"><a class="cart-item-link" href="https://kodambroker.com/calculators/fibonacci-calculator/" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>ماشین حساب فیبوناچی</a></li>
                                        <li class="cmb-contents"><a class="cart-item-link" href="https://kodambroker.com/calculators/compound-interest-calculator/" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>ماشین حساب سود مرکب</a></li>
                                        <li class="cmb-contents"><a class="cart-item-link" href="https://kodambroker.com/calculators/margin-calculator/" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>ماشین حساب مارجین</a></li>
                                    </ul>
                                    <div class="side-image">
                                        <img  src="<?php echo CMB_URL . 'assets/image/calculator.webp'; ?>" width="320" height="312" alt="ماشین حساب‌های فارکس"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content content-item" id="tab-indicator">
                            <div class="category-content-sec">
                                <div class="category-content-title">
                                    <p>اندیکاتورهای متاتریدر</p>
                                </div>
                                <div class="sec-content">
                                    <ul class="choice-item spcontent-section cmb-list">
                                        <li class="cmb-contents"><a class="cart-item-link" href="https://kodambroker.com/indicator/?indicator-platform=%D9%85%D8%AA%D8%A7%D8%AA%D8%B1%DB%8C%D8%AF%D8%B1%204" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>اندیکاتورهای متاتریدر 4</a></li>
                                        <li class="cmb-contents"><a class="cart-item-link" href="https://kodambroker.com/indicator/?indicator-platform=%D9%85%D8%AA%D8%A7%D8%AA%D8%B1%DB%8C%D8%AF%D8%B1%205" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>اندیکاتورهای متاتریدر 5</a></li>
                                        <li class="cmb-contents"><a class="cart-item-link" href="https://kodambroker.com/indicator/?indicator-platform=%D8%AA%D8%B1%DB%8C%D8%AF%DB%8C%D9%86%DA%AF%20%D9%88%DB%8C%D9%88" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>اندیکاتورهای تریدینگ ویو</a></li>
                                        <li class="cmb-contents"><a class="cart-item-link" href="https://kodambroker.com/indicator/" target="_blank"><svg width="6" height="6"><use href="#icon-cricle"></use></svg>همه اندیکاتورها</a></li>
                                    </ul>
                                    <div class="side-image">
                                        <img  src="<?php echo CMB_URL . 'assets/image/indicator.webp'; ?>" width="320" height="312" alt="اندیکاتورهای متاتریدر و تریدینگ ویو"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <!-- End services menu -->
            <!-- blogs menu -->
            <li class="dropdown-menu blogs menu-item submenu">
                <div class="mega-toggle dropdown-header">
                    <p>بلاگ</p>
                    <svg width="8" height="8"><use href="#icon-arrow-down"></use></svg>
                </div>
                <ul class="dropdown-content cmb-list"  style="opacity: 0; visibility: hidden;">
                    <li class="cmb-contents"><div class="submenu-link"><a href="https://kodambroker.com/blog/" target="_blank">مقالات</a><svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg></div></li>
                    <li class="cmb-contents"><div class="submenu-link"><a href="https://kodambroker.com/analysis/" target="_blank">تحلیل</a><svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg></div></li>
                    <li class="cmb-contents"><div class="submenu-link"><a href="https://kodambroker.com/education/learn-crypto/" target="_blank">آکادمی کریپتو</a><svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg></div></li>
                    <li class="cmb-contents"><div class="submenu-link"><a href="https://kodambroker.com/education/learn-forex/" target="_blank">آکادمی فارکس</a><svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg></div></li>
                    <li class="cmb-contents"><div class="submenu-link"><a href="https://kodambroker.com/master/" target="_blank">اساتید فارکس</a><svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg></div></li>
                </ul>
            </li>
            <!-- End blogs menu -->
        </ul>
    </nav>
</div>
<?php
