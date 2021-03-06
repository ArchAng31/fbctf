<?hh

if (php_sapi_name() !== 'cli') {
  http_response_code(405); // method not allowed
  exit(0);
}

require_once (__DIR__.'/../Db.php');
require_once (__DIR__.'/../Utils.php');
require_once (__DIR__.'/../models/Model.php');
require_once (__DIR__.'/../models/Importable.php');
require_once (__DIR__.'/../models/Exportable.php');
require_once (__DIR__.'/../models/Level.php');
require_once (__DIR__.'/../models/Link.php');
require_once (__DIR__.'/../models/Team.php');
require_once (__DIR__.'/../models/Configuration.php');
require_once (__DIR__.'/../models/ScoreLog.php');
require_once (__DIR__.'/../models/Control.php');
require_once (__DIR__.'/../models/MultiTeam.php');

$conf_game = \HH\Asio\join(Configuration::gen('game'));
while ($conf_game->getValue() === '1') {
  // Get all active base levels
  $bases_endpoints = array();
  foreach (\HH\Asio\join(Level::genAllActiveBases()) as $base) {
    $endpoint = array(
      'id' => $base->getId(),
      'url' => \HH\Asio\join(Level::genBaseIP($base->getId())),
    );
    array_push($bases_endpoints, $endpoint);
  }

  // Retrieve current owners
  foreach (Level::getBasesResponses($bases_endpoints) as $response) {
    if ($response['response']) {
      $code = 0;
      $json_r = json_decode($response['response'])[0];
      $teamname = $json_r->team;
      // Give points to the team if exists
      if (\HH\Asio\join(Team::genTeamExist($teamname))) {
        $team = \HH\Asio\join(Team::genTeamByName($teamname));
        \HH\Asio\join(Level::genScoreBase($response['id'], $team->getId()));
        //echo "Points\n";
      }
      //echo "Base(".strval($response['id']).") taken by ".$teamname."\n";
    } else {
      $code = -1;
      //echo "Base(".strval($response['id']).") is DOWN\n";
    }
    \HH\Asio\join(
      Level::genLogBaseEntry(
        $response['id'],
        $code,
        strval($response['response']),
      ),
    );
  }
  // Wait until next iteration
  $bases_cycle = \HH\Asio\join(Configuration::gen('bases_cycle'));
  sleep(intval($bases_cycle->getValue()));
}
