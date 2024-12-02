<html>

<head>
    <style>
    </style>
</head>

<body>
    {{ QrCode::size(100)->generate(bcrypt($data->id)) }}
</body>
<script type="text/javascript">
    window.print();
</script>

</html>
