<div class="home-container">
    <div class="content">
        <span>HOME PAGE</span>
        <p class="user">Hi! <?php echo $role; ?></p>
        <a class="logout-link" href="/">Logout</a>
    </div>

    <?php if ($role == 'Admin'): ?>
        <div class="list-page">
            <ul class="list">
                <li><a class="link" href="/create/createQuestionPage">MAKE QUESTION</a></li>
                <li> <a class="link" href="/ManageQuestion/getListQuestion">LIST OF QUESTIONS </a></li>
                <li> <a class="link" href="/ManageAnswer/getLastestAnserwer">LASTEST ANSWERS </a></li>
                <li> <a class="link" href="/Evaluate/getLastestEvaluate">LASTEST EVALUATION </a></li>
                <li> <a class="link" href="/ChangeRole/changeRolePage">CHANGE ROLE </a></li>
            </ul>
        </div>

    <?php elseif ($role == 'Questioner'): ?>
        <div class="list-page">
        <ul class="list">
            <li><a class="link" href="/create/createQuestionPage">MAKE QUESTION</a></li>
            <li> <a class="link" href="/ManageQuestion/getListQuestion">LIST OF QUESTIONS </a></li>
            <li> <a class="link" href="/ChangeRole/changeRolePage">CHANGE ROLE </a></li>
        </ul>
        </div>

    <?php elseif ($role == 'Answerer'): ?>
        <div class="list-page">
        <ul class="list">
            <li> <a class="link" href="/ManageQuestion/getListQuestion">LIST OF QUESTIONS </a></li>
            <li> <a class="link" href="/ChangeRole/changeRolePage">CHANGE ROLE </a></li>
    </ul>
        </div>

        <?php elseif ($role == 'Evaluater'): ?>
            <div class="list-page">
            <ul class="list">
            <li> <a class="link" href="/ManageQuestion/getListQuestion">LIST OF QUESTIONS </a></li>
            <li> <a class="link" href="/ChangeRole/changeRolePage">CHANGE ROLE </a></li>
        </ul>
        </div>
    
        <?php else: ?>
            <div class="list-page">
            <ul class="list">
                <li> <a class="link" href="/ManageQuestion/getListQuestion">LIST OF QUESTIONS </a></li>
                <li> <a class="link" href="/ManageAnswer/getLastestAnserwer">LASTEST ANSWERS </a></li>
                <li> <a class="link" href="/Evaluate/getLastestEvaluate">LASTEST EVALUATION </a></li>
                <li> <a class="link" href="/login/index">CHANGE ROLE </a></li>
            </ul>
        </div>
    <?php endif; ?>
</div>