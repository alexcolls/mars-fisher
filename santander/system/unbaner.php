<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNBAN IPS</title>
</head>
<body>
<style>
    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
        font-family: monospace;
    }
    body {
        background-color: #2A2F4A;
    }
    .button {
        font-family: monospace;
        padding: 8px;
        background-color: orange;
    }
    .button:hover {
        background-color: red;
    }
    a {
        color: white;
        text-decoration: none;
    }
    a:hover {
        color: black;
    }
    li {
        margin-bottom: 15px;
    }
    header {
        background-color: #043c5a;
        padding: 15px 15px 15px 0;
        margin-bottom: 25px;
        
    }
    .li-header {
        display: inline;
        margin-right: 20px;
        padding: 15px;
        background-color: green;
    }
    .li-header:hover {
        background-color: #085f08;
    }
    form {
        text-align: center;
    }
    .td-space {
        padding: 10px;
    }
</style>
    <header>
        <ul>
            <li class="li-header"><a href="?clearall=1">CLEAR ALL IPS</a></li>
            <li class="li-header"><a href="?filter=1">ORDER ALL IPS</a></li>
            <li class="li-header"><a href="?filter=1">FILTER UNIQUE IPS</a></li>
        </ul>
    </header>
    <form action="" method="post">
            <?php 
            if (!file_exists('IPBam.txt')) {
                fopen('IPBam.txt', 'a+');
                fclose('IPBam.txt');
            }else {
                $get = file('./IPBam.txt');
                
                function getInfoIP($ip) {
                    $get = file_get_contents('https://ipwhois.app/json/'.$ip.'?lang=en');
                    $get = json_decode($get, true);
                    $result = [
                        'country_code' => $get['country_code'],
                        'isp'          => $get['isp'],
                        'asn'          => $get['asn'],
                        'country_flag' => $get['country_flag'],
                        'city'         => $get['city'],
                        'region'       => $get['region'],
                    ];

                    return $result;
                }

                function borrarIP($array, $array_key) {
                    if (isset($array_key)) {
                        $key = $array_key;
                        asort($array);
                        unset($array[$key]);
                        
                        unlink('./IPBam.txt');
                        $file = fopen('./IPBam.txt', 'w');
                        foreach ($array as $ip) {
                            fwrite($file, $ip);
                        }
                        fclose($file);
                        return true;
                    }
                    return false;
                }

                function filterIPs($array) {
                    $unique = array_unique($array);
                    asort($unique);

                    $file = fopen('./IPBam.txt', 'w');
                        foreach ($unique as $ip) {
                            fwrite($file, $ip);
                    }
                }

                if (count($get) == 0) {
                    echo '<h1>No hay IPs para mostrar';
                    die;
                }else {
                    echo '
                    <center>
                    <table border="1">
                        <thead>
                            <tr>
                                <th>IP</th>
                                <th>Country</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>';
                    foreach ($get as $key => $ip) {
                    
                        echo '
                        <tr>
                            <td>'.$ip.'</td>
                            <td>Country</td>
                            <td class="td-space"><span class="button"><a href="?delete='.$key.'">DELETE</a></span></td>
                        </tr>';
                    }
                }

                if (isset($_GET['delete'])) {
                    echo "<script>window.location='?'</script>";
                    $key = $_GET['delete'];
                    borrarIP($get, $key);
                }

                if (isset($_GET['clearall']) && $_GET['clearall'] == 1) {
                    echo "<script>window.location='?'</script>";
                    unlink("./IPBam.txt");
                    touch("./IPBam.txt");
                }

                if (isset($_GET['filter']) && $_GET['filter'] == 1) {
                    echo "<script>window.location='?'</script>";
                    filterIPs($get);
                }
            }
            
            ?>
            </tbody>
        </table>
    </center>
    </form>
</body>
</html>