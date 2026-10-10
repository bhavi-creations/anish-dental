<?php
// Keep the legacy contact endpoint behind the same verification as the main form.
if (isset($_POST['phone']) && !isset($_POST['number'])) {
    $_POST['number'] = $_POST['phone'];
}
require __DIR__ . '/contactform.php';
