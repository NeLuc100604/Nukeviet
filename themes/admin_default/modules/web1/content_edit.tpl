<!-- BEGIN: main -->
<form method="post">
    <label>{LANG.title}:</label>
    <input type="text" name="fullname" value="{DATA.fullname}" required><br>
    <label>Email:</label>
    <input type="email" name="email" value="{DATA.email}" required><br>
    <label>{LANG.phone}:</label>
    <input type="text" name="phone" value="{DATA.phone}"><br>
    <label>{LANG.address}:</label>
    <input type="text" name="address" value="{DATA.address}"><br>
    <button type="submit" name="submit">{LANG.save}</button>
</form>
<!-- END: main -->