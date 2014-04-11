<?php

class JobList {
    protected $url = '';
    protected $projects = array();
    protected $list = array();
    
    public function __construct() {
        if (defined('JOBLIST_PROJECTS')) {
            $projects = preg_split('/,/', JOBLIST_PROJECTS);
            foreach ($projects as $project) {
                $this->addProjectFilter($project);
            }
        }
        if (defined('JOBLIST_FEEDS_URL')) {
            $this->url = JOBLIST_FEEDS_URL;
        }
    }
    
    public function addProjectFilter($projectName) {
        if (!in_array(trim($projectName), $this->projects)) {
            $this->projects[] = trim($projectName);
        }
    }
    
    public function get() {
        if (!strlen($this->url) > 0) {
            return false;
        }
        if (!empty($this->list)) {
            return $this->list;
        }
        $url = $this->url . '?name=priority&format=rss';
        if (!empty($this->projects)) {
            $url .= '&projects=' . implode(',', $this->projects);
        }
        if (defined('JOBLIST_MAX_LIMIT')) {
            $url .= '&limit=' . JOBLIST_MAX_LIMIT;
        }
        $rss = simplexml_load_file($url);
        if (empty($rss) || !isset($rss->channel) || !isset($rss->channel->item)) {
            return false;
        }
        $ret = array();
        foreach ($rss->channel->item as $item) {
            $ret[] = array(
                'link' => $item->link, 
                'title' => $item->title
            );
        }
        return $ret;
    }
}
