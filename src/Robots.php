<?php

namespace Robots;

class Robots
{
    /**
     * The rows of for the robots
     *
     * @var array
     */
    protected $rows = array();

    /**
     * Add a allow rule to the robots.
     *
     * @param string|array $directories
     */
    public function addAllow($directories)
    {
        $this->addRuleLine($directories, 'Allow');
    }

    /**
     * Add a comment to the robots.
     *
     * @param string $comment
     */
    public function addComment($comment)
    {
        $this->addLine("# $comment");
    }

    /**
     * Add a disallow rule to the robots.
     *
     * @param string|array $directories
     */
    public function addDisallow($directories)
    {
        $this->addRuleLine($directories, 'Disallow');
    }

    /**
     * Add a Host to the robots.
     *
     * @param string $host
     */
    public function addHost($host)
    {
        $this->addLine("Host: $host");
    }

    /**
     * Add a row to the robots.
     *
     * @param string $row
     */
    protected function addLine($row)
    {
        $this->rows[] = (string) $row;
    }

    /**
     * Add multiple rows to the robots.
     *
     * @param string|array $rows
     */
    protected function addRows($rows)
    {
        foreach ((array) $rows as $row)
        {
            $this->addLine($row);
        }
    }

    /**
     * Add a rule to the robots.
     *
     * @param string|array $directories
     * @param string       $rule
     */
    protected function addRuleLine($directories, $rule)
    {
        foreach ((array) $directories as $directory)
        {
            $this->addLine("$rule: $directory");
        }
    }

    /**
     * Add a Sitemap to the robots.
     *
     * @param string $sitemap
     */
    public function addSitemap($sitemap)
    {
        $this->addLine("Sitemap: $sitemap");
    }

    /**
     * Add a spacer to the robots.
     */
    public function addSpacer()
    {
        $this->addLine("");
    }

    /**
     * Add a User-agent to the robots.
     *
     * @param string $userAgent
     */
    public function addUserAgent($userAgent)
    {
        $this->addLine("User-agent: $userAgent");
    }

    /**
     * Generate the robots data.
     *
     * @return string
     */
    public function generate()
    {
        return implode(PHP_EOL, $this->rows);
    }

    /**
     * Reset the rows.
     *
     * @return void
     */
    public function reset()
    {
        $this->rows = array();
    }
}
