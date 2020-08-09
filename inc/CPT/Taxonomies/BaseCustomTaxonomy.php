<?php


namespace QITheme\CPT\Taxonomies;


use QITheme\Lib\Singleton;

abstract class BaseCustomTaxonomy extends Singleton
{

    private $postTypes = [];

    protected function __construct($postTypes)
    {
        parent::__construct();

        $this->postTypes = $postTypes;
    }

    public function register() {
        if (!is_null($this->taxonomyName())) {
            register_taxonomy($this->taxonomyName(), $this->postTypes, $this->getArgs());
        }
    }

    abstract protected function taxonomyName(): ?string;

    protected function taxonomyLabels(): ?array
    {
        return null;
    }

    abstract protected function taxonomyArgs(): array;

    private function getArgs() {
        $args = $this->taxonomyArgs();
        $args['labels'] = $this->taxonomyLabels();

        return $args;
    }

}
