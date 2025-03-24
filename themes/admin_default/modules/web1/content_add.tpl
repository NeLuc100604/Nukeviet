<!-- BEGIN: main -->
<link rel="stylesheet" type="text/css" href="{THEME_URL}/css/web1.css">
<div class="form-container">
    <h2>Thêm Dữ Liệu</h2>
    <form action="{ACTION_URL}" method="post">
        <input type="text" name="fullname" placeholder="Họ và tên" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="phone" placeholder="Số điện thoại" required>
        <textarea name="address" placeholder="Địa chỉ" required></textarea>
        <button type="submit"> Thêm </button>
    </form>
</div>
<!-- END: main -->
