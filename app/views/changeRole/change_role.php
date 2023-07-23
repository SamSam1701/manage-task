<div class="page-name">
    <h1>Đổi vai trò người dùng</h1>
    <a href="/Home/page">HomePage</a>
</div>
<div class="change-role">
    <form method="POST" action="changeRole">
        <label for="role">Chọn vai trò:</label>
        <select name="role" id="role">
            <option value="Questioner">Questioner</option>
            <option value="Answerer">Answer</option>
            <option value="Evaluater">Evaluater</option>
        </select>
        <input type="submit" value="Đổi vai trò">
    </form>
</div>