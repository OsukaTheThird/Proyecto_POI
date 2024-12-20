<!-- start: Sidebar -->
<aside class="chat-sidebar">
                <a href="#" class="chat-sidebar-logo">
                    <i class="ri-chat-1-fill"></i>
                </a>
                <ul class="chat-sidebar-menu">
                    <!--
                    <li class="active"><a href="#" data-title="Chats"><i class="ri-chat-3-line"></i></a></li> -->
                    <li><a href="/views/chat.view.php" data-title="Chats"><i class="ri-chat-3-line"></i></a></li>
                    <li><a href="#" data-title="Grupos"><i class="ri-group-2-line"></i></a></li>
                    <li><a href="#" data-title="Contactos"><i class="ri-contacts-line"></i></a></li>
                    <li><a href="/views/tareas.php" data-title="Tareas"><i class="ri-survey-line"></i></a></li>
                    <li><a href="#" data-title="Documentos"><i class="ri-folder-line"></i></a></li>
                    <!--
                    <li><a href="#" data-title="Configuración"><i class="ri-settings-line"></i></a></li>-->
                    <li class="chat-sidebar-profile">
                        <button type="button" class="chat-sidebar-profile-toggle">
                            <!--
                            <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8cGVvcGxlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="">
                            -->
                            <img src="data:image/jpeg;base64,<?php echo $user['Foto']; ?>" alt="Imagen desde Base64" />
                        </button>
                        <ul class="chat-sidebar-profile-dropdown">
                            <li><a href="/views/perfil.php"><i class="ri-user-line"></i> Perfil</a></li>
                            <li><a href="#"><i class="ri-logout-box-line"></i> Salir</a></li>
                        </ul>
                    </li>
                </ul>
            </aside>
<!-- end: Sidebar -->