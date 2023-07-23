<div class="page-name">
  <h1>List Questions</h1>
  <a href="/Home/page">Home Page</a>
</div>
<table>
    <tr>
        <th>Answer ID</th>
        <th>Câu trả lời</th>
        <th>Người đăng</th>
        <th>Ngày tạo</th>
        <?php if ($RoleUser == 'Evaluater'): ?>
            <th>Rate</th>
        <?php endif; ?>
    </tr>
    <?php foreach ($answers as $answer): ?>
        <tr>
            <td><?php echo $answer['AnswerID']; ?></td>
            <td><?php echo $answer['Answer']; ?></td>
            <td><?php echo $answer['userName']; ?></td>
            <td><?php echo $answer['CreatedDate']; ?></td>
            <?php if ($RoleUser === 'Evaluater'): ?>
                <td>
                <select name="rate[]">
        <option value="1">1 STAR</option>
        <option value="2">2 STAR</option>
        <option value="3">3 STAR</option>
        <option value="4">4 STAR</option>
        <option value="5">5 STAR</option>
    </select>
                </td>
            <?php endif; ?>
        </tr>
    <?php endforeach; ?>
    <?php if ($RoleUser == 'Answerer'): ?>
        <tr>
        <td colspan="4">
            <h3>Add new answer</h3>
            <form method="post" action="/ManageAnswer/createAnswer">
                <label for="answerInput">Answer:</label>
                <input type="text" id="answerInput" name="answer">
                <label for="referenceInput">Reference:</label>
                <input type="text" id="referenceInput" name="reference">
                <button type="submit">Submit Answer</button>
            </form>
        </td>
    </tr>
    <?php endif; ?>
</table>