<!-- BEGIN: main -->
<link rel="stylesheet" href="{NV_BASE_SITEURL}themes/admin_default/css/web1.css">
    <header>
        <h1>LLNEWS</h1>
        <nav>
            <ul>
                <li><a href="#">Thời Sự</a></li>
                <li><a href="#">Thế Giới</a></li>
                <li><a href="#">Kinh Doanh</a></li>
                <li><a href="#">Công Nghệ</a></li>
                <li><a href="#">Khoa Học</a></li>
                <li><a href="#">Giải Trí</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <!-- Danh sách tin chính -->
        <div class="news-list">
            <!-- BEGIN: news -->
            <div class="news-item">
                <h2><a href="{NV_BASE_SITEURL}index.php?nv=web1&op={NEWS.ALIAS}">{NEWS.TITLE}</a></h2>
                <div class="date">{NEWS.PUBDATE}</div>
            </div>
            <!-- END: news -->
        </div>

        <!-- Cột bên phải - Tin nổi bật -->
        <aside class="sidebar">
            <div class="featured-news">
                <h3>Tin Nổi Bật</h3>
                <img src="{FEATURED.IMAGE}" alt="{FEATURED.TITLE}">
                <h2><a href="{NV_BASE_SITEURL}index.php?nv=web1&op={FEATURED.ALIAS}">{FEATURED.TITLE}</a></h2>
            </div>
        </aside>
    </div>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }
        .news-list {
            width: 65%;
        }
        .news-item {
            border-bottom: 1px solid #ddd;
            padding: 20px 0;
        }
        .news-item h2 {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }
        .news-item .date {
            font-size: 14px;
            color: gray;
        }
        .sidebar {
            width: 30%;
        }
        .featured-news img {
            width: 100%;
            height: auto;
        }
        .featured-news h3 {
            font-size: 18px;
            color: #d6006d;
        }
    </style>


<!-- END: main -->