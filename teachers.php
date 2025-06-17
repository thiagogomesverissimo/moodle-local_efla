<?php

require('../../config.php');
require_login();

global $DB;

$PAGE->set_url(new moodle_url('/local/efla/teachers.php'));
$PAGE->set_context(context_system::instance());

echo $OUTPUT->header();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && confirm_sesskey()) {
    $profans = new stdClass();
    $profans->numusp_teach = optional_param('numusp_teach', '', PARAM_INT);
    $profans->data_ta = optional_param('data_ta', '', PARAM_INT);
    $profans->data_tb = optional_param('data_tb', '', PARAM_INT);
    $profans->aware_ta = optional_param('aware_ta', '', PARAM_INT);
    $profans->aware_tb = optional_param('aware_tb', '', PARAM_INT);
    $profans->aware_tc = optional_param('aware_tc', '', PARAM_INT);
    $profans->aware_td = optional_param('aware_td', '', PARAM_INT);
    $profans->impact_ta = optional_param('impact_ta', '', PARAM_INT);
    $profans->impact_tb = optional_param('impact_tb', '', PARAM_INT);

    $DB->insert_record('efla_teachers', $profans);
    redirect('results.php', 'Salvo com sucesso!');

}

$context = [
    'range_1_10' => range(1, 10),
    // any other variables to pass
];
$context['sesskey'] = sesskey();

echo $OUTPUT->render_from_template('local_efla/teachers', $context);
echo $OUTPUT->footer();
