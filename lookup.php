<?php
$GLOBALS['bot_token'] = 'PUT YOUR DISCORD TOKEN HERE'; 
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
        $id = $_GET["id"];
        $FINEIllUseCURL = curl_init("https://discord.com/api/v6/users/{$id}");
        curl_setopt_array($FINEIllUseCURL,[
            CURLOPT_RETURNTRANSFER => 1,CURLOPT_HEADER => 0,
            CURLOPT_HTTPHEADER => ['Authorization: Bot ' . $GLOBALS['bot_token']]
        ]);
        $Data = curl_exec($FINEIllUseCURL);
        curl_close($FINEIllUseCURL);
        $DecodedData = json_decode($Data,true);
        if (array_key_exists("message",$DecodedData) == null){
            if (isset($_GET["Json"]) && $_GET["Json"] == "true"){
                header("Content-Type: application/json");
            } else {

				echo "<br><br>";
				echo "ID: ". $DecodedData['id']. "<br>";
				echo "Name: ". $DecodedData['username']."#".$DecodedData['discriminator']. "<br>";
				// FLAGS CALCULATIONIORERS
				echo "<a style='vertical-align: top;'>Badges: </a>";
					if ($DecodedData['public_flags'] == 0) { // none
						echo 'None';
					}				
					if ($DecodedData['public_flags'] - 131072 >= 0) { // Bot Developer
						$DecodedData['public_flags'] = $DecodedData['public_flags'] - 131072;
						echo '<img src="img/bot_dev.png" width="16">';
					}
					if ($DecodedData['public_flags'] - 65536 >= 0) { // Verified Bot
						$DecodedData['public_flags'] = $DecodedData['public_flags'] - 65536;
					}					
					if ($DecodedData['public_flags'] - 16384 >= 0) { // Bug Hunter 2
						$DecodedData['public_flags'] = $DecodedData['public_flags'] - 16384;
						echo '<img src="img/bug_hunter.png" width="16">';
					}					
					if ($DecodedData['public_flags'] - 4096 >= 0) { // System
						$DecodedData['public_flags'] = $DecodedData['public_flags'] - 4096;
					}
					if ($DecodedData['public_flags'] - 1024 >= 0) { // team user
						$DecodedData['public_flags'] = $DecodedData['public_flags'] - 1024;
					}
					if ($DecodedData['public_flags'] - 512 >= 0) { // early supporter
						$DecodedData['public_flags'] = $DecodedData['public_flags'] - 512;
						echo '<img src="img/early.png" width="16">';
					}
					if ($DecodedData['public_flags'] - 256 >= 0) { // team balance
						$DecodedData['public_flags'] = $DecodedData['public_flags'] - 256;
						echo '<img src="img/balance.png" width="16">';						
					}
					if ($DecodedData['public_flags'] - 128 >= 0) { // brilliance
						$DecodedData['public_flags'] = $DecodedData['public_flags'] - 128;
						echo '<img src="img/brilliance.png" width="16">';						
					}
					if ($DecodedData['public_flags'] - 64 >= 0) { // bravery
						$DecodedData['public_flags'] = $DecodedData['public_flags'] - 64;
						echo '<img src="img/bravery.png" width="16">';						
					}
					if ($DecodedData['public_flags'] - 8 >= 0) { // normal bug hunter
						$DecodedData['public_flags'] = $DecodedData['public_flags'] - 8;
						echo '<img src="img/bug_hunter.png" width="16">';						
					}
					if ($DecodedData['public_flags'] - 4 >= 0) { // hypesquad evets
						$DecodedData['public_flags'] = $DecodedData['public_flags'] - 8;
						echo '<img src="img/hypesquad.png" width="16">';						
					}
					if ($DecodedData['public_flags'] - 2 >= 0) { // partner
						$DecodedData['public_flags'] = $DecodedData['public_flags'] - 2;
						echo '<img src="img/partner.png" width="16">';						
					}
					if ($DecodedData['public_flags'] - 1 >= 0) { // staff
						$DecodedData['public_flags'] = $DecodedData['public_flags'] - 1;
						echo '<img src="img/staff.png" width="16">';						
					}					
					echo "<br>";
					echo 'Created: <a id="i-date24"></a><br>';
					echo "<a href='https://cdn.discordapp.com/avatars/".$DecodedData['id']."/". $DecodedData['avatar'] ."?size=1024'> Profile Picture </a><br><br>";
					echo "<img src='https://cdn.discordapp.com/avatars/".$DecodedData['id']."/". $DecodedData['avatar'] ."' style='height: 75;' width='' height=''>";

            }
        } else {
            echo "Not a User ID";
        }
    }
?>