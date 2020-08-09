<?php

namespace QITheme\Components\TeamsSettings;

class LecturesTeam extends Team
{

    public function __construct()
    {
        $this->title = 'Lectures Team';
        $this->prefix = 'teams_lectures_';
        parent::__construct();
    }

    public function extraFields()
    {

        $this->totalLecturesInput();
        $this->studentsInput();

    }

    public function renderSubtitle()
    {
        echo '<p>' . __('Qudsinfo Lectures Team settings') . '</p>';
    }

    public function totalLecturesInput()
    {
        $this->addField(array(
            'id'        => 'lectures_count_setting',
            'api_field' => 'lectures_count',
            'title'     => 'Total Lectures',
            'type'      => 'input',
            'subtype'   => 'number',
            'required'  => true,
        ));
    }

    public function studentsInput()
    {
        $this->addField(array(
            'id'        => 'students_setting',
            'api_field' => 'students_count',
            'title'     => 'Total Students',
            'type'      => 'input',
            'subtype'   => 'number',
            'required'  => true,
        ));
    }


}
