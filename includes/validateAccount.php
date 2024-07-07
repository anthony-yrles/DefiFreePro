<?php

session_start();

if (isset($_POST['submitSend'])) {
    require 'autoLoader.php';

    $controller = new Controller('localhost', 'root', '', 'testfreepro');
    $controller->newNotification($_SESSION['id']);

    header('Location: ../user.php');
    
} elseif (isset($_POST['checkNotif'])) {
    require 'autoLoader.php';

    $view = new View('localhost', 'root', '', 'testfreepro');
    $notificationsList = $view->notification();

    $_SESSION['notificationList'] = $notificationsList;
    $unreadNotificationsList = [];

    foreach ($notificationsList as $notification) {
        
        if ($notification->getStatus() === '0' || $notification->getStatus() === 0) {
            $unreadNotificationsList[] = $notification;
            $controller = new Controller('localhost', 'root', '', 'testfreepro');
            $controller->notificationOk($notification->getId());
        }
    }

    $_SESSION['unreadNotificationList'] = $unreadNotificationsList;

    header('Location: ../admin.php');
}