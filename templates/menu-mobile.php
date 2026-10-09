<?php
if (!defined('ABSPATH')) {
    exit;
}

require_once CMB_PATH . 'includes/mobile-helpers.php';
$amb_url = static function ($path) {
    return home_url('/' . ltrim((string) $path, '/'));
};

$amb_platforms = [
    'brokerPanel'       => ['بروکر', 'brokers', ['broker-tag', 'import-menu-broker'], ['broker-tag', 'menu-broker'], 'title', 'broker/', 'مشاهده همه بروکرها'],
    'exchangePanel'     => ['صرافی', 'post', ['post_tag', 'import-menu-exchange'], ['post_tag', 'menu-exchange'], 'short-title-of-the-article', 'exchange/', 'مشاهده همه صرافی‌ها'],
    'propPanel'         => ['پراپ', 'post', ['post_tag', 'import-menu-prop'], ['post_tag', 'menu-prop'], 'short-title-of-the-article', 'prop-trading/', 'مشاهده همه پراپ‌ها'],
    'goldplatformPanel' => ['پلتفرم‌های طلا', 'post', ['post_tag', 'import-menu-gold'], ['post_tag', 'menu-gold'], 'short-title-of-the-article', 'gold-platforms/', 'مشاهده همه پلتفرم‌های طلا'],
    'etfPanel'          => ['صندوق‌های بورسی', 'post', ['post_tag', 'import-menu-etf'], ['post_tag', 'menu-etf'], 'short-title-of-the-article', 'etf/', 'مشاهده همه صندوق‌های بورسی'],
    'boursePanel'       => ['کارگزاری بورس', 'post', ['post_tag', 'import-menu-bourse'], ['post_tag', 'menu-bourse'], 'short-title-of-the-article', 'bourse/', 'مشاهده همه کارگزاری‌ها'],
];

$amb_units = [
    'brokerPanel'       => 'بروکر',
    'exchangePanel'     => 'صرافی',
    'propPanel'         => 'پراپ',
    'goldplatformPanel' => 'پلتفرم',
    'etfPanel'          => 'صندوق',
    'boursePanel'       => 'کارگزاری',
];
$amb_latest_titles = [
    'brokerPanel'       => 'بروکرهای فارکس',
    'exchangePanel'     => 'صرافی‌های ارز دیجیتال',
    'propPanel'         => 'پراپ‌ها',
    'goldplatformPanel' => 'پلتفرم‌های طلا',
    'etfPanel'          => 'صندوق‌های بورسی',
    'boursePanel'       => 'کارگزاری‌های بورس',
];
$amb_link_panels = [
    'forexBonusPanel' => ['بونوس فارکس', [
        ['بونوس آلپاری', 'blog/alpari-bonus/'],
        ['بونوس ترندو', 'best-brokers-bonus/#trendo-bonus'],
        ['بونوس لایت فایننس', 'blog/litefinance-bonus/'],
        ['بونوس دبلیو ام مارکتس', 'best-brokers-bonus/#wmmarkets-bonus'],
        ['بونوس کپیتال اکستند', 'blog/capitalxtend-bonus/'],
        ['بونوس موند اف ایکس', 'best-brokers-bonus/#mondfx-bonus'],
        ['بونوس آمارکتس', 'blog/amarkets-bonus/'],
        ['بونوس ارانته', 'best-brokers-bonus/#errante-bonus'],
        ['بونوس اس تی پی تریدینگ', 'best-brokers-bonus/#stp-bonus'],
    ], ['مشاهده همه بونوس‌ها', 'best-brokers-bonus/']],
    'cryptoBonusPanel' => ['بونوس کریپتو', [
        ['بونوس ال بانک', 'blog/lbank-bonus/'],
        ['بونوس توبیت', 'blog/bonus-toobit/'],
        ['بونوس کوینکس', 'blog/bonus-coinex/'],
        ['بونوس کی سی ایکس', 'blog/bonus-kcex/'],
        ['بونوس بیت یونیکس', 'blog/bonus-at-bitunix/'],
        ['بونوس ایکس تی', 'blog/bonus-xt/'],
        ['بونوس ورسلند', 'blog/bonus-versland/'],
        ['بونوس بینگ ایکس', 'bonus-exchange/#bingx-bonus'],
        ['بونوس بای‌بیت', 'bonus-exchange/#bybit-bonus'],
    ], ['مشاهده همه بونوس‌ها', 'bonus-exchange/']],
    'discountPanel' => ['کد تخفیف', [
        ['کد تخفیف پراپ دیوابون', 'prop-discount/#divabon-discount'],
        ['کد تخفیف پراپ زورا اف ایکس', 'prop-discount/#zorafx-discount'],
        ['کد تخفیف پراپ پراپکو', 'prop-discount/#propco-discount'],
        ['کد تخفیف پراپ سرمایه‌گذار برتر', 'prop-discount/#sgb-discount'],
        ['کد تخفیف پراپ کریپتو اس دی اف', 'prop-discount/#sdf-discount'],
        ['کد تخفیف پراپ مای پراپ', 'prop-discount/#myprop-discount'],
        ['کد تخفیف پراپ فنفیکس', 'prop-discount/#fenefx-discount'],
    ], ['مشاهده همه کد تخفیف‌ها', 'prop-discount/']],
    'rebatePanel' => ['ریبیت', [
        ['ریبیت بروکر ارانته', 'receive-rebate/#errante-rebate'],
        ['ریبیت بروکر لایت فایننس', 'receive-rebate/#litefinance-rebate'],
        ['ریبیت بروکر آمارکتس', 'receive-rebate/#amarkets-rebate'],
        ['ریبیت بروکر آلپاری', 'receive-rebate/#alpari-rebate'],
        ['ریبیت بروکر کپیتال اکستند', 'receive-rebate/#capital-rebate'],
        ['ریبیت بروکر اپوفایننس', 'receive-rebate/#opofinance-rebate'],
        ['ریبیت بروکر دبلیو ام مارکتس', 'receive-rebate/#wmmarkets-rebate'],
        ['ریبیت بروکر فیبوگروپ', 'receive-rebate/#fibo-rebate'],
        ['ریبیت بروکر ویتاورس', 'receive-rebate/#vittaverse-rebate'],
    ], ['مشاهده همه ریبیت‌ها', 'receive-rebate/']],
    'calculatorPanel' => ['ماشین حساب', [
        ['ماشین حساب پیپ', 'calculators/pip-calculator/'],
        ['ماشین حساب پیووت', 'calculators/pivot-calculator/'],
        ['ماشین حساب سود و زیان', 'calculators/profit-calculator/'],
        ['ماشین حساب لات', 'calculators/lot-calculator/'],
        ['ماشین حساب فیبوناچی', 'calculators/fibonacci-calculator/'],
        ['ماشین حساب سود مرکب', 'calculators/compound-interest-calculator/'],
        ['ماشین حساب مارجین', 'calculators/margin-calculator/'],
    ], null],
    'indicatorPanel' => ['اندیکاتورهای متاتریدر', [
        ['اندیکاتورهای متاتریدر 4', 'indicator/?indicator-platform=%D9%85%D8%AA%D8%A7%D8%AA%D8%B1%DB%8C%D8%AF%D8%B1%204'],
        ['اندیکاتورهای متاتریدر 5', 'indicator/?indicator-platform=%D9%85%D8%AA%D8%A7%D8%AA%D8%B1%DB%8C%D8%AF%D8%B1%205'],
        ['اندیکاتورهای تریدینگ ویو', 'indicator/?indicator-platform=%D8%AA%D8%B1%DB%8C%D8%AF%DB%8C%D9%86%DA%AF%20%D9%88%DB%8C%D9%88'],
        ['همه اندیکاتورها', 'indicator/'],
    ], null],
    'blogPanel' => ['بلاگ', [
        ['مقالات', 'blog/'],
        ['تحلیل', 'analysis/'],
        ['آکادمی کریپتو', 'education/learn-crypto/'],
        ['آکادمی فارکس', 'education/learn-forex/'],
        ['اساتید فارکس', 'master/'],
    ], null],
    'quickBrokerPanel' => ['انتخاب سریع بروکر', [
        ['بهترین بروکر برای اسکالپ', 'blog/best-broker-scalp/'],
        ['بهترین بروکر با حداقل واریز', 'blog/broker-with-minimum-deposit/'],
        ['بهترین بروکر از نظر سواپ', 'blog/best-broker-swap/'],
        ['بهترین بروکر با حساب اسلامی', 'blog/best-brokers-with-islamic-account/'],
        ['بهترین بروکر از نظر لوریج', 'blog/the-best-broker-in-terms-of-leverage/'],
        ['بهترین بروکر برای کپی ترید', 'blog/copy-trading-platforms/'],
        ['بهترین بروکر برای حساب دمو', 'blog/best-brokers-for-demo-account/'],
        ['بهترین بروکر برای معاملات طلا', 'blog/the-best-broker-for-gold-trading/'],
        ['بهترین بروکر برای حساب پم', 'blog/best-broker-for-pamm-accounts/'],
        ['بهترین بروکر تریدینگ ویو', 'blog/best-broker-tradingview/'],
    ], null],
    'quickExchangePanel' => ['انتخاب سریع صرافی', [
        ['صرافی بدون محدودیت سنی', 'blog/exchange-without-age-restrictions/'],
        ['صرافی بدون احراز هویت', 'blog/exchange-without-authentication/'],
        ['صرافی غیر متمرکز', 'blog/best-decentralized-exchanges-for-iranians/'],
        ['صرافی مورد تایید بانک مرکزی', 'blog/exchanges-regulated-by-central-banks/'],
        ['صرافی مورد تایید پلیس فتا', 'blog/exchanges-approved-by-fata-police/'],
        ['صرافی با بیشترین ارز دیجیتال', 'blog/crypto-exchanges-with-most-coins/'],
    ], null],
    'quickPropPanel' => ['انتخاب سریع پراپ', [
        ['بهترین پراپ خارجی', 'blog/global-prop-firm/'],
        ['بهترین پراپ کریپتو', 'blog/crypto-prop/'],
        ['بهترین پراپ رایگان', 'blog/free-prop-trading/'],
        ['پراپ 1000 دلاری', 'blog/review-of-the-1k-prop/'],
        ['پراپ 100 هزار دلاری', 'blog/prop-100-thousand-dollars/'],
        ['پراپ 200 هزار دلاری', 'blog/prop-200-thousand-dollars/'],
    ], null],
];

$amb_panel_open = static function ($id, $title, $all_url = null, $list = true) {
    printf(
        '<section class="amb-m-panel" id="%1$s" data-amb-panel aria-label="%2$s"><div class="amb-m-panel__title"><span>%3$s</span>',
        esc_attr($id),
        esc_attr($title),
        esc_html($title)
    );
    if ($all_url) {
        printf(
            '<a class="amb-m-panel__all" href="%s"><span>مشاهده همه</span><svg width="16" height="16"><use href="#icon-arrow-left-full"></use></svg></a>',
            esc_url($all_url)
        );
    }
    echo '</div>';
    if ($list) {
        echo '<ul class="amb-m-list">';
    }
};
$amb_panel_close = static function ($list = true) {
    echo $list ? '</ul></section>' : '</section>';
};
?>
<div class="mobile-menu-drawer amb-m" id="mobileDrawer" aria-hidden="true" role="dialog" aria-modal="true" aria-label="منوی سایت">
    <div class="amb-m__bg" aria-hidden="true"></div>
    <header class="amb-m-header">
        <div class="amb-m-header__slot">
            <div class="amb-m-header__brand">
                <?php if (cmb_option('show_logo')) : ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="amb-m-header__logo">
                        <img src="<?php echo esc_url(CMB_URL . 'assets/image/logo-site.webp'); ?>" width="120" height="24" alt="کدام بروکر">
                    </a>
                <?php endif; ?>
            </div>
            <button type="button" class="amb-m-header__back" data-amb-back tabindex="-1">
                <svg width="20" height="20"><use href="#icon-right"></use></svg>
                <span>بازگشت</span>
            </button>
        </div>
        <button type="button" class="amb-m-header__close mobile-close-btn" id="mobileCloseBtn" aria-label="بستن منو">
            <svg width="24" height="24"><use href="#icon-close"></use></svg>
        </button>
    </header>
    <div class="amb-m-viewport" data-amb-viewport>

        <!-- Main -->
        <section class="amb-m-panel amb-m-panel--main is-active" id="mobileMainPanel" data-amb-panel aria-label="منو">
            <ul class="amb-m-list">
                <?php
                cmb_m_nav_item('platformPanel', 'پلتفرم‌ها');
                cmb_m_nav_item('toolsPanel', 'ابزار و خدمات');
                cmb_m_nav_item('quickPanel', 'انتخاب سریع');
                cmb_m_nav_item('blogPanel', 'بلاگ');
                cmb_m_link_item($amb_url('current-price/'), 'قیمت لحظه‌ای');
                ?>
            </ul>
        </section>

        <!-- Platforms -->
        <?php $amb_panel_open('platformPanel', 'پلتفرم‌ها'); ?>
            <?php
            cmb_m_nav_item('brokerPanel', 'بروکر');
            cmb_m_nav_item('exchangePanel', 'صرافی');
            cmb_m_nav_item('propPanel', 'پراپ');
            cmb_m_nav_item('goldplatformPanel', 'پلتفرم‌های طلا');
            cmb_m_nav_item('etfPanel', 'صندوق‌های بورسی');
            cmb_m_nav_item('boursePanel', 'کارگزاری بورس');
            ?>
        <?php $amb_panel_close(); ?>

        <!-- Tools & services -->
        <?php $amb_panel_open('toolsPanel', 'ابزار و خدمات'); ?>
            <?php
            cmb_m_nav_item('forexBonusPanel', 'بونوس فارکس');
            cmb_m_nav_item('cryptoBonusPanel', 'بونوس کریپتو');
            cmb_m_nav_item('discountPanel', 'کد تخفیف');
            cmb_m_nav_item('rebatePanel', 'ریبیت');
            cmb_m_nav_item('calculatorPanel', 'ماشین حساب');
            cmb_m_nav_item('indicatorPanel', 'اندیکاتورهای متاتریدر');
            cmb_m_link_item($amb_url('economic_calendar/'), 'تقویم اقتصادی');
            ?>
        <?php $amb_panel_close(); ?>

        <!-- Quick select -->
        <?php $amb_panel_open('quickPanel', 'انتخاب سریع'); ?>
            <?php
            cmb_m_nav_item('quickBrokerPanel', 'انتخاب سریع بروکر');
            cmb_m_nav_item('quickExchangePanel', 'انتخاب سریع صرافی');
            cmb_m_nav_item('quickPropPanel', 'انتخاب سریع پراپ');
            ?>
        <?php $amb_panel_close(); ?>

        <!-- Platform lists (featured + latest) -->
        <?php foreach ($amb_platforms as $amb_id => $amb_p) : ?>
            <?php $amb_panel_open($amb_id, $amb_p[0], $amb_url($amb_p[5]), false); ?>
                <?php
                $amb_unit = $amb_units[$amb_id];

                $amb_shown = cmb_m_logo_group(
                    cmb_query_args($amb_p[1], 5, $amb_p[2]),
                    $amb_p[4], 'منتخب کدام‌بروکر', $amb_unit
                );

                cmb_m_logo_group(
                    cmb_query_args($amb_p[1], 5, $amb_p[3], ['orderby' => 'date', 'order' => 'DESC']),
                    $amb_p[4], $amb_latest_titles[$amb_id], $amb_unit, $amb_shown
                );
                ?>
            <?php $amb_panel_close(false); ?>
        <?php endforeach; ?>

        <!-- Static link lists -->
        <?php foreach ($amb_link_panels as $amb_id => $amb_p) : ?>
            <?php $amb_panel_open($amb_id, $amb_p[0], !empty($amb_p[2]) ? $amb_url($amb_p[2][1]) : null); ?>
                <?php
                foreach ($amb_p[1] as $amb_link) {
                    cmb_m_link_item($amb_url($amb_link[1]), $amb_link[0]);
                }
                ?>
            <?php $amb_panel_close(); ?>
        <?php endforeach; ?>
    </div>

    <!-- Search: stays mounted, never re-rendered -->
    <?php if (cmb_option('show_search')) : ?>
        <form class="amb-m-search mobile-search-box" action="<?php echo esc_url(home_url('/')); ?>" method="get" role="search">
            <input type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="جستجو" aria-label="جستجو در بروکر، صرافی، معاملات طلا و تحلیل‌ها" autocomplete="off" enterkeyhint="search">
            <button type="submit" class="amb-m-search__btn" aria-label="جستجو">
                <svg width="20" height="20"><use href="#icon-search"></use></svg>
            </button>
        </form>
    <?php endif; ?>
</div>
<!-- Navbar trigger -->
<div class="navbar">
    <div class="logo-section">
        <button type="button" class="hamburger-btn" id="hamburgerBtn" aria-label="منو موبایل" aria-controls="mobileDrawer" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>
    </div>
</div>