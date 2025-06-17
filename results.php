<?php

require('../../config.php');
require_login();

global $DB;

$PAGE->set_url(new moodle_url('/local/efla/results.php'));
$PAGE->set_context(context_system::instance());

$efla_learners = $DB->get_records('efla_learners');
$efla_teachers = $DB->get_records('efla_teachers');

echo $OUTPUT->header();

$efla_learners = $DB->get_records('efla_learners');
$efla_learners = array_values($efla_learners);
$efla_teachers = $DB->get_records('efla_teachers');
$efla_teachers = array_values($efla_teachers);


echo $OUTPUT->render_from_template('local_efla/results', [
    'efla_learners' => $efla_learners,
    'efla_teachers' => $efla_teachers,
]);

echo $OUTPUT->footer();
