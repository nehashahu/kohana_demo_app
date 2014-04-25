<?php
namespace Codeception\Lib;

use Codeception\Scenario;
use Codeception\Step;

class Parser {

    protected $scenario;
    protected $code;

    public function __construct(Scenario $scenario)
    {
        $this->scenario = $scenario;
    }

    public function prepareToRun($code)
    {
        $this->parseFeature($code);
        $this->parseScenarioOptions($code);
    }

    public function parseFeature($code)
    {
        $matches = array();
        $res = preg_match("~\\\$I->wantTo\\(['\"](.*?)['\"]\\);~", $code, $matches);
        if ($res) {
            $this->scenario->setFeature($matches[1]);
            return;
        }
        $res = preg_match("~\\\$I->wantToTest\\(['\"](.*?)['\"]\\);~", $code, $matches);
        if ($res) {
            $this->scenario->setFeature("test ".$matches[1]);
            return;
        }
    }

    public function parseScenarioOptions($code)
    {
        $matches = array();
        $res = preg_match_all("~\\\$scenario->.*?;~", $code, $matches);
        if (!$res) {
            return;
        }
        $scenario = $this->scenario;
        foreach ($matches[0] as $line) {
            eval($line);
        }
    }

    public function parseSteps($code)
    {
        // parse per line
        $friends = [];
        $lines = explode("\n", $code);
        $isFriend = false;
        foreach ($lines as $line) {
            // friends
            if (preg_match("~\\\$I->haveFriend\((.*?)\);~", $line, $matches)) {
                $friends[] = trim($matches[1],'\'"');
            }
            // friend's section start
            if (preg_match("~\\\$(.*?)->does\(~", $line, $matches)) {
                if (!in_array($friend = $matches[1], $friends)) {
                    continue;
                }
                $isFriend = true;
                $this->addCommentStep("\n----- $friend does -----");
                continue;
            }

            // actions
            if (preg_match("~\\\$I->(.*)\((.*?)\);~", $line, $matches)) {
                $this->addStep($matches);
            }

            // friend's section ends
            if ($isFriend and strpos($line, '}') !== false) {
                $this->addCommentStep("-------- back to me\n");
                $isFriend = false;
            }
        }

    }

    protected function addStep($matches)
    {
        list($m, $action, $params) = $matches;
        if (in_array($action, array('wantTo','wantToTest'))) {
            return;
        }
        $this->scenario->addStep(new Step\Action($action, explode(',', $params)));
    }

    protected function addCommentStep($comment)
    {
        $this->scenario->addStep(new \Codeception\Step\Comment($comment,array()));
    }

    public static function getClassesFromFile($file)
    {
        require_once $file;
        $sourceCode = file_get_contents($file);
        $classes = array();
        $tokens = token_get_all($sourceCode);
        $namespace = '';

        for ($i = 0; $i < count($tokens); $i++) {
            if ($tokens[$i][0] === T_NAMESPACE) {
                $namespace = '';
                for ($j = $i + 1; $j < count($tokens); $j++) {
                    if ($tokens[$j][0] === T_STRING) {
                        $namespace .= $tokens[$j][1] . '\\';
                    } else {
                        if ($tokens[$j] === '{' || $tokens[$j] === ';') {
                            break;
                        }
                    }
                }
            }

            if ($tokens[$i][0] === T_CLASS) {
                for ($j = $i + 1; $j < count($tokens); $j++) {
                    if ($tokens[$j] === '{' && isset($tokens[$i + 2][1])) {
                        $classes[] = $namespace . $tokens[$i + 2][1];
                        break;
                    }
                }
            }
        }

        return $classes;
    }

}
