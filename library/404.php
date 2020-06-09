<?PHP
header("HTTP/1.1 404 File Not Found");
$purl = parse_url($_SERVER['REQUEST_URI']);
$host = $_SERVER['HTTP_HOST'];
?>

<html>
<head>
    <title>not found</title>
</head>

<body>
    <div class="content">
        <h1>Ошибка 404<br></h1>
        <h2>Адресс не найден</h2>
        <p>Проверьте правильность запроса или вернитесь <a href="http://library">назад</a></p>
    </div>
</body>

<style>
body {
    margin: 0;
    font-family: sans-serif;
}
.header {
    background-color: #1b6de3;
    color: #FFF;
    border-bottom: 2px solid #0e3874;
    height: 100px;
    padding: 1em;
}
.content {
    padding: 1em;
}
</style>
</html>