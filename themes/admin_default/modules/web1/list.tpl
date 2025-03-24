<!-- BEGIN: list -->
<table border="1" cellspacing="0" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Họ và tên</th>
        <th>Email</th>
        <th>Điện thoại</th>
        <th>Địa chỉ</th>
        <th>Ngày tạo</th>
        <th>Chức năng</th>
    </tr>
    <!-- Lặp dữ liệu -->
    <tbody>
        <!-- BEGIN: row -->
        <tr>
            <td>{DATA.id}</td>
            <td>{DATA.fullname}</td>
            <td>{DATA.email}</td>
            <td>{DATA.phone}</td>
            <td>{DATA.address}</td>
            <td>{DATA.created_at}</td>
            <td>
            <a href='index.php?language=en&nv=web1&op=content_edit&id={$row['id']}'>Sửa</a> | 
            <a href='index.php?language=en&nv=web1&op=content_delete&id={$row['id']}' onclick='return confirm(\"Bạn có chắc chắn muốn xóa?\");'>Xóa</a>
          </td>
        </tr>
        <!-- END: row -->
    </tbody>
</table>
<style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>

<!-- END: list -->