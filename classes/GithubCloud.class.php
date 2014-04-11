<?php
/**
 * GithubCloud class
 *
 * Fetches most used words from issues, commits and pull requests of a 
 * specified github repository. Applies stopwords filters on them and
 * generates a frequency list associatted to each github resource they
 * were found from, in order to create a word cloud.
 *
 */

define('GITHUB_CLOUD_STOPWORDS',
    "able,about,above,according,accordingly,across,actually,after,afterwards," .
    "again,against,ain't,all,allow,allows,almost,alone,along,already,also,although," .
    "always,am,among,amongst,an,and,another,any,anybody,anyhow,anyone,anything," .
    "anyway,anyways,anywhere,apart,appear,appreciate,appropriate,are,aren't,around," .
    "as,aside,ask,asking,associated,at,available,away,awfully,be,became,because," .
    "become,becomes,becoming,been,before,beforehand,behind,being,believe,below," .
    "beside,besides,best,better,between,beyond,both,brief,but,by,c'mon,c's,came," .
    "can,can't,cannot,cant,cause,causes,certain,certainly,changes,clearly,co,com," .
    "come,comes,concerning,consequently,consider,considering,contain,containing," .
    "contains,corresponding,could,couldn't,course,currently,definitely,described," .
    "despite,did,didn't,different,do,does,doesn't,doing,don't,done,down,downwards," .
    "during,each,edu,eg,eight,either,else,elsewhere,enough,entirely,especially,et," .
    "etc,even,ever,every,everybody,everyone,everything,everywhere,ex,exactly," .
    "example,except,far,few,fifth,first,five,followed,following,follows,for,former," .
    "formerly,forth,four,from,further,furthermore,get,gets,getting,given,gives,go," .
    "goes,going,gone,got,gotten,greetings,had,hadn't,happens,hardly,has,hasn't,have," .
    "haven't,having,he,he's,hello,help,hence,her,here,here's,hereafter,hereby,herein," .
    "hereupon,hers,herself,hi,him,himself,his,hither,hopefully,how,howbeit,however," .
    "i'd,i'll,i'm,i've,ie,if,ignored,immediate,in,inasmuch,inc,indeed,indicate," .
    "indicated,indicates,inner,insofar,instead,into,inward,is,isn't,it,it'd,it'll," .
    "it's,its,itself,just,keep,keeps,kept,know,knows,known,last,lately,later,latter," .
    "latterly,least,less,lest,let,let's,like,liked,likely,little,look,looking,looks," .
    "ltd,mainly,many,may,maybe,me,mean,meanwhile,merely,might,more,moreover,most," .
    "mostly,much,must,my,myself,name,namely,nd,near,nearly,necessary,need,needs," .
    "neither,never,nevertheless,new,next,nine,no,nobody,non,none,noone,nor,normally," .
    "not,nothing,novel,now,nowhere,obviously,of,off,often,oh,ok,okay,old,on,once," .
    "one,ones,only,onto,or,other,others,otherwise,ought,our,ours,ourselves,out," .
    "outside,over,overall,own,particular,particularly,per,perhaps,placed,please," .
    "plus,possible,presumably,probably,provides,que,quite,qv,rather,rd,re,really," .
    "reasonably,regarding,regardless,regards,relatively,respectively,right,said," .
    "same,saw,say,saying,says,second,secondly,see,seeing,seem,seemed,seeming,seems," .
    "seen,self,selves,sensible,sent,serious,seriously,seven,several,shall,she," .
    "should,shouldn't,since,six,so,some,somebody,somehow,someone,something," .
    "sometime,sometimes,somewhat,somewhere,soon,sorry,specified,specify,specifying," .
    "still,sub,such,sup,sure,t's,take,taken,tell,tends,th,than,thank,thanks,thanx," .
    "that,that's,thats,the,their,theirs,them,themselves,then,thence,there,there's," .
    "thereafter,thereby,therefore,therein,theres,thereupon,these,they,they'd," .
    "they'll,they're,they've,think,third,this,thorough,thoroughly,those,though," .
    "three,through,throughout,thru,thus,to,together,too,took,toward,towards,tried," .
    "tries,truly,try,trying,twice,two,un,under,unfortunately,unless,unlikely,until," .
    "unto,up,upon,us,use,used,useful,uses,using,usually,value,various,very,via,viz," .
    "vs,want,wants,was,wasn't,way,we,we'd,we'll,we're,we've,welcome,well,went,were," .
    "weren't,what,what's,whatever,when,whence,whenever,where,where's,whereafter," .
    "whereas,whereby,wherein,whereupon,wherever,whether,which,while,whither,who," .
    "who's,whoever,whole,whom,whose,why,will,willing,wish,with,within,without," .
    "won't,wonder,would,would've,wouldn't,yes,yet,you,you'd,you'll,you're,you've," .
    "your,yours,yourself,yourselves,zero,a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t," .
    "u,v,w,x,y,z"
);

class GithubCloud {
    protected $stopwords = GITHUB_CLOUD_STOPWORDS;
    protected $token = '';
    protected $client = null;

    public function __construct() {
        $this->client = new Github\Client(
            new Github\HttpClient\CachedHttpClient(array(
                'cache_dir' => TEMP_DIR . DIRECTORY_SEPARATOR . 'github'
            ))
        );
    }
    
    public function setToken($token) {
        $this->token = $token;
        if ($this->token) {
            $this->client->authenticate($this->token, '', Github\Client::AUTH_HTTP_TOKEN);
        }
    }

    protected function listRepoIssues($repo, $state = 'open') {
        try {
            list($owner, $repo) = explode('/', $repo);
            $issues = $this->client->api('issue')->all($owner, $repo, array('state' => $state));
            return $issues;
        } catch(Exception $e) {
            return false;
        }
    }

    protected function listRepoCommits($repo, $branch = 'master') {
        try {
            list($owner, $repo) = explode('/', $repo);
            $commits = $this->client->api('repo')->commits()->all($owner, $repo, array('sha' => $branch));
            return $commits;
        } catch(Exception $e) {
            return false;
        }
    }

    protected function listRepoPullRequests($repo, $state = 'open') {
        try {
            list($owner, $repo) = explode('/', $repo);
            $pullreqs = $this->client->api('pull_request')->all($owner, $repo, $state);
            return $pullreqs;
        } catch(Exception $e) {
            return false;
        }
    }

    protected function clean_stopwords($words, $extra_stopwords = array()) {
        $stopwords = preg_split('/,/', $this->stopwords);
        if (!empty($extra_stopwords)) {
            $stopwords = array_merge($stopwords, $extra_stopwords);
        }
        $ret = array();
        foreach($words as $pos => $word) {
            // avoiding special chars from being shown on the wordcloud
            if (! preg_match('/^\w+$/', $word)) {
                continue;
            }

            // fetches words bigger than 2 chars that are not in the stopwords list
            if (strlen($word) > 2 && ! in_array(strtolower($word), $stopwords)) {
                $ret[$pos] = $word;
            }
        }
        return $ret;
    }

    protected function freq_list($words) {
        $ret = array();
        foreach ($words as $pos => $word) {
            $word = strtolower($word);
            if (array_key_exists($word, $ret)) {
                ++$ret[$word];
            }
            else {
                $ret[$word] = 1;
            }
        }
        return $ret;
    }

    protected function word_cloud($items, $extra_stopwords = array()) {
        $text = '';
        foreach($items as $item) {
            $text .= $item['title'] . "\n";
        }

        $words = str_word_count($text, 1);
        $words = $this->clean_stopwords($words, $extra_stopwords);
        $words = $this->freq_list($words);

        $tmin = min($words);
        $tmax = max($words);
        $ret = array();
        foreach ($words as $word => $frequency) {
            if ($frequency > $tmin) {
                $related = array();
                foreach ($items as $item) {
                    if (substr_count(strtolower($item['title']), $word) > 0) {
                        $related[] = $item;
                    }
                }
                $ret[] = array(
                    'text' => $word,
                    'weight' => $frequency,
                    'related' => htmlspecialchars((json_encode($related)))
                );
            }
        }
        return $ret;
    }

    public function getWordsForRepo($repo) {
        $issues = $this->listRepoIssues($repo);
        $commits = $this->listRepoCommits($repo);
        $pullreqs = $this->listRepoPullRequests($repo);
        $names_found = array();

        $issues_titles = array();
        foreach($issues as $key => $issue) {
            if (isset($issue['user']['login'])) {
                $names_found[] = strtolower($issue['user']['login']);
            }
            $issues_titles[] = array(
                'title' => $issue['title'],
                'url' => $issue['html_url'],
                'user' => array(
                    'name' => $issue['user']['login'],
                    'url' => $issue['user']['html_url']
                )
            );
        }

        $commits_titles = array();
        foreach($commits as $key => $commit) {
            if (isset($commit['author']['login'])) {
                $names_found[] = strtolower($commit['author']['login']);
            }
            $commits_titles[] = array(
                'title' => $commit['commit']['message'],
                'url' => $commit['html_url'],
                'user' => array(
                    'name' => $commit['author']['login'],
                    'url' => $commit['author']['html_url']
                )
            );
        }

        $pullreqs_titles = array();
        foreach($pullreqs as $key => $pullreq) {
            if (isset($pullreq['user']['login'])) {
                $names_found[] = strtolower($pullreq['user']['login']);
            }
            $pullreqs_titles[] = array(
                'title' => $pullreq['title'],
                'url' => $pullreq['html_url'],
                'user' => array(
                    'name' => $pullreq['user']['login'],
                    'url' => $pullreq['user']['html_url']
                )
            );
        }

        $titles = array_merge($issues_titles, $commits_titles, $pullreqs_titles);
        $stopwords = preg_split('/,/', preg_replace('/\s/', ',', implode(',', $names_found)));
        $stopwords = array_merge(array_unique($stopwords), preg_split('/,/', GITHUB_CUSTOM_STOPWORDS));
        $words = $this->word_cloud($titles, $stopwords);
        shuffle($words);
        return $words;
    }
}
