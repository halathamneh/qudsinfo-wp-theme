<?php

namespace QITheme\Components\TeamsSettings;

class ContentTeam extends Team
{

    public function __construct()
    {
        $this->title = 'Content Team';
        $this->prefix = 'teams_content_';
        parent::__construct();
    }

    public function extraFields()
    {

        $this->infosCountInput();
        $this->storiesCountInput();

    }

    public function renderSubtitle()
    {
        echo '<p>' . __('Qudsinfo Content Team settings') . '</p>';
    }

    public function infosCountInput()
    {
        $this->addField(array(
            'id'        => 'infos_count_setting',
            'api_field' => 'infos_count',
            'title'     => 'Total Infos',
            'type'      => 'input',
            'subtype'   => 'number',
            'required'  => true,
        ));
    }

    public function storiesCountInput()
    {
        $this->addField(array(
            'id'        => 'stories_count_setting',
            'api_field' => 'stories_count',
            'title'     => 'Total Stories',
            'type'      => 'input',
            'subtype'   => 'number',
            'required'  => true,
        ));
    }


}
