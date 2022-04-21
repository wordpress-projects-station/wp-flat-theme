   
<? 

    include_once __DIR__.'/header.php';

    ?><main class="col <?//= center_column_size(); ?>"><?

        // echo 'da wordpress page a : <p> including'.$looptype['path'].'</p>';

        is_file($looptype['path'])
            ? include_once $looptype['path']
            : the_content();

    ?></main><?

    include __DIR__.'/footer.php';

?>