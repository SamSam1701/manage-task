<div id="search-results">
<div class="page-name">
  <h1>List Questions</h1>
  <a href="/Home/page">Home Page</a>
</div>

<div class="search-container">
  <form method="GET" action="#" id="search-tags">
      <label for="tags">Tags:</label>
      <div class="search-box">
        <input type="text" name="tags" id="tags" value="<?php echo $tagsFilter; ?>">
        <button type="submit">Search</button>
      </div>
  </form>
  
  <form method="GET" action="#" id="search-name">
      <label for="user">Name User</label>
      <div class="search-box">
        <input type="text" name="user" id="user" value="<?php echo $userFilter; ?>">
        <button type="submit">Search</button>
      </div>
  </form>
</div>
<table>
<tr>
    <th>Question ID</th>
    <th>Question</th>
    <th>User</th>
    <th>Tags</th>
    <th>Date Created</th>
    <th>Number Of Question</th>
    <th>View Answers</th>

</tr>
<?php foreach ($questions as $question): ?>
    <tr>
        <td><?php echo $question['QuestionID']; ?></td>
        <td><?php echo $question['Question']; ?></td>
        <td><?php echo $question['userName']; ?></td>
        <td><?php echo $question['Tags']; ?></td>
        <td><?php echo $question['CreatedDate']; ?></td>
        <td><?php echo $question['NumberAnswerers']; ?></td>
        <td><a href="/ManageAnswer/getListAnswer/<?php echo $question['QuestionID']; ?>">
        View Answers
    </a></td>
    </tr>
<?php endforeach; ?>
</table>

<div class="pagination">
    <ul>
      <?php
        $url = basename($_SERVER['PHP_SELF']) . '?';
        $start_page = max($current_page - 2, 1);
        $end_page = min($current_page + 2, $total_pages);
  
        // Hiển thị trang đầu tiên và trang trước đó
        if ($current_page > 1) {
          $prev_page = $current_page - 1;
          echo "<li><a href='{$url}page=1'>First</a></li>";
          echo "<li><a href='{$url}page={$prev_page}'>Prev</a></li>";
        }
  
        // Hiển thị các trang ở giữa
        for ($i = $start_page; $i <= $end_page; $i++) {
          if ($i == $current_page) {
            echo "<li class='active'><a href='  #'>{$i}</a></li>";
          } else {
            echo "<li><a href='{$url}page={$i}'>{$i}</a></li>";
          }
        }
  
        // Hiển thị trang tiếp theo và trang cuối cùng
        if ($current_page < $total_pages) {
          $next_page = $current_page + 1;
          echo "<li><a href='{$url}page={$next_page}'>Next</a></li>";
          echo "<li><a href='{$url}page={$total_pages}'>Last</a></li>";
        }
      ?>
    </ul>
  </div>
  </div>

  <script>
$('#search-tags').submit(function(event) {
  event.preventDefault();
  var searchTerm = $('#tags').val();
  $.ajax({
    url: '/ManageQuestion/searchTags',
    type: 'GET',
    data: {
      search: searchTerm
    },
    success: function(data) {
      $('#search-results').html(data);
    },
    error: function() {
      alert('Lỗi xảy ra!');
    }
  });
});


$('#search-name').submit(function(event) {
  event.preventDefault();
  var searchTerm = $('#user').val();
  $.ajax({
    url: '/ManageQuestion/searchName',
    type: 'GET',
    data: {
      search: searchTerm
    },
    success: function(data) {
      $('#search-results').html(data);
    },
    error: function() {
      alert('Lỗi xảy ra!');
    }
  });
});
</script>