   
<? 

    include_once __DIR__.'/header.php';

    ?><main class="col-xs-12 col-sm-12 col-md-9"><?

        echo 'da wordpress page a : <p> including'.$looptype['path'].'</p>';

        is_file($looptype['path'])
            ? include_once $looptype['path']
            : the_content();

    ?></main><?

    include __DIR__.'/footer.php';

?>