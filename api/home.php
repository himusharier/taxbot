<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAXBOT {API}</title>
    <style>
        .main_container {
            max-width: 900px;
            margin: 0 auto;
            padding: 10px;
            background-color: #f5f5f5;
            border-radius: 7px;
        }
        .link {
            color: #e83e8c;
            font-family: monospace;
            font-size: 16px;
            word-wrap: break-word;
        }
    </style>
</head>
<body style="font-family: verdana;">

    <center><h1>TAXBOT {API}</h1></center>
    <center><h4>Documentation Page</h3></center>
    <br/>

    <div class="main_container">
        <h2><u>Get plant data</u></h2>
        <p><b>Usage:</b> The basic syntax of a URL request to the API is shown below:</p>
        <br/>
        <a>To get all data:</a>
        <a class="link">https://taxbot.himusharier.xyz/api/data/</a>
        <br/><br/>
        <a>To get search data:</a>
        <a class="link">https://taxbot.himusharier.xyz/api/search/&#60;word&#62;</a>
        <br/>
        <br/>
        <h3><u>Server response:</u></h3>
        <a>URL: <a class="link">https://taxbot.himusharier.xyz/api/search/lawsonia</a></a>
        <p style="white-space: pre;font-family: monospace;font-size: 12px;background-color: #333;color: #fff;padding: 5px;border-radius: 2px;overflow: auto;">
{
  "status": "true",
  "plants": [
    {
      "scientific_name": "Lawsonia inermis",
      "genus": "Lawsonia ",
      "species": "inermis",
      "family": "Lythraceae",
      "common_name": "Henna tree",
      "local_name": "Mehedi",
      "habitat": "Large shrub;",
      "origin": "Cultivated plant;",
      "uses": "Leaf paste is traditionally used to stain skin, nail & hair of human.",
      "others": "",
      "picture": "https://taxbot.himusharier.xyz/upsave/5e9c63513d05b158730734526522.PNG"
    }
  ],
  "result": "found"
}
        </p>
        <br/>
        <br/>
        <h3><u>Example:</u></h3>
        <h4>cURL:</h4>
        <p style="white-space: pre;font-family: monospace;font-size: 12px;background-color: #333;color: #fff;padding: 5px;border-radius: 2px;overflow: auto;">
$url="https://taxbot.himusharier.xyz/api/data/";
$ch=curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result=curl_exec($ch);
curl_close($ch);
$result=json_decode($result, true);
        </p>
        <h4>JQUERY:</h4>
        <p style="white-space: pre;font-family: monospace;font-size: 12px;background-color: #333;color: #fff;padding: 5px;border-radius: 2px;overflow: auto;">
$.ajax({
    url : "https://taxbot.himusharier.xyz/api/data/",
    type : "GET",
    dataType : "JSON",
    success : function(data){
        console.log(data);   
        // do something with the list
    }
});
        </p>

    </div>
    <br/>
    <br/>
    <br/>

</body>
</html>