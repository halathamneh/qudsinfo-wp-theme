<?php


namespace QITheme\CPT;


use QITheme\CPT\Taxonomies\BaseCustomTaxonomy;

abstract class BaseCPT extends \QITheme\Lib\Singleton
{

    protected function __construct()
    {
        parent::__construct();

        add_action( 'init', [$this, 'registerPostType'] );

    }

    public function registerPostType() {
        register_post_type($this->postTypeName(), $this->getArgs());

        if (count($this->taxonomies()) > 0) {
            foreach ($this->taxonomies() as $taxonomy) {
                $taxonomy->register();
            }
        }

    }

    abstract protected function postTypeName(): string;

    protected function postTypeLabels(): ?array
    {
        return null;
    }

    abstract function postTypeArgs(): array;

    private function getArgs() {
        $args = $this->postTypeArgs();
        $args['labels'] = $this->postTypeLabels();

        return $args;
    }

    /**
     * @return BaseCustomTaxonomy[]
     */
    public function taxonomies(): array
    {
        return [];
    }

}
