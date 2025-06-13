<?php

require('../../config.php');
require_login();

global $DB;

$PAGE->set_url(new moodle_url('/local/efla/learners.php'));
$PAGE->set_context(context_system::instance());

echo $OUTPUT->header();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && confirm_sesskey()) {
    $learnans = new stdClass();
    $learnans->data_la = optional_param('data_la', '', PARAM_INT);
    $learnans->data_lb = optional_param('data_lb', '', PARAM_INT);
    $learnans->aware_lt = optional_param('aware_la', '', PARAM_INT);
    $learnans->aware_lb = optional_param('aware_lb', '', PARAM_INT);
    $learnans->aware_lc = optional_param('aware_lc', '', PARAM_INT);
    $learnans->aware_ld = optional_param('aware_ld', '', PARAM_INT);
    $learnans->impact_la = optional_param('impact_la', '', PARAM_INT);
    $learnans->impact_lb = optional_param('impact_lb', '', PARAM_INT);

}
$context = [
    'range_1_10' => range(1, 10),
    // any other variables to pass
];
$context['sesskey'] = sesskey();

echo $OUTPUT->render_from_template('local_efla/learners', $context);
echo $OUTPUT->footer();
