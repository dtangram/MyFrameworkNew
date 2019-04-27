<?php

  include './google-api-php-client/src/Google/autoload.php';
  include './google-api-php-client/src/Google/Client.php';

  class apiModel{
    public function __construct($parent){
        $this->db = $parent->db;
    }

    public function youtubeFunc(){
      $client = new Google_Client();
      $client->setApplicationName("YoutubeAPI");
      $client->setDeveloperKey("AIzaSyAge5VTMqNb8DjIN5Z4HqSOMg3_STgFEE8");

      $service = new Google_Service_Youtube($client);

      $result = $service->videos->listVideos("snippet", array("chart"=>"mostPopular", "maxResults"=>4));

      return $result;
    }
  }

?>
