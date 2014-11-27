<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;
class ProgrammerControllerTest extends PHPUnit_Framework_TestCase
{
        public function testPOST()
        {
                // create our http client (Guzzle)
                $client = new GuzzleHttp\Client();
                $url = 'http://10.35.45.21/runningpal-server/api/v2';
                $login_url = $url.'/login';
                $response = $client->post($login_url,[
                        'json'=> [
                                'email' => 'admin@gmail.com',
                                'password' =>'bf1241c04dfaaa6739c8300aea19e620'
                                ]
                ]);

                $body= $response->getBody();
                $obj = json_decode($body);
                $access_token = $obj->access_token;
                $this->assertEquals(200,$response->getStatusCode());

                //create  new history
                $history = $url.'/history';
                $response = $client->post($history,[
                        'headers' => ['Authorization' => $access_token ]
                ,
                        'json'=> [
                                'activity'=>'0',
                                'distance'=>'15.19',
                                'duration'=>'13322',
                                'calories'=>'1063',
                                'avg_heart_rate'=>'100',
                                'highest_heart_rate'=>'130',
                                'lowest_heart_rate'=>'70',
                                'avg_speed'=>'11.2',
                                'avg_pace'=>'6.0',
                                'highest_speed'=>'12.0',
                                'lowest_speed'=>'10.0',
                                'highest_pace'=>'8.0',
                                'lowest_pace'=>'6.0',
                                'avg_altitude'=>'30',
                                'highest_altitude'=>'34',
                                'lowest_altitude'=>'31',
                                'weather_condition'=>'Sunny',
                                'temperature'=>'24',
                                'humidity'=>'40',
                                'timezone_offset'=>'8',
                                'record_date'=>'2014-04-18',
                                'record_time'=>'17:10:00',
                                'certificated'=>'1'
                        ]
                ]);
                $body= $response->getBody();
                $obj = json_decode($body);
                $history_id = $obj->history_id;
                $this->assertEquals(200,$response->getStatusCode());

                //Get history
                $response = $client->get($history.'/'.$history_id,[
                        'headers' => ['Authorization' => $access_token ]
                ]);
                $this->assertEquals(200,$response->getStatusCode());

                //PUT Profile
                $profile = $url.'/user';
                $number = rand(1,1000);
                $response = $client->put($profile.'/1',[
                        'headers' => ['Authorization' => $access_token ]
                ,
                        'json'=> [
                                'name'=>$number
                        ]
                ]);
                $this->assertEquals(200,$response->getStatusCode());

                //DELETE History
                $response = $client->delete($history.'/'.$history_id,[
                        'headers' => ['Authorization' => $access_token ]
                ]);
                $this->assertEquals(200,$response->getStatusCode());

        }
}
