<?php

require('../../config.php');
require_login();

global $DB;

$PAGE->set_url(new moodle_url('/local/efla/learners.php'));
$PAGE->set_context(context_system::instance());

echo $OUTPUT->header();


echo $OUTPUT->render_from_template('local_efla/learners', [
]);

echo $OUTPUT->footer();
