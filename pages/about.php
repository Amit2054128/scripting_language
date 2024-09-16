<?php
$title = 'about';
ob_start();
?>
<div>
    <h1>hello about</h1>
</div>

<script>

    console.log('first')
</script>
<?php
$content = ob_get_clean();
include '../layout/layout.php'
?>



