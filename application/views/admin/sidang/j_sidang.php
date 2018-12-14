<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
echo form_open('form/register');
echo "<p><label for='album'>Album: </label>";
echo "<select name='id' id='id'>";
if (count($majelis)) {
    foreach ($majelis as $list) {
        echo "<option value='". $list['id'] . "'>" . $list['hakim_nama'] . "</option>";
    }
}
echo "</select><br/>";
echo form_submit('submit','register');
echo form_close();
    ?>
</body>
</html>