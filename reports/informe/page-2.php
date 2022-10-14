<!-- Pagina 2 del Informe -->
<page>
    <page_header>
        <p>SENATI - Chincha</p>
    </page_header>

    <ul>
            <?php
            // foreach($programas as $programa){
            //     echo"<li>{$programa}</li>";
            // }
            ?>
            <?php foreach($programas as $programa): ?>
                <li><?= $programa?></li>
            <?php endforeach ?>
    </ul>

    <page_footer>
        <p>Ingeniería de Software - [[page_cu]]</p>
    </page_footer>
</page>