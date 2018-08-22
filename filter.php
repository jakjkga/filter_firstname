<?php
/**
 * firstname filter.
 *
 * @package    filter_firstname
 * @copyright  2018 Quizdidaktik.de
 * @author     Joachim Jakob <jakj@kronberg-gymnasium.de.ca>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

class filter_firstname extends moodle_text_filter {
    
    public function filter($text, array $options = array()) {
        
        global $USER;
        
        if (!is_string($text) or empty($text)) {
            // Non-string data can not be filtered anyway.
            return $text;
        }
 
        if (stripos($text, '{firstname}') === false) {
            // Performance shortcut - if there is no such tag, nothing can match.
            return $text;
        }
 
        if (isloggedin()) {
            $firstname = $USER->firstname;
        }
 
        // Here we can perform some more complex operations with the {firstname} in the text.
        return str_replace('{firstname}', $firstname, $text);
    }
}
?>
