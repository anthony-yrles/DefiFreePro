<?php

/**
 * This script handles the submission of notifications and their retrieval.
 * 
 * It starts a session and processes form submissions related to notifications.
 * - If `submitSend` is set, it creates a new notification for the logged-in user.
 * - If `checkNotif` is set, it retrieves all notifications and filters out unread ones.
 * 
 * After processing, it redirects to the appropriate page.
 */

session_start();

if (isset($_POST['submitSend'])) {
    require 'autoLoader.php';

    // Create a new Controller object and add a new notification for the logged-in user
    $controller = new Controller('localhost', 'root', '', 'testfreepro');
    $controller->newNotification($_SESSION['id']);

    // Redirect to the user page after processing
    header('Location: ../user.php');
    exit();
    
} elseif (isset($_POST['checkNotif'])) {
    require 'autoLoader.php';

    // Create a new View object and retrieve the list of notifications
    $view = new View('localhost', 'root', '', 'testfreepro');
    $notificationsList = $view->notification();

    // Store the list of all notifications in the session
    $_SESSION['notificationList'] = $notificationsList;
    
    // Filter out unread notifications and store them in the session
    $unreadNotificationsList = [];
    foreach ($notificationsList as $notification) {
        if ($notification->getStatus() === '0' || $notification->getStatus() === 0) {
            $unreadNotificationsList[] = $notification;
        }
    }
    $_SESSION['unreadNotificationList'] = $unreadNotificationsList;

    // Redirect to the admin page after processing
    header('Location: ../admin.php');
    exit();
} else {
    // Redirect to the user page if the form was not submitted
    header('Location: ../user.php');
    exit();
}