<?php
/* Template Name: Custom Password Protected Page */

// Start session to use session variables
if (!session_id()) {
    session_start();
}

// Define the correct password
$correct_password = '24NCEucharisticBeauty!';

// Check for form submission and validate password
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password'])) {
    if ($_POST['password'] === $correct_password) {
        $_SESSION['password_verified'] = true;
    } else {
        $error_message = 'Incorrect password';
    }
}

// Only show the page content if the correct password has been entered
if (isset($_SESSION['password_verified']) && $_SESSION['password_verified']) {
    // Load and show the page content
    $page = get_post(52251);
    echo apply_filters('the_content', $page->post_content);
} else {
    // Display the password form
    ?>
    <form method="post" action="">
        <label for="password">Enter Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Submit</button>
    </form>
    <?php
    if (isset($error_message)) {
        echo '<p>' . $error_message . '</p>';
    }
}
?>
