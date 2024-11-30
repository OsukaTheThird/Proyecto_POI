<?php
session_start();

// Comprobar si el usuario está autenticado

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user'])) {
    header("Location: views/login.php");
    exit();
    $user = $_SESSION['user'];

}
?>
<?php require 'partials/headerApp.php'; ?>
<?php require 'partials/sidebar.php'; ?>
 <html>
<head>
    <title>Chat</title>
    <link rel="icon" href="images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>
<body>
    <!-- start: Chat -->
    <section class="chat-section">
        <div class="chat-container">
            <!-- start: Sidebar -->
            <!-- end: Sidebar -->

            <!-- start: Content -->
            <div class="chat-content">
                <div class="content-sidebar">
                    <div class="content-sidebar-title">Chats</div>
                    <form action="" class="content-sidebar-form">
                        <input type="search" class="content-sidebar-input" placeholder="Search...">
                        <button type="submit" class="content-sidebar-submit"><i class="ri-search-line"></i></button>
                    </form>
                    <div class="content-messages">
                        <ul class="content-messages-list">
                            <?php if ($chats): ?>
                                <?php foreach ($chats as $chat): ?>
                                    <li>
                                        <a href="#" data-conversation="#conversation-<?= $chat['id'] ?>">
                                            <img class="content-message-image" src="https://via.placeholder.com/50" alt="">
                                            <span class="content-message-info">
                                                <span class="content-message-name"><?= htmlspecialchars($chat['nombre_usuario']) ?></span>
                                                <span class="content-message-text">Último mensaje...</span>
                                            </span>
                                            <span class="content-message-more">
                                                <span class="content-message-unread">5</span>
                                                <span class="content-message-time">12:30</span>
                                            </span>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <li>No tienes chats activos.</li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <!-- end: Content side -->

                <!-- start: Conversation -->
                <div class="conversation conversation-default active">
                    <i class="ri-chat-3-line"></i>
                    <p>Select chat and view conversation!</p>
                </div>
                <?php foreach ($chats as $chat): ?>
                    <div class="conversation" id="conversation-<?= $chat['id'] ?>">
    <div class="conversation-top">
        <button type="button" class="conversation-back"><i class="ri-arrow-left-line"></i></button>
        <div class="conversation-user">
            <img class="conversation-user-image" src="https://via.placeholder.com/50" alt="">
            <div>
                <div class="conversation-user-name"><?= htmlspecialchars($chat['nombre_usuario']) ?></div>
                <div class="conversation-user-status online">online</div>
            </div>
        </div>
        <div class="conversation-buttons">
            <button type="button" id="webcamButton"><i class="ri-vidicon-line"></i></button>
            <button type="button"><i class="ri-information-line"></i></button>
        </div>
    </div>
    <div class="conversation-main">
        <ul class="conversation-wrapper">
            <?php
            // Aquí agregas los mensajes de la conversación
            $messages = getMessagesForChat($chat['id']); // Esta función debería obtener los mensajes de la base de datos
            foreach ($messages as $message) :
            ?>
                <li class="message">
                    <span class="message-user"><?= htmlspecialchars($message['usuario_nombre']) ?>:</span>
                    <span class="message-text"><?= htmlspecialchars($message['mensaje']) ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<?php endforeach; ?>
                <!-- end: Conversation -->
            </div>
            <!-- end: Content -->
        </div>
    </section>
    <!-- end: Chat -->
    
    <script src="chatScript.js"></script>
</body>
</html>
