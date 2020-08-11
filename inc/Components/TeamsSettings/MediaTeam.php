<?php

namespace QITheme\Components\TeamsSettings;

class MediaTeam extends Team
{

    public function __construct()
    {
        $this->title = 'Media Team';
        $this->prefix = 'teams_media_';
        parent::__construct();
    }

    public function extraFields()
    {
        $this->followersInput();
        $this->reachInput();
    }

    public function renderSubtitle()
    {
        echo '<p>' . __('Qudsinfo Media Team settings') . '</p>';
    }

    public function followersInput()
    {
        $this->addField(array(
            'id'        => 'followers_setting',
            'api_field' => 'total_followers',
            'title'     => 'Total Followers',
            'type'      => 'input',
            'subtype'   => 'number',
            'required'  => true,
        ));
    }

    public function reachInput()
    {
        $this->addField(array(
            'id'        => 'reach_setting',
            'api_field' => 'total_reach',
            'title'     => 'Total Post Reach',
            'type'      => 'input',
            'subtype'   => 'number',
            'required'  => true,
        ));
    }

}
