<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Form for editing/creating a template.
 *
 * @package    format_kickstart
 * @copyright  2019 bdecent gmbh <https://bdecent.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace format_kickstart\form;

defined('MOODLE_INTERNAL') || die();

require_once("$CFG->libdir/formslib.php");

/**
 * Form for editing/creating a template.
 *
 * @package format_kickstart
 * @copyright  2019 bdecent gmbh <https://bdecent.de>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class template_form extends \moodleform {

    /**
     * Define form elements.
     *
     * @throws \coding_exception
     */
    public function definition() {
        $mform = $this->_form;

        $mform->addElement('hidden', 'id');
        $mform->setType('id', PARAM_INT);

        $mform->addElement('text', 'title', get_string('title', 'format_kickstart'));
        $mform->setType('title', PARAM_TEXT);
        $mform->addRule('title', get_string('required'), 'required');

        $mform->addElement('editor', 'description', get_string('description', 'format_kickstart'));
        $mform->setType('description', PARAM_RAW);

        $mform->addElement('tags', 'tags', get_string('tags'),
            ['itemtype' => 'kickstart_template', 'component' => 'format_kickstart']);

        $mform->addElement('filemanager', 'course_backup',
            get_string('course_backup', 'format_kickstart'), null, [
            'subdirs' => 0,
            'maxfiles' => 1,
            'accepted_types' => ['.mbz'],
            'return_types' => FILE_INTERNAL | FILE_EXTERNAL
            ]);
        $mform->addHelpButton('course_backup', 'course_backup', 'format_kickstart');

        $this->add_action_buttons();
    }
}