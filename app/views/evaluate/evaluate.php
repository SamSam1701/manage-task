<div class="page-name">
    <h1>Danh sách đánh giá</h1>
    <a href="/Home/page">HomePage</a>
</div>
<table>
    <tr>
        <th>Evaluate ID</th>
        <th>Question</th>
        <th>Answer ID</th>
        <th>Người đánh giá</th>
        <th>Loại đánh giá</th>
        <th>Ngày tạo</th>
    </tr>
    <?php foreach ($lastest_evaluate as $evaluate): ?>
        <tr>
            <td><?php echo $evaluate['EvaluateID']; ?></td>
            <td><?php echo $evaluate['Question']; ?></td>
            <td><?php echo $evaluate['Answer']; ?></td>
            <td><?php echo $evaluate['userName']; ?></td>
            <td><?php echo $evaluate['RateCategory']; ?></td>
            <td><?php echo $evaluate['CreatedDate']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>