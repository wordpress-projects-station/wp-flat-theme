   
<? 

    include_once __DIR__.'/header.php';

    ?><main class="contentsidebar col g-4"><?

        is_file($looptype['path'])
            ? include_once $looptype['path']
            : the_content();

    ?></main><?

    include __DIR__.'/footer.php';

?>