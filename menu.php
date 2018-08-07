<?php 
$arr1 = str_split($_SESSION['ds_acesso_menu']);

if ($arr1[0] == 1) {

    ?>
    <li>
        <a href="admin.php" class="font suave"><i class="mdi-action-dashboard"></i>Dashboard</a>
    </li>
    <?php 
}

if ($arr1[1] == 1) {

    ?>
    <li>
        <a href="admin-banners.php" class="font suave"><i class="mdi-action-view-carousel"></i>Cases</a>
    </li>
    <?php 
}

if ($arr1[2] == 1) {

    ?>
    <li>
        <a href="admin-depoimentos.php" class="font suave"><i class="mdi-action-account-circle"></i>Depoimentos</a>
    </li>
    <?php 
}

if ($arr1[3] == 1) {

    ?>
    <li>
        <a href="admin-tickets.php" class="font suave"><i class="mdi-social-group"></i> Tickets</a>
    </li>
    <?php 
}

if ($arr1[4] == 1) {

    ?>
    <li>
        <a href="admin-chat.php" class="font suave"><i class="mdi-action-question-answer"></i> Chat</a>
    </li>
    <?php 
}

if ($arr1[5] == 1) {

    ?>
    <li>
        <a href="admin-blog.php" class="font suave"><i class="mdi-editor-insert-comment"></i> Blog</a>
    </li>
    <?php 
}

if ($arr1[6] == 1) {

    ?>
    <li>
        <a href="admin-categorias.php" class="font suave"><i class="mdi-action-view-list"></i> Categorias</a>
    </li>
    <?php 
}

if ($arr1[7] == 1) {

    ?>
    <li>
        <a href="admin-faq.php" class="font suave"><i class="mdi-action-help"></i> FAQs</a>
    </li>
    <?php 
}

if ($arr1[8] == 1) {

    ?>
    <li>
        <a href="admin-newsletter.php" class="font suave"><i class="mdi-communication-email"></i> Newsletter</a>
    </li>
    <?php 
}

if ($arr1[9] == 1) {

    ?>
    <li>
        <a href="admin-info.php" class="font suave"><i class="mdi-action-info"></i> Informações</a>
    </li>
    <?php 
}

if ($arr1[10] == 1) {

    ?>
    <li>
        <a href="admin-usuarios.php" class="font suave"><i class="mdi-social-person-add"></i> Usuários</a>
    </li>
    <?php 
}

?>
<li>
    <a href="logout.php" class="font suave"><i class="mdi-action-lock-open"></i> Sair</a>
</li>