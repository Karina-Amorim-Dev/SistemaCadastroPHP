<?php
// Arquivo corrigido para redirecionar para o arquivo correto de exclusão.
// Mantemos este arquivo apenas para compatibilidade com links antigos.
header('Location: excluir.php' . (isset($_GET['id']) ? '?id='.$_GET['id'] : ''));
exit;
