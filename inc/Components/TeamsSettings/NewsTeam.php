<?php

namespace QITheme\Components\TeamsSettings;

class NewsTeam extends Team
{

    public function __construct()
    {
        $this->title = 'News Team';
        $this->prefix = 'teams_news_';
        parent::__construct();
    }

    public function extraFields()
    {
        $this->totalPublishedInput();
        $this->totalReportsInput();
    }

    public function renderSubtitle()
    {
        echo '<p>' . __('Qudsinfo News Team settings') . '</p>';
    }

    public function totalPublishedInput()
    {
        $this->addField(array(
            'id'        => 'published_count_setting',
            'api_field' => 'published_count',
            'title'     => 'Total Published',
            'type'      => 'input',
            'subtype'   => 'number',
            'required'  => true,
        ));
    }

    public function totalReportsInput()
    {
        $this->addField(array(
            'id'        => 'reports_count_setting',
            'api_field' => 'reports_count',
            'title'     => 'Total Reports',
            'type'      => 'input',
            'subtype'   => 'number',
            'required'  => true,
        ));
    }


}
