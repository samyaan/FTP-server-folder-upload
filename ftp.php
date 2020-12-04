<?php
$ftp_server = "localhost";
$ftp_user_name = "User1";
$ftp_user_pass = "satwik";
$conn_id = ftp_connect($ftp_server);
$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
ftp_pasv($conn_id, true);
chdir("FTP Server Files")
?>
<html>

<head>
    <title>
        FTP Server Files
    </title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Uploaded Files in FTP Server:</h1>
    <div>
        <table>
            <tr id="row">
                <td>
                    Filename
                </td>
                <td>
                    Size
                </td>
                <td>
                    Last Modified
                </td>
            </tr>
            <tbody>
                <?php
                $mydir = opendir(".");
                while ($entry = readdir($mydir)) {
                    $dir[] = $entry;
                }
                closedir($mydir);
                $cont = count($dir);
                sort($dir);
                for ($index = 2; $index < $cont; $index++) {

                    $name = $dir[$index];
                    $namehref = $dir[$index];

                    $size = number_format(filesize($dir[$index]));
                    $modtime = date("M j Y g:i A", filemtime($dir[$index]));
                    $timekey = date("YmdHis", filemtime($dir[$index]));
                    print("
                    <tr>
                      <td><a href='./FTP Server Files/$namehref'>$name</a></td>
                      
                      <td><a href='./FTP Server Files/$namehref'>$size</a></td>
                      <td sorttable_customkey='$timekey'><a href='./$namehref'>$modtime</a></td>
                    </tr>");
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php
ftp_close($conn_id);
?>