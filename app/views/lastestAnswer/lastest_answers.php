<div class="page-name">
    <h1>Danh sách câu trả lời</h1>
    <a href="/Home/page">HomePage</a>
</div>

<table>
    <tr>
        <th>Answer ID</th>
        <th>Câu trả lời</th>
        <th>Người đăng</th>
        <th>Ngày tạo</th>
        <th>Xem chi tiết</th>
    </tr>
    <?php foreach ($lastest_answers as $answer): ?>
        <tr>
            <td><?php echo $answer['AnswerID']; ?></td>
            <td><?php echo $answer['Answer']; ?></td>
            <td><?php echo $answer['userName']; ?></td>
            <td><?php echo $answer['CreatedDate']; ?></td>
            <td><a href="/ManageAnswer/getListAnswer/<?php echo $answer['QuestionID']; ?>">
        Xem câu trả lời
    </a></td>
        </tr>
    <?php endforeach; ?>
</table>
